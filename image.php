<?php
/**
 * Image attachment template
 *
 * @package Longview
 * @since 1.0.0
 */

/**
 * Replaces typical post content with the image attachment
 *
 * @since 1.0.0
 * @param string $content Post content.
 */
function thmfdn_attachment_content( $content ) {
	global $post;

	return wp_get_attachment_image( $post->ID, 'large' );
}
add_filter( 'the_content', 'thmfdn_attachment_content' );

/**
 * Adds link back to attached post
 *
 * @since 1.0.0
 */
function thmfdn_attachment_template() {
	the_post_navigation();
}
add_action( 'thmfdn_entry_content_after', 'thmfdn_attachment_template' );

// Loads the default page template.
require_once( get_stylesheet_directory() . '/page.php' );
