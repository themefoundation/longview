<?php
/**
 *  Index template
 *
 * @package Index
 * @since 1.0.0
 */

/**
 *****************************************************************************
 * Add actions
 *****************************************************************************
 *
 * This section adds actions to their respective action hooks.
 *
 * @see http://codex.wordpress.org/Function_Reference/add_action
 * @since 1.0.0
 */

add_action( 'thmfdn_content_top', 'thmfdn_main_open',     100 );
add_action( 'thmfdn_content_top', 'thmfdn_content_open',  200 );
add_action( 'thmfdn_content_top', 'thmfdn_archive_title', 300 );
add_action( 'thmfdn_content_top', 'thmfdn_loop_open',     400 );

add_action( 'thmfdn_entry', 'thmfdn_template_part' );

add_action( 'thmfdn_content_bottom', 'thmfdn_loop_close',    100 );
add_action( 'thmfdn_content_bottom', 'thmfdn_pagination',    200 );
add_action( 'thmfdn_content_bottom', 'thmfdn_content_close', 300 );
add_action( 'thmfdn_content_bottom', 'get_sidebar',          400 );
add_action( 'thmfdn_content_bottom', 'thmfdn_main_close',    500 );


/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0.0
 */

if ( !function_exists( 'thmfdn_main_open' ) ) {
	/**
	 * Main opening
	 *
	 * Opens the main div and wrapper.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_main_open() {
		echo '<div id="' . apply_filters( 'thmfdn_main_id', 'main' ) . '" class="' . apply_filters( 'thmfdn_main_class', 'row' ) . '">' . "\n";
		echo '<div class="' . apply_filters( 'thmfdn_main_wrap_class', 'wrap' ) . '">' . "\n";
	}
}

if ( !function_exists( 'thmfdn_content_open' ) ) {
	/**
	 * Primary opening
	 *
	 * Opens the .primary div column and the #content div. This theme supports
	 * up to three columns, .primary, .secondary, and .tertiary.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_content_open() {
		?>
			<div id="content" class="<?php echo apply_filters( 'thmfdn_content_class', 'primary hfeed' ) ?>" role="main">
		<?php
	}
}

if ( !function_exists( 'thmfdn_archive_title' ) ) {
	/**
	 * Archive title
	 *
	 * Displays the title for archive pages.
	 *
	 * @since 1.0.0
	 * @see https://developer.wordpress.org/reference/functions/the_archive_title/
	 */
	function thmfdn_archive_title() {

		$thmfdn_archive_title = get_the_archive_title();
		if ( 'Archives' != $thmfdn_archive_title ) {
			echo '<h1 class="page-title">' . $thmfdn_archive_title . '</h1>';
		}
		the_archive_description( '<p class="page-description">', '</p>' );
	}
}

if ( !function_exists( 'thmfdn_loop_open' ) ) {
	/**
	 * Loop wrapper
	 *
	 * Opens the .loop div.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_loop_open() {
		?>
			<div class="<?php echo apply_filters( 'thmfdn_loop_class', 'loop' ) ?>">
		<?php
	}
}

if ( !function_exists( 'thmfdn_template_part' ) ) {
	/**
	 * Template part
	 *
	 * Loads the template part.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_template_part() {
		get_template_part(
			apply_filters( 'thmfdn_template_part_slug', 'template-parts/content' ),
			apply_filters( 'thmfdn_template_part_name', '' )
		);
	}
}


if ( !function_exists( 'thmfdn_loop_close' ) ) {
	/**
	 * Loop wrapper closing
	 *
	 * Closes the .loop div.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_loop_close() {
		?>
			</div><!-- .loop -->
		<?php
	}
}

if ( !function_exists( 'thmfdn_pagination' ) ) {
	/**
	 * Posts pagination
	 *
	 * @since 1.0.0
	 */
	function thmfdn_pagination() {
		the_posts_pagination();
	}
}

if ( !function_exists( 'thmfdn_content_close' ) ) {
	/**
	 * Content closing
	 *
	 * Closes the #content div.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_content_close() {
		?>
			</div><!-- #content -->
		<?php
	}
}

if ( !function_exists( 'thmfdn_main_close' ) ) {
	/**
	 * Main closing
	 *
	 * Closes the main div and wrapper.
	 */
	function thmfdn_main_close() {
		echo 	'</div><!--.wrap-->' . "\n";
		echo '</div><!--#main-->' . "\n";
	}
}

/**
 *****************************************************************************
 * Do actions
 *****************************************************************************
 *
 * This section runs the actions associated with each hook.
 *
 * @see http://codex.wordpress.org/Function_Reference/do_action
 * @since 1.0.0
 */

get_header();

// Use this hook to add and remove actions.
do_action( 'thmfdn_template_setup' );

do_action( 'thmfdn_content_before' );
do_action( 'thmfdn_content_top' );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		do_action( 'thmfdn_entry_before' );
		do_action( 'thmfdn_entry' );
		do_action( 'thmfdn_entry_after' );
	}
} else {
	do_action( 'thmfdn_entry_before' );

	get_template_part(
		apply_filters( 'thmfdn_404_template_part_slug', 'template-parts/404' ),
		apply_filters( 'thmfdn_404_template_part_name', '' )
	);

	do_action( 'thmfdn_entry_after' );
}

do_action( 'thmfdn_content_bottom' );
do_action( 'thmfdn_content_after' );

get_footer();
