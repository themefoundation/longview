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
 * Sets the layout class
 *
 * @since 1.0
 * @return string Layout class.
 */
function thmfdn_full_width_page() {
	return 'content-full-width';
}
add_filter( 'thmfdn_layout_class', 'thmfdn_full_width_page' );

/**
 * Sets the content format
 *
 * @since 1.0
 * @return string Content format class.
 */
function thmfdn_child_page_grid() {
	return 'grid';
}
add_filter( 'thmfdn_content_format_class', 'thmfdn_child_page_grid' );


// Loads the default page template.
require( dirname(__FILE__) . '/../page.php' ); 