<?php
/**
 *  Single post template
 *
 * @package THMFDN
 * @since 1.0
 */


function thmfdn_attachment_template() {
	remove_action( 'thmfdn_entry', 'thmfdn_single_comments' );
	remove_action( 'thmfdn_entry', 'thmfdn_single_meta_top' );
}
add_action( 'thmfdn_template_setup', 'thmfdn_attachment_template' );


function thmfdn_attachment_content( $content ) {
	if ( wp_attachment_is_image() ) {
		return wp_get_attachment_image( $post->ID, 'large' ); // filterable image width with, essentially, no limit for image height.
	} else {
		return $content;
	}
}
add_filter( 'the_content', 'thmfdn_attachment_content' );



// Loads the default page template.
require( dirname(__FILE__) . '/single.php' ); 