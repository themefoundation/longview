<?php
/**
 * Actions
 *
 * @package THMFDN
 */



// Sidebar actions.
// add_action( 'widgets_init', 'thmfdn_register_sidebar_one' );
// add_action( 'widgets_init', 'thmfdn_register_sidebar_two' );

/**
 * Remove widget areas
 *
 * Uncommenting any of the lines below will remove that widget area from
 * the theme.
 *
 * @since 1.0
 */
function thmfnd_remove_widget_areas(){
	// unregister_sidebar( 'sidebar-1' );
	// unregister_sidebar( 'sidebar-2' );
	// unregister_sidebar( 'header-before' );
	// unregister_sidebar( 'header-inside' );
	// unregister_sidebar( 'header-after' );
	// unregister_sidebar( 'footer-before' );
	// unregister_sidebar( 'footer-inside' );
	// unregister_sidebar( 'footer-after' );
}
add_action( 'widgets_init', 'thmfnd_remove_widget_areas', 11 );