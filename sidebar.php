<?php
/**
 *  Sidebar template
 *
 * @package THMFDN
 * @since 1.0
 */

$sidebar_layout = get_thmfdn_layout();

// Is the first sidebar active and does the layout call for at least one sidebar?
if ( is_active_sidebar( 'sidebar-1' ) && substr_count( $sidebar_layout, 'sidebar' ) > 0 ) {
	do_action( 'thmfdn_sidebar_before' );

	echo '<div class="' . apply_filters( 'thmfdn_sidebar-1', 'secondary sidebar' ) . '" role="complementary">';
	do_action( 'thmfdn_sidebar_top' );
	dynamic_sidebar( 'sidebar-1' );
	do_action( 'thmfdn_sidebar_bottom' );
	echo '</div><!--.secondary-->';
	
	do_action( 'thmfdn_sidebar_after' );
}

// Is the second sidebar active and does the layout call for at least two sidebars?
if ( is_active_sidebar( 'sidebar-2' ) && substr_count( $sidebar_layout, 'sidebar' ) > 1 ) {
	do_action( 'thmfdn_sidebar_before' );

	echo '<div class="' . apply_filters( 'thmfdn_sidebar-2', 'tertiary sidebar' ) . '" role="complementary">';
	do_action( 'thmfdn_sidebar_top' );
	dynamic_sidebar( 'sidebar-2' );
	do_action( 'thmfdn_sidebar_bottom' );
	echo '</div><!--.tertiary-->';
	
	do_action( 'thmfdn_sidebar_after' );
}
