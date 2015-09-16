<?php

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