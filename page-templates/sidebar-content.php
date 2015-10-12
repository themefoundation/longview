<?php

/**
 * Single page template with single left sidebar
 *
 * @package Longview
 * @since 1.0.0
 */

/*
Template Name: Sidebar-Content
*/

/**
 * Sets the layout class
 *
 * @since 1.0.0
 * @return string Layout class.
 */
function thmfdn_sidebar_content_page() {
	return 'sidebar-content';
}
add_filter( 'thmfdn_layout_class', 'thmfdn_sidebar_content_page' );

// Loads the default page template.
require_once( get_stylesheet_directory() . '/page.php' );
