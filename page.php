<?php
/**
 *  Single page template
 *
 * @package THMFDN
 * @since 1.0
 */

/**
 *****************************************************************************
 * Add actions
 *****************************************************************************
 *
 * This section adds actions to their respective action hooks.
 *
 * @see http://codex.wordpress.org/Function_Reference/add_action
 * @since 1.0
 */

// The thmfdn_header_after action hook is located in the header.php file.
add_action( 'thmfdn_header_after', 'thmfdn_page_featured_image', 50 );

add_action( 'thmfdn_content_top', 'thmfdn_content_open' );
add_action( 'thmfdn_content_top', 'thmfdn_loop_open' );

add_action( 'thmfdn_content_bottom', 'thmfdn_loop_close' );
add_action( 'thmfdn_content_bottom', 'thmfdn_content_close' );


/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0
 */

if ( !function_exists( 'thmfdn_page_featured_image' ) ) {
	/**
	 * Featured image
	 *
	 * Displays the featured image (formerly called the post thumbnail).
	 *
	 * @since 1.0
	 */
	function thmfdn_page_featured_image() {
		?>
			<div class="row thmfdn-featured-image">
				<div class="wrap">
					<div>
						<?php the_post_thumbnail( apply_filters( 'thmfdn_thumbnail_size', '' ) ); ?>
					</div>
				</div>
			</div>
		<?php
	}
}

if ( !function_exists( 'thmfdn_content_open' ) ) {
	/**
	 * Primary opening
	 *
	 * Opens the #primary div column and the #content div. This theme supports
	 * up to three columns, #primary, #secondary, and #tertiary.
	 *
	 * This function is repeated in the base template files (index.php,
	 * page.php, and single.php). This duplication is the unfortunate side
	 * effect of trying to keep everything in its natural place.
	 *
	 * @since 1.0
	 */
	function thmfdn_content_open() {
		?>
			<div id="content" class="<?php echo apply_filters( 'thmfdn_content_class', 'primary hfeed' ) ?>" role="main">
		<?php
	}
}

if ( !function_exists( 'thmfdn_loop_open' ) ) {
	/**
	 * Loop wrapper
	 *
	 * Opens the .loop div. 
	 *
	 * This function is repeated in the base template files (index.php,
	 * page.php, and single.php). This duplication is the unfortunate side
	 * effect of trying to keep everything in its natural place.
	 *
	 * @since 1.0
	 */
	function thmfdn_loop_open() {
		?>
			<div class="<?php echo apply_filters( 'thmfdn_loop_class', 'loop' ) ?>">
		<?php
	}
}

if ( !function_exists( 'thmfdn_page_content' ) ) {
	/**
	 * Entry content
	 *
	 * Displays the post content.
	 *
	 * @since 1.0
	 */
	function thmfdn_page_content() {
		echo '<div class="' . apply_filters( 'thmfdn_entry_title_class', 'entry-content' ) . '">' . "\n";
		the_content();
		echo '</div><!--.entry-content-->' . "\n";
	}
}

if ( !function_exists( 'thmfdn_loop_close' ) ) {
	/**
	 * Loop wrapper closing
	 *
	 * Closes the .loop div.
	 *
	 * This function is repeated in the base template files (index.php,
	 * page.php, and single.php). This duplication is the unfortunate side
	 * effect of trying to keep everything in its natural place.
	 *
	 * @since 1.0
	 */
	function thmfdn_loop_close() {
		?>
			</div><!-- .loop -->
		<?php
	}
}

if ( !function_exists( 'thmfdn_content_close' ) ) {
	/**
	 * Content closing
	 *
	 * Closes the #content div.
	 *
	 * This function is repeated in the base template files (index.php,
	 * page.php, and single.php). This duplication is the unfortunate side
	 * effect of trying to keep everything in its natural place.
	 *
	 * @since 1.0
	 */
	function thmfdn_content_close() {
		?>
			</div><!-- #content -->
		<?php
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
 * @since 1.0
 */

// Use this hook to add and remove actions.
do_action( 'thmfdn_template_setup' );

get_header();

do_action( 'thmfdn_content_before' );
do_action( 'thmfdn_content_top' );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		// do_action( 'thmfdn_entry_top' );
		// do_action( 'thmfdn_entry' );
		// do_action( 'thmfdn_entry_bottom' );
		echo get_thmfdn_content_format();

		get_template_part( apply_filters( 'thmfdn_template_part_slug', 'template-parts/content' ), apply_filters( 'thmfdn_template_part_name', 'page' ) );

		// get_template_part( 'template-parts/content', 'page' );
	}
} else {
	get_template_part( 'template-parts/404' );
}


do_action( 'thmfdn_content_bottom' );
do_action( 'thmfdn_content_after' );

get_sidebar();
get_footer();
