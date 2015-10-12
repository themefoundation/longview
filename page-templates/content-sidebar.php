<?php

/**
 * Single page template with single right sidebar
 *
 * @package Longview
 * @since 1.0.0
 */

/*
Template Name: Content-Sidebar
*/

/**
 * Sets the layout class
 *
 * @since 1.0.0
 * @return string Layout class.
 */
function thmfdn_content_sidebar_page() {
	return 'content-sidebar';
}
add_filter( 'thmfdn_layout_class', 'thmfdn_content_sidebar_page' );

// Loads the default page template.
require_once( get_stylesheet_directory() . '/page.php' );
