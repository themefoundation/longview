<?php
/**
 * Content for archives
 *
 * @package Longview
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

add_action( 'thmfdn_entry_top', 'thmfdn_post_open', 100 );

add_action( 'thmfdn_entry', 'thmfdn_entry_title', 100 );
add_action( 'thmfdn_entry', 'thmfdn_content', 200 );

add_action( 'thmfdn_entry_bottom', 'thmfdn_post_close', 100 );

/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0.0
 */

if ( !function_exists( 'thmfdn_post_open' ) ) {
	/**
	 * Open #post div
	 *
	 * @since 1.0.0
	 */
	function thmfdn_post_open() {
		?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
	}
}

if ( !function_exists( 'thmfdn_entry_title' ) ) {
	/**
	 * Entry title
	 *
	 * Displays the post title.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_entry_title() {
		if ( is_singular() ) {
			echo '<h1 class="' . apply_filters( 'thmfdn_entry_title_class', 'entry-title' ) . '">';
			the_title();
			echo '</h1>' . "\n";
		} else {
			echo '<h2 class="' . apply_filters( 'thmfdn_entry_title_class', 'entry-title' ) . '">';
			echo '<a href="' . get_permalink() . '">';
			the_title();
			echo '</a>';
			echo '</h2>' . "\n";
		}
	}
}

if ( !function_exists( 'thmfdn_content' ) ) {
	/**
	 * Entry content
	 *
	 * Displays the post content.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_content() {
		echo '<div class="' . apply_filters( 'thmfdn_entry_content_class', 'entry-content' ) . '">' . "\n";
		the_content();
		echo '</div><!--.entry-content-->' . "\n";
	}
}

if ( !function_exists( 'thmfdn_post_close' ) ) {
	/**
	 * Close #post div
	 *
	 * @since 1.0.0
	 */
	function thmfdn_post_close() {
		?>
			</div><!-- #post-number -->
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
 * @since 1.0.0
 */

// Use this hook to add and remove actions.
do_action( 'thmfdn_template_part_setup' );

do_action( 'thmfdn_entry_before' );
do_action( 'thmfdn_entry_top' );
do_action( 'thmfdn_entry' );
do_action( 'thmfdn_entry_bottom' );
do_action( 'thmfdn_entry_after' );
