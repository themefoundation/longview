<?php
/**
 * Portfolio support
 *
 * This file contains functions to support for Devin Price's Portfolio Post
 * Type Plugin.
 *
 * @package Longview
 * @since 1.0.0
 * @see https://wordpress.org/plugins/portfolio-post-type/
 */

/**
 * Sets page layout for portfolio custom post type archive
 *
 * @since 1.0.0
 * @param string $layout String describing the layout.
 * @return string $layout String describing the layout.
 */
function thmfdn_portfolio_archive_layout( $layout ) {
	if ( is_post_type_archive( 'portfolio' ) ) {
		$layout = 'content-full-width';
	}

	return $layout;
}
add_filter( 'thmfdn_layout_class', 'thmfdn_portfolio_archive_layout' );


/**
 * Sets fontent format for portfolio custom post type archive
 *
 * @since 1.0.0
 * @param string $layout String describing the layout.
 * @return string $layout String describing the layout.
 */
function thmfdn_portfolio_archive_content_format( $format ) {
	// Overrides default content format for portfolio archives.
	if ( is_post_type_archive( 'portfolio' ) ) {
		$format = 'gallery';
	}

	return $format;
}
add_filter( 'thmfdn_content_format_class', 'thmfdn_portfolio_archive_content_format' );


/**
 * Removes comment form from single portfolio pages.
 *
 * @since 1.0.0
 */
function thmfdn_portfolio_remove_comments() {
	remove_action( 'thmfdn_entry', 'thmfdn_single_comments' );
}
add_action( 'thmfdn_template_part_setup', 'thmfdn_portfolio_remove_comments' );

/**
 * Removes page title form portfolio archive pages
 *
 * @since 1.0.0
 */
function thmfdn_portfolio_archive_remove_title() {
	if ( is_post_type_archive( 'portfolio' ) ) {
		remove_action( 'thmfdn_content_top', 'thmfdn_archive_title' );
	}
}
add_action( 'thmfdn_template_setup', 'thmfdn_portfolio_archive_remove_title' );