<?php
/**
 * Actions
 *
 * @package Longview
 * @since 1.0.0
 */

/**
 * Loads files based on theme support
 *
 * @since 1.0.0
 */
function thmfdn_theme_support() {
	
	if ( current_theme_supports( 'welcome-screen' ) ) {
		locate_template( array( 'includes/welcome-screen.php' ), true );
	}

	if ( current_theme_supports( 'menu-descriptions' ) ) {
		locate_template( array( 'includes/menu-descriptions.php' ), true );
	}

	if ( current_theme_supports( 'portfolio' ) ) {
		locate_template( array( 'includes/portfolio.php' ), true );
	}
}
add_action( 'init', 'thmfdn_theme_support', 20 );

/**
 * Loads the default scripts and stylesheets
 *
 * @since 1.0.0
 */
function thmfdn_enqueue() {

	wp_enqueue_style( 'open_sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' );
	wp_enqueue_style( 'thmfdn_stylesheet', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'mojs', get_template_directory_uri() . '/js/mo.js', 'jquery' );
	wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', 'mojs' );

	// Loads the comment script if a single post is being displayed.
	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'thmfdn_enqueue' );

/**
 * Loads stylesheet for the post editor.
 *
 * @since 1.0.0
 */
function thmfdn_editor_style() {
	add_editor_style();
}
add_action( 'admin_init', 'thmfdn_editor_style' );

/**
 * Registers menus
 *
 * @since 1.0.0
 */
function thmfdn_menus() {
	register_nav_menus(
		array(
			'header_menu' => __( 'Header Menu' ),
			'footer_menu' => __( 'Footer Menu' )
		)
	);
}
add_action( 'init', 'thmfdn_menus' );
