<?php

/**
 * Single page template with one left sidebar and one right sidebar
 *
 * @package Longview
 * @since 1.0.0
 */

/*
Template Name: Sidebar-Content-Sidebar
*/

/**
 * Sets the layout class
 *
 * @since 1.0.0
 * @return string Layout class.
 */
function thmfdn_sidebar_content_sidebar_page() {
	return 'sidebar-content-sidebar';
}
add_filter( 'thmfdn_layout_class', 'thmfdn_sidebar_content_sidebar_page' );

// Loads the default page template.
locate_template( array( 'page.php' ), true );
