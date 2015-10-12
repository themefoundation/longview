<?php

/**
 * Single page template with double right sidebars
 *
 * @package Longview
 * @since 1.0.0
 */

/*
Template Name: Content-Sidebar-Sidebar
*/

/**
 * Sets the layout class
 *
 * @since 1.0.0
 * @return string Layout class.
 */
function thmfdn_content_sidebar_sidebar_page() {
	return 'content-sidebar-sidebar';
}
add_filter( 'thmfdn_layout_class', 'thmfdn_content_sidebar_sidebar_page' );

// Loads the default page template.
require_once( get_stylesheet_directory() . '/page.php' );
