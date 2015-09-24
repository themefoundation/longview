<?php
/**
 * Helpers
 *
 * This file contains functions to extend the functionality of the
 * THMFDN theme.
 *
 * @package Longview
 * @since 1.0.0
 */

/**
 * Displays post meta based on $meta_args
 *
 * @since 1.0.0
 * @param array $meta_args Array of meta data to display.
 */
function thmfdn_post_meta( $meta_args = array() ) {
	if ( !empty( $meta_args ) ) {
		foreach ( $meta_args as $meta => $meta_title ) {
			switch ( $meta ) {
				case 'author':
					echo '<span class="meta author-wrap">' . $meta_title;
					echo '<span class="author">';
					the_author();
					echo '</span>';
					echo '</span>';
					break;
				case 'author_website':
					echo '<span class="meta author-wrap">' . $meta_title;
					echo '<span class="author">';
					the_author_link();
					echo '</span>';
					echo '</span>';
					break;
				case 'author_posts':
					echo '<span class="meta author-wrap">' . $meta_title;
					echo '<span class="author">';
					the_author_posts_link();
					echo '</span>';
					echo '</span>';
					break;
				case 'categories':
					echo '<span class="meta categories-wrap">' . $meta_title;
					echo '<span class="categories">';
					the_category();
					echo '</span>';
					echo '</span>';
					break;
				case 'date':
					echo '<span class="meta date-wrap">' . $meta_title;
					echo '<span class="date">';
					the_time( get_option( 'date_format' ) );
					echo '</span>';
					echo '</span>';
					break;
				case 'tags':
					echo '<span class="meta tags-wrap">';
					the_tags( $meta_title );
					echo '</span>';
					break;

				default:
					# code...
					break;
			}
		}
	}
}


/**
 * Counts the number of widgets in a widget area
 *
 * @since 1.0.0
 * @param string The ID of the widget area to count.
 * @return integer The number of widgets present in the specified widget area.
 */
function thmfdn_widget_count( $widget_area_id ) {
	$widget_areas = wp_get_sidebars_widgets();

	if( empty( $widget_areas[$widget_area_id] ) ) {
		return false;
	} else {
		return count( $widget_areas[$widget_area_id] );
	}
}

 /**
 * Checks if a sidebar is registered
 *
 * This is a workaround for is_active_sidebar(), which returns true for every
 * sidebar that has been registered, EVEN IF IT HAS BEEN UNREGISTERED. This
 * function is partially based on patch #24878 to WordPress core submitted
 * by GaryJ.
 *
 * @since  1.0.0
 * @see https://core.trac.wordpress.org/ticket/24878
 * @param string $name The ID of the sidebar when it was registered.
 * @return boolean True if the sidebar is registered, false otherwise.
 */
function thmfdn_is_registered_sidebar( $name ) {
	global $wp_registered_sidebars;

	if ( ! is_active_sidebar( $name ) ) {
		return false;
	} else {
		return isset( $wp_registered_sidebars[$name] );
	}
}

/**
 * Removes the post title from single posts
 *
 * @since 1.0.0
 */
function thmfdn_remove_single_title(){
	remove_action( 'thmfdn_entry', 'thmfdn_single_title' );
}
// add_action( 'thmfdn_entry', 'thmfdn_remove_single_title', 9 ); // Single posts

/**
 * Removes the post titles from archive pages
 *
 * @since 1.0.0
 */
function thmfdn_remove_archive_title(){
	remove_action( 'thmfdn_entry', 'thmfdn_archive_title' );
}
// add_action( 'thmfdn_entry', 'thmfdn_remove_archive_title', 9 ); // Archive posts

/**
 * Removes the thumbnail images from single posts
 *
 * @since 1.0.0
 */
function thmfdn_remove_single_featured_image(){
	remove_action( 'thmfdn_entry', 'thmfdn_single_featured_image' );
}
// add_action( 'thmfdn_entry', 'thmfdn_remove_single_featured_image', 9 ); // Single posts

/**
 * Removes the thumbnail images from archive pages
 *
 * @since 1.0.0
 */
function thmfdn_remove_archive_featured_image(){
	remove_action( 'thmfdn_entry', 'thmfdn_archive_featured_image' );
}
// add_action( 'thmfdn_entry', 'thmfdn_remove_archive_featured_image', 9 ); // Archive posts

/**
 * Removes comments from single posts
 *
 * @since 1.0.0
 */
function thmfdn_remove_single_comments(){
	remove_action( 'thmfdn_entry', 'thmfdn_single_comments' );
}
// add_action( 'thmfdn_entry', 'thmfdn_remove_single_comments', 9 ); // Single posts

/**
 * Writes $message to the WordPress log file
 *
 * This funciton checks if debugging is turned on. If it is, this function can
 * be use to wrote to the log file. This is helpful when trying to find the
 * contents of a variable. This is especially helpful when working in a context
 * that doesn't let the variable be printed to the screen.
 *
 * @since 1.0.0
 */
function thmfdn_log( $message ) {
	if( WP_DEBUG === true ){
		if( is_array( $message ) || is_object( $message ) ){
			error_log( print_r( $message, true ) );
		} else {
			error_log( $message );
		}
	}
}
