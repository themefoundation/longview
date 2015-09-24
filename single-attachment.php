<?php
/**
 *  Single post template
 *
 * @package Longview
 * @since 1.0.0
 */

/**
 * Remove unwanted elements
 *
 * @since 1.0.0
 */
function thmfdn_attachment_template() {
	remove_action( 'thmfdn_entry', 'thmfdn_single_comments' );
	remove_action( 'thmfdn_entry', 'thmfdn_single_meta_top' );
}
add_action( 'thmfdn_template_part_setup', 'thmfdn_attachment_template' );

// Loads the default single post template.
require_once( get_stylesheet_directory() . '/single.php' );
