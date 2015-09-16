<?php

/**
 * Single page template with no sidebars and full width content
 *
 * @package Longview
 * @since 1.0
 */

// TODO: consider: loading standard page template, removing all actions from entry hooks, then loading grid template

/*
Template Name: Child Page Grid
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

add_action( 'thmfdn_content_bottom', 'thmfdn_display_child_grid', 5 );


/**
 *****************************************************************************
 * Add filters
 *****************************************************************************
 *
 * This section adds filters to their respective filter hooks.
 *
 * @see http://codex.wordpress.org/Function_Reference/add_filter
 * @since 1.0
 */

add_filter( 'thmfdn_layout_class', 'thmfdn_full_width_page' );

/**
 *****************************************************************************
 * Define actions and filters
 *****************************************************************************
 *
 * This section defines the actions and filters associated with each hook.
 *
 * @since 1.0
 */

/**
 * Displays grid of child pages
 *
 * @since 1.0
 */
function thmfdn_display_child_grid() {

	// Removes actions added by the content-page.php template.
	// These actions will be used by the content-grid.php template.
	// If previous actions aren't removed, they will carry over.
	remove_all_actions( 'thmfdn_entry_top' );
	remove_all_actions( 'thmfdn_entry' );
	remove_all_actions( 'thmfdn_entry_bottom' );

	// Sets up the child page query.
	$child_pages = new WP_Query( array(
		'post_type' => 'page',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_parent' => get_the_ID(),
		'posts_per_page' => 999,
		'no_found_rows' => true,
	) );

	// Runs the child page loop.
	if ( $child_pages->have_posts() ) {
		echo '<div class="' . apply_filters( 'thmfdn_grid_class', 'thmfdn-grid' ) . '">';
		echo '<div class="loop">';
		while ( $child_pages->have_posts() ) {
			$child_pages->the_post();
			get_template_part( 'template-parts/content', 'grid' );
		}
		echo '</div><!-- .loop -->';
		echo '</div><!-- .thmfdn-grid -->';
	}

	wp_reset_postdata();
}

/**
 * Sets the layout class
 *
 * @since 1.0
 * @return string Layout class.
 */
function thmfdn_full_width_page() {
	return 'content-full-width';
}

// Loads the default page template.
require( dirname(__FILE__) . '/../page.php' ); 