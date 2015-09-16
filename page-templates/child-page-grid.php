<?php

/**
 * Single page template with no sidebars and full width content
 *
 * @package Longview
 * @since 1.0
 */

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

add_action( 'thmfdn_content_top', 'thmfdn_page_entry_title' );
add_action( 'thmfdn_content_top', 'thmfdn_page_content' );
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
add_filter( 'thmfdn_content_format_class', 'thmfdn_child_page_grid' );

/**
 *****************************************************************************
 * Define actions and filters
 *****************************************************************************
 *
 * This section defines the actions and filters associated with each hook.
 *
 * @since 1.0
 */

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


function thmfdn_display_child_grid() {
	$the_ID = get_the_ID();

	$child_pages = new WP_Query( array(
		'post_type' => 'page',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_parent' => $the_ID,
		'posts_per_page' => 999,
		'no_found_rows' => true,
	) );

	if ( $child_pages->have_posts() ) {
		while ( $child_pages->have_posts() ) {
			$child_pages->the_post();
			get_template_part( 'template-parts/content', 'grid' );
		}
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

/**
 * Sets the content format
 *
 * @since 1.0
 * @return string Content format class.
 */
function thmfdn_child_page_grid() {
	return 'grid';
}

if ( !function_exists( 'thmfdn_page_title' ) ) {
	/**
	 * Page title
	 *
	 * Displays the title and page content.
	 *
	 * @since 1.0
	 */
	function thmfdn_archive_title() {

		the_archive_description( '<p class="page-description">', '</p>' );
	}
}



// Loads the default page template.
require( dirname(__FILE__) . '/../page.php' ); 