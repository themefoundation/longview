<?php
/**
 * Image attachment template
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

/**
 * Displays the Before Footer widget area
 *
 * @since 1.0.0
 * @param string $content Post content.
 */
function thmfdn_attachment_content( $content ) {
	global $post;

	return wp_get_attachment_image( $post->ID, 'large' ); // filterable image width with, essentially, no limit for image height.
}
add_filter( 'the_content', 'thmfdn_attachment_content' );

// Loads the default single post template.
require_once( get_stylesheet_directory() . '/single.php' );
