<?php

/**
 * Single page template with no sidebars and full width content
 *
 * @package Longview
 * @since 1.0.0
 */

/*
Template Name: Child Page Grid
*/

/**
 * Displays grid of child pages
 *
 * @since 1.0.0
 */
function thmfdn_display_child_grid() {

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
add_action( 'thmfdn_content_bottom', 'thmfdn_display_child_grid', 60 );

/**
 * Sets the layout class
 *
 * @since 1.0.0
 * @return string Layout class.
 */
function thmfdn_child_page_grid_full_width() {
	return 'content-full-width';
}
add_filter( 'thmfdn_layout_class', 'thmfdn_child_page_grid_full_width' );

/**
 * Sets the thumbnail size
 *
 * @since 1.0.0
 * @return string Thumbnail size.
 */
function thmfdn_child_page_grid_thumbnail_size() {
	return 'grid';
}
add_filter( 'thmfdn_thumbnail_size', 'thmfdn_child_page_grid_thumbnail_size' );

// Loads the default page template.
locate_template( array( 'page.php' ), true );
