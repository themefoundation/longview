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
if( !function_exists( 'thmfdn_portfolio_setup' ) ) {
	/**
	 * Adds and removes actions from the hooks in the base template part
	 */
	function thmfdn_portfolio_setup() {
		remove_action( 'thmfdn_entry', 'thmfdn_entry_title', 100 );
		remove_action( 'thmfdn_entry', 'thmfdn_content', 200 );

		add_action( 'thmfdn_entry', 'thmfdn_portfolio_featured_image', 50 );
	}
}
add_action( 'thmfdn_template_part_setup', 'thmfdn_portfolio_setup' );

/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0.0
 */
if ( !function_exists( 'thmfdn_portfolio_featured_image' ) ) {
	/**
	 * Featured image
	 *
	 * Displays the featured image (formerly called the post thumbnail).
	 *
	 * @since 1.0.0
	 */
	function thmfdn_portfolio_featured_image() {
		echo '<a href="' . get_permalink() . '">';
		the_post_thumbnail( apply_filters( 'thmfdn_thumbnail_size', 'gallery' ) );
		echo '</a>';
		echo "\n";
	}
}

// Loads the default template part.
get_template_part( 'template-parts/content' );
