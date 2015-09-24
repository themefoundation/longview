<?php
/**
 * Content for pages
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
 * @since 1.0
 */

add_action( 'thmfdn_entry_top', 'thmfdn_page_open' );

add_action( 'thmfdn_entry', 'thmfdn_page_entry_title' );
add_action( 'thmfdn_entry', 'thmfdn_page_content' );
add_action( 'thmfdn_entry', 'thmfdn_page_pagination' );

add_action( 'thmfdn_entry_bottom', 'thmfdn_page_close' );

/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0
 */

if ( !function_exists( 'thmfdn_page_open' ) ) {
	/**
	 * Open #post div
	 *
	 * @since 1.0
	 */
	function thmfdn_page_open() {
		?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
	}
}

if ( !function_exists( 'thmfdn_page_featured_image' ) ) {
	/**
	 * Featured image
	 *
	 * Displays the featured image (formerly called the post thumbnail).
	 *
	 * @since 1.0
	 */
	function thmfdn_page_featured_image() {
		the_post_thumbnail( apply_filters( 'thmfdn_page_thumbnail_size', apply_filters( 'thmfdn_thumbnail_size', '' ) ) );
		echo "\n";
	}
}

if ( !function_exists( 'thmfdn_page_entry_title' ) ) {
	/**
	 * Entry title
	 *
	 * Displays the post title.
	 *
	 * @since 1.0
	 */
	function thmfdn_page_entry_title() {
		echo '<h1 class="' . apply_filters( 'thmfdn_entry_title_class', 'entry-title' ) . '">';
		the_title();
		echo '</h1>' . "\n";
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
		echo '<div class="' . apply_filters( 'thmfdn_entry_content_class', 'entry-content' ) . '">' . "\n";
		the_content();
		echo '</div><!--.entry-content-->' . "\n";
	}
}

if ( !function_exists( 'thmfdn_page_pagination' ) ) {
	/**
	 *  Single post/page navigation template part
	 *
	 * @since 1.0
	 */
	function thmfdn_page_pagination() {
		// Useful if pagination needs to be wrapped in another element.
		// $pagination_args = array(
		// 	'before' => '<div class="single-navigation">',
		// 	'after' => '</div>'
		// );

		wp_link_pages();
	}
}

if ( !function_exists( 'thmfdn_page_close' ) ) {
	/**
	 * Close #post div
	 *
	 * @since 1.0
	 */
	function thmfdn_page_close() {
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
 * @since 1.0
 */

// Use this hook to add and remove actions.
do_action( 'thmfdn_template_part_setup' );

do_action( 'thmfdn_entry_before' );
do_action( 'thmfdn_entry_top' );
do_action( 'thmfdn_entry' );
do_action( 'thmfdn_entry_bottom' );
do_action( 'thmfdn_entry_after' );
