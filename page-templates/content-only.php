<?php

/**
 * Single page template with no sidebars and standard size content
 *
 * @package Longview
 * @since 1.0
 */

/*
Template Name: No Sidebars
*/

/**
 * Sets the layout class
 *
 * @since 1.0
 * @return string Layout class.
 */
function thmfdn_no_sidebars_page() {
	return 'content-only';
}
add_filter( 'thmfdn_layout_class', 'thmfdn_no_sidebars_page' );

// Loads the default page template.
require_once( get_stylesheet_directory() . '/page.php' );
