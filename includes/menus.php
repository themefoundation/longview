<?php
/**
 * Menus
 *
 * This file defines the default menus.
 *
 * @package THMFDN
 */

/**
 * Registers menus
 *
 * @since 1.0
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