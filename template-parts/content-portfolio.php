<?php
/**
 * Content for portfolio archives
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

add_action( 'thmfdn_entry_top', 'thmfdn_post_open' );

add_action( 'thmfdn_entry', 'thmfdn_archive_featured_image' );

add_action( 'thmfdn_entry_bottom', 'thmfdn_post_close' );

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

if ( !function_exists( 'thmfdn_archive_featured_image' ) ) {
	/**
	 * Featured image
	 *
	 * Displays the featured image (formerly called the post thumbnail).
	 *
	 * @since 1.0.0
	 */
	function thmfdn_archive_featured_image() {
		echo '<a href="' . get_permalink() . '">';
		the_post_thumbnail( apply_filters( 'thmfdn_thumbnail_size', 'gallery' ) );
		echo '</a>';
		echo "\n";
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
