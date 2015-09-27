<?php
/**
 * Content for archives
 *
 * @package Longview
 * @since 1.0.0
 */

/**
 *****************************************************************************
 * Add actions
 *****************************************************************************
 *
 * This section adds actions to their respective action hooks.
 *
 * @see http://codex.wordpress.org/Function_Reference/add_action
 * @since 1.0.0
 */

if( !function_exists( 'thmfdn_archive_setup' ) ) {
	/**
	 * Adds and removes actions from the hooks in the base template part
	 */
	function thmfdn_archive_setup() {
		add_action( 'thmfdn_entry', 'thmfdn_archive_featured_image', 50 );
		add_action( 'thmfdn_entry', 'thmfdn_archive_meta_top', 150 );
		add_action( 'thmfdn_entry', 'thmfdn_archive_meta_bottom', 250 );
	}
}
add_action( 'thmfdn_template_part_setup', 'thmfdn_archive_setup' );


/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0.0
 */

if ( !function_exists( 'thmfdn_archive_featured_image' ) ) {
	/**
	 * Featured image
	 *
	 * Displays the featured image (formerly called the post thumbnail).
	 *
	 * @since 1.0.0
	 */
	function thmfdn_archive_featured_image() {
		the_post_thumbnail( apply_filters( 'thmfdn_archive_thumbnail_size', apply_filters( 'thmfdn_thumbnail_size', '' ) ) );
		echo "\n";
	}
}

if ( !function_exists( 'thmfdn_archive_meta_top' ) ) {
	/**
	 * Entry meta
	 *
	 * Displays the post meta data.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_archive_meta_top() {
		$meta_args = apply_filters( 'thmfdn_archive_meta_top', array() );
		if ( !empty( $meta_args ) ) {
			echo '<div class="' . apply_filters( 'thmfdn_entry_meta_top_class', 'entry-meta-top' ) . '">';
			thmfdn_post_meta( $meta_args );
			echo '</div>' . "\n";
		}
	}
}

if ( !function_exists( 'thmfdn_archive_meta_bottom' ) ) {
	/**
	 * Entry meta
	 *
	 * Displays the post meta data.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_archive_meta_bottom() {
		$meta_args = apply_filters( 'thmfdn_archive_meta_bottom', array() );
		if ( !empty( $meta_args ) ) {
			echo '<div class="' . apply_filters( 'thmfdn_entry_meta_bottom_class', 'entry-meta-bottom' ) . '">';
			thmfdn_post_meta( $meta_args );
			echo '</div>' . "\n";
		}
	}
}

// Loads the default template part.
get_template_part( 'template-parts/content' );
