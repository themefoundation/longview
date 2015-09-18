<?php
/**
 * Welcome
 *
 * This file contains functions to add a welcome screen when the
 * theme is activated.
 *
 * @package Longview
 * @since 1.0.0
 */

/**
 * Adds welcome screen to WordPress dashboard
 *
 * @since 1.0
 */
function thmfdn_welcome_page() {
	add_theme_page( 'Welcome', 'Welcome', 'switch_themes', 'thmfdn-welcome', 'thmfdn_welcome_content' );
}
add_action( 'admin_menu', 'thmfdn_welcome_page' );

/**
 * Displays welcome screen content
 *
 * @since 1.0
 */
function thmfdn_welcome_content() {
	?>
		<div class="wrap">
			<h1><?php _e( 'Welcome to the Longview theme', 'thmfdn_textdomain' ); ?></h1>
			<p><?php _e( 'Thanks for installing Longview. This welcome screen exists primarily as a template so you can create your own welcome screen.', 'thmfdn_textdomain' ); ?></p>
			<p><?php _e( 'To modify this screen, please see the <strong>longview/includes/welcome.php</strong> file. To disable this welcome screen, comment out the <strong>include_once( \'includes/welcome.php\' );</strong> line in the <strong>longview/includes/functions.php</strong> file.', 'thmfdn_textdomain' ); ?></p>
		</div>
	<?php
}

/**
 * Redirects to the welcome screen on theme activation
 *
 * When the theme is first activated, this function redirects the user who
 * activated the theme to the welcome page.
 *
 * @since 1.0
 */
function thmfdn_welcome_redirect( $plugin ) {
     wp_redirect( admin_url( 'themes.php?page=thmfdn-welcome' ) );
}
add_action( 'after_switch_theme', 'thmfdn_welcome_redirect' );

/**
 * Removes welcome screen menu item
 *
 * This page is only meant to be displayed when the theme is first activated.
 * This function removes the page from the admin menu so it doesn't hang
 * around and clutter things up later.
 *
 * @since 1.0
 */
function thmfdn_welcome_remove_menu_entry() {
    remove_submenu_page( 'themes.php', 'thmfdn-welcome' );
}
add_action( 'admin_head', 'thmfdn_welcome_remove_menu_entry' );
