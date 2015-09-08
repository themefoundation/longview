<?php
/**
 * Settings
 *
 * This file contains common settings for the THMFDN theme.
 *
 * @package THMFDN
 */

/**
 * Configures default settings.
 *
 * @since 1.0
 */
function thmfdn_defaults() {

	// Sets the default content width.
	if ( ! isset( $content_width ) ) $content_width = 900;

	// Adds automatic feed link support.
	add_theme_support( 'automatic-feed-links' );

	// Adds featured image support.
	add_theme_support( 'post-thumbnails' );

	// Ensures WP outputs HTML5 when possible.
	$html5_support = array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
	);
	add_theme_support( 'html5', $html5_support );

	// Sets additional image sizes
	add_image_size( 'grid', 300, 200, true );

}
add_action( 'init', 'thmfdn_defaults' );

/**
 * Sets layout defaults
 *
 * These are the supported layouts:
 * - content-only (Content takes up center column and no sidebars present)
 * - content-full-width (Content takes up all columns and no sidebars present)
 * - content-sidebar (Content on the left, single sidebar on the right)
 * - content-sidebar-sidebar (Content on the left, double sidebars on the right)
 * - sidebar-content (Single sidebar on the left, content on the right)
 * - sidebar-sidebar-content (Double sidebars on the left, content on the right)
 * - sidebar-content-sidebar (First sidebar on the left, content in the center, and second sidebar on the iis_get_server_rights(server_instance, virtual_path))
 *
 * @since 1.0
 * @return string Layout class name.
 */
function get_thmfdn_layout() {

	// Default layout
	$layout_class = 'content-sidebar-sidebar';

	// Overrides default layout for single posts.
	if ( is_single () ) {
		$layout_class = 'sidebar-sidebar-content';
	} 

	// Overrides default layout for pages.
	if ( is_page() ) {
		$layout_class = 'sidebar-content';
	}

	// Overrides default layout for archives.
	if ( is_archive() ) {
		$layout_class = 'content-full-width';
	}


	return apply_filters( 'thmfdn_layout_class', $layout_class );
}

/**
 * Adds layout class to body element
 *
 * @param array $classes Array of class names used for the <body> tag.
 * @return array $classes Updated array of class names used for the <body> tag.
 */
function thmfdn_body_class_layout( $classes ) {

	// Gets the layout class.
	$layout_class = get_thmfdn_layout();

	// Adds the layout class to the existing array of classes.
	$classes[] = $layout_class;

	return $classes;
}
add_filter( 'body_class', 'thmfdn_body_class_layout' );

/**
 * Sets content format defaults
 *
 * Content formats define the layout/format of the content portion the page.
 * Simply put, this controls the format of the primary column. While this
 * could be put into use on any type of page, it is primarily used on
 * archive pages.
 *
 * These are the supported content formats:
 * - content (Standard blog format, single column of posts)
 * - grid (Rows of content, multiple columns)
 *
 * @since 1.0
 * @return string Layout class name.
 */
function get_thmfdn_content_format() {

	// Default layout
	$format_class = get_post_format();

	// Overrides default layout for single posts.
	if ( is_archive() ) {
		$format_class = 'grid';
	} 

	// Overrides default layout for pages.
	if ( is_page() ) {
		$format_class = 'grid';
	}

	return apply_filters( 'thmfdn_content_format_class', $format_class );
}
add_filter( 'thmfdn_template_part_name', 'get_thmfdn_content_format' );

/**
 * Adds format class to .primary column
 *
 * @param string $classes String of class names used for the .primary column.
 * @return string $classes Updated string of class names used for the .primary column.
 */
function thmfdn_content_class_format( $classes ) {

	// Gets the layout class.
	$format_class = get_thmfdn_content_format();

	// Adds the layout class to the existing string of classes.
	$classes .= ' ' . $format_class;

	return $classes;
}
add_filter( 'thmfdn_content_class', 'thmfdn_content_class_format' );

/**
 * Sets the default thumbnail size.
 *
 * This doesn't set the exact dimensions of the image. It only sets which of the
 * default WordPress sizes are used. To set the exact dimenstion of the default
 * image sizes, use the Settings > Media page of the WordPress dashboard.
 *
 * Available sizes:
 * - thumbnail
 * - medium
 * - large
 * - full
 * - any custom image size introduced by the theme or a plugin
 *
 * @since 1.0
 * @param string $thumbnail_size Existing image size.
 * @return string $thumbnail_size Image size to use.
 */
function thmfdn_thumbnail_size( $thumbnail_size ) {

	// Overrides default layout for single posts.
	if ( is_single () ) {
		$thumbnail_size = 'large';
	} 

	// Overrides default layout for pages.
	if ( is_page() ) {
		$thumbnail_size = 'large';
	}

	return $thumbnail_size;
}
add_filter( 'thmfdn_thumbnail_size', 'thmfdn_thumbnail_size' );


/**
 * Post meta above content
 *
 * Configures the displayed post meta. This setting is controlled by an array
 * of meta data types and the titles to use with each. Available meta data
 * types include:
 *
 * author - Author name. Uses: the_author()
 * author_website - Author name as link to author's website. Uses: the_author_link()
 * author_posts - Author name as link to author archive. Uses: the_author_posts_link()
 * categories - List of post's categories. Uses: the_category()
 * date - Post date. Uses: the_time( get_option( 'date_format' ) )
 * tags - List of post's tags. Uses: the_tags()
 * 
 * @return array An array of meta/title combinations to display.
 * @since 1.0
 */
function thmfdn_settings_single_meta_top() {
	$meta_top_args = array(
		'date' => ''
	);

	return $meta_top_args;
}
add_filter ( 'thmfdn_single_meta_top', 'thmfdn_settings_single_meta_top' );
add_filter ( 'thmfdn_archive_meta_top', 'thmfdn_settings_single_meta_top' );

/**
 * Post meta below content
 *
 * Configures the displayed post meta. This setting is controlled by an array
 * of meta data types and the titles to use with each. Available meta data
 * types include:
 *
 * author - Author name. Uses: the_author()
 * author_website - Author name as link to author's website. Uses: the_author_link()
 * author_posts - Author name as link to author archive. Uses: the_author_posts_link()
 * categories - List of post's categories. Uses: the_category()
 * date - Post date. Uses: the_time( get_option( 'date_format' ) )
 * tags - List of post's tags. Uses: the_tags()
 * 
 * @return array An array of meta/title combinations to display.
 * @since 1.0
 */
function thmfdn_settings_single_meta_bottom() {
	$meta_bottom_args = array(
		'tags' => ''
	);
	
	return $meta_bottom_args;
}
add_filter ( 'thmfdn_single_meta_bottom', 'thmfdn_settings_single_meta_bottom' );
add_filter ( 'thmfdn_archive_meta_bottom', 'thmfdn_settings_single_meta_bottom' );

/**
 * Removes the post title from single posts
 * 
 * @since 1.0
 */
function thmfdn_remove_single_title(){
    remove_action( 'thmfdn_entry', 'thmfdn_single_title' );
}
// add_action( 'thmfdn_entry', 'thmfdn_remove_single_title', 9 ); // Single posts

/**
 * Removes the post titles from archive pages
 * 
 * @since 1.0
 */
function thmfdn_remove_archive_title(){
    remove_action( 'thmfdn_entry', 'thmfdn_archive_title' );
}
// add_action( 'thmfdn_entry', 'thmfdn_remove_archive_title', 9 ); // Archive posts

/**
 * Removes the thumbnail images from single posts
 * 
 * @since 1.0
 */
function thmfdn_remove_single_featured_image(){
    remove_action( 'thmfdn_entry', 'thmfdn_single_featured_image' );
}
// add_action( 'thmfdn_entry', 'thmfdn_remove_single_featured_image', 9 ); // Single posts

/**
 * Removes the thumbnail images from archive pages
 * 
 * @since 1.0
 */
function thmfdn_remove_archive_featured_image(){
    remove_action( 'thmfdn_entry', 'thmfdn_archive_featured_image' );
}
// add_action( 'thmfdn_entry', 'thmfdn_remove_archive_featured_image', 9 ); // Archive posts

/**
 * Removes comments from single posts
 * 
 * @since 1.0
 */
function thmfdn_remove_single_comments(){
    remove_action( 'thmfdn_entry', 'thmfdn_single_comments' );
}
// add_action( 'thmfdn_entry', 'thmfdn_remove_single_comments', 9 ); // Single posts
