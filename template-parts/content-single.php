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

if( !function_exists( 'thmfdn_single_setup' ) ) {
	/**
	 * Adds and removes actions from the hooks in the base template part
	 */
	function thmfdn_single_setup() {
		add_action( 'thmfdn_entry', 'thmfdn_single_meta_top', 150 );
		add_action( 'thmfdn_entry', 'thmfdn_post_pagination', 250 );
		add_action( 'thmfdn_entry', 'thmfdn_single_meta_bottom', 300 );
		add_action( 'thmfdn_entry', 'thmfdn_posts_nav', 350 );
		add_action( 'thmfdn_entry', 'thmfdn_single_comments', 400 );
	}
}
add_action( 'thmfdn_template_part_setup', 'thmfdn_single_setup' );

/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0.0
 */
if ( !function_exists( 'thmfdn_single_meta_top' ) ) {
	/**
	 * Entry meta
	 *
	 * Displays the post meta data.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_single_meta_top() {
		$meta_args = apply_filters( 'thmfdn_single_meta_top', array() );
		if ( !empty( $meta_args ) ) {
			echo '<div class="' . apply_filters( 'thmfdn_entry_meta_top_class', 'entry-meta-top' ) . '">';
			thmfdn_post_meta( $meta_args );
			echo '</div>' . "\n";
		}
	}
}

if ( !function_exists( 'thmfdn_single_meta_bottom' ) ) {
	/**
	 * Entry meta
	 *
	 * Displays the post meta data.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_single_meta_bottom() {
		$meta_args = apply_filters( 'thmfdn_single_meta_bottom', array() );
		if ( !empty( $meta_args ) ) {
			echo '<div class="' . apply_filters( 'thmfdn_entry_meta_bottom_class', 'entry-meta-bottom' ) . '">';
			thmfdn_post_meta( $meta_args );
			echo '</div>' . "\n";
		}
	}
}

if ( !function_exists( 'thmfdn_post_pagination' ) ) {
	/**
	 *  Single post/page navigation template part
	 *
	 * @since 1.0.0
	 */
	function thmfdn_post_pagination() {
		// Useful if pagination needs to be wrapped in another element.
		// $pagination_args = array(
		// 	'before' => '<div class="single-navigation">',
		// 	'after' => '</div>'
		// );

		wp_link_pages();
	}
}

if ( !function_exists( 'thmfdn_posts_nav' ) ) {
	/**
	 * Displays post navigation
	 *
	 * @since 1.0.0
	 */
	function thmfdn_posts_nav() {
		the_post_navigation();
	}
}

if ( !function_exists( 'thmfdn_single_comments' ) ) {
	/**
	 * Comments
	 *
	 * Displays the post comments.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_single_comments() {
		comments_template();
	}
}

// Loads the default template part.
get_template_part( 'template-parts/content' );
