<?php
/**
 * Filters
 *
 * @package Longview
 * @since 1.0.0
 */

/**
 * Filters page templates listed in the page editor drop down list
 *
 * @since 1.0.0
 * @param array $page_templates Array of page templates.
 * @return array $page_templates Updated array of page templates.
 */
function thmfdn_filter_page_templates( $page_templates ) {
	global $wp_registered_sidebars;

	if ( ! array_key_exists( 'sidebar-1', $wp_registered_sidebars ) && ! array_key_exists( 'sidebar-2', $wp_registered_sidebars ) ) {
		unset( $page_templates['page-templates/content-sidebar.php'] );
		unset( $page_templates['page-templates/sidebar-content.php'] );
	}

	if ( ! array_key_exists( 'sidebar-2', $wp_registered_sidebars ) ) {
		unset( $page_templates['page-templates/content-sidebar-sidebar.php'] );
		unset( $page_templates['page-templates/sidebar-sidebar-content.php'] );
		unset( $page_templates['page-templates/sidebar-content-sidebar.php'] );
	}

	return $page_templates;
}
add_filter( 'theme_page_templates', 'thmfdn_filter_page_templates');

/**
 * Adds layout class to body element
 *
 * @since 1.0.0
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
 * Adds format class to .primary column
 *
 * @param string $classes String of class names used for the .primary column.
 * @return string $classes Updated string of class names used for the .primary column.
 */
function thmfdn_content_class_format( $classes ) {

	// Gets the layout class.
	$format_class = get_thmfdn_content_format();

	// Adds the layout class to the existing string of classes.
	if ( ! empty( $format_class ) ) {
		$classes .= ' ' . 'thmfdn-' . $format_class;
	}

	return $classes;
}
add_filter( 'thmfdn_content_class', 'thmfdn_content_class_format' );


function thmfdn_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'thmfdn_excerpt_more' );