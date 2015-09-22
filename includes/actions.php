<?php
/**
 * Actions
 *
 * @package THMFDN
 */


/**
 * Loads files based on theme support
 *
 * @since 1.0
 */
function thmfdn_theme_support() {
	require_if_theme_supports( 'welcome-screen', get_stylesheet_directory() . '/includes/welcome-screen.php' );
	require_if_theme_supports( 'menu-descriptions', get_stylesheet_directory() . '/includes/menu-descriptions.php' );
	require_if_theme_supports( 'portfolio', get_stylesheet_directory() . '/includes/portfolio.php' );
}
add_action( 'init', 'thmfdn_theme_support', 20 );


/**
 * Loads the default scripts and stylesheets
 *
 * @since 1.0
 */
function thmfdn_enqueue() {

	wp_enqueue_style( 'open_sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' );
	wp_enqueue_style( 'thmfdn_stylesheet', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'mojs', get_template_directory_uri() . '/js/mo.js', 'jquery' );
	wp_enqueue_script( 'longview', get_template_directory_uri() . '/js/longview.js', 'mojs' );

	// Loads the comment script if a single post is being displayed.
	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'thmfdn_comment_reply', 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'thmfdn_enqueue' );

/**
 * Loads stylesheet for the post editor.
 *
 * @since			1.0
 */
function thmfdn_editor_style() {
	add_editor_style();
}
add_action( 'admin_init', 'thmfdn_editor_style' );