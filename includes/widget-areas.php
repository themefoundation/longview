<?php
/**
 * Widget areas
 *
 * This file registers the widget areas and provides functions related to
 * displaying the widget areas.
 *
 * @package Longview
 * @since 1.0.0
 */

/**
 * Registers sidebars
 *
 * @since 1.0.0
 */
function thmfdn_register_sidebars() {

	// Registers the main sidebar widget area.
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'thmfdn_textdomain' ),
			'id' => 'sidebar-1',
			'description' => __( 'This is the main sidebar.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the additional sidebar widget area.
	register_sidebar(
		array(
			'name' => __( 'Additional Sidebar', 'thmfdn_textdomain' ),
			'id' => 'sidebar-2',
			'description' => __( 'This is the secondary sidebar.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area before the header.
	register_sidebar(
		array(
			'name' => __( 'Before Header', 'thmfdn_textdomain' ),
			'id' => 'header-before',
			'description' => __( 'Displayed above the header area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area in the header.
	register_sidebar(
		array(
			'name' => __( 'Inside Header', 'thmfdn_textdomain' ),
			'id' => 'header-inside',
			'description' => __( 'Displayed in the header area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area after the header.
	register_sidebar(
		array(
			'name' => __( 'After Header', 'thmfdn_textdomain' ),
			'id' => 'header-after',
			'description' => __( 'Displayed below the header area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area before the footer.
	register_sidebar(
		array(
			'name' => __( 'Before Footer', 'thmfdn_textdomain' ),
			'id' => 'footer-before',
			'description' => __( 'Displayed above the footer area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area before the footer.
	register_sidebar(
		array(
			'name' => __( 'Inside Footer', 'thmfdn_textdomain' ),
			'id' => 'footer-inside',
			'description' => __( 'Displayed in the footer area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area before the footer.
	register_sidebar(
		array(
			'name' => __( 'After Footer', 'thmfdn_textdomain' ),
			'id' => 'footer-after',
			'description' => __( 'Displayed below the footer area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area for the 404 page.
	register_sidebar(
		array(
			'name' => __( '404', 'thmfdn_textdomain' ),
			'id' => '404',
			'description' => __( 'Displayed on the 404 page.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

}
add_action( 'widgets_init', 'thmfdn_register_sidebars' );
