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
 * @since 1.0.0
 */

if( !function_exists( 'thmfdn_page_setup' ) ) {
	/**
	 * Adds and removes actions from the hooks in the base template part
	 */
	function thmfdn_page_setup() {
		add_action( 'thmfdn_entry', 'thmfdn_page_featured_image', 50 );
		add_action( 'thmfdn_entry', 'thmfdn_page_pagination', 250 );
	}
}
add_action( 'thmfdn_template_part_setup', 'thmfdn_page_setup' );

/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0.0
 */

if ( !function_exists( 'thmfdn_page_featured_image' ) ) {
	/**
	 * Featured image
	 *
	 * Displays the featured image (formerly called the post thumbnail).
	 *
	 * @since 1.0.0
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
	 * @since 1.0.0
	 */
	function thmfdn_page_entry_title() {
		echo '<h1 class="' . apply_filters( 'thmfdn_entry_title_class', 'entry-title' ) . '">';
		the_title();
		echo '</h1>' . "\n";
	}
}

if ( !function_exists( 'thmfdn_page_pagination' ) ) {
	/**
	 * Single post/page navigation template part
	 *
	 * @since 1.0.0
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

// Loads the default template part.
get_template_part( 'template-parts/content' );
