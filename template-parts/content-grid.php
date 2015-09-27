<?php
/**
 * Content for grid style archives
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
if( !function_exists( 'thmfdn_content_grid_setup' ) ) {
	/**
	 * Adds and removes actions from the hooks in the base template part
	 */
	function thmfdn_content_grid_setup() {
		remove_action( 'thmfdn_entry', 'thmfdn_content', 200 );

		add_action( 'thmfdn_entry', 'thmfdn_archive_featured_image', 50 );
		add_action( 'thmfdn_entry', 'thmfdn_archive_excerpt', 150 );
	}
}
add_action( 'thmfdn_template_part_setup', 'thmfdn_content_grid_setup' );

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
		echo '<a href="' . get_permalink() . '">';
		the_post_thumbnail( apply_filters( 'thmfdn_thumbnail_size', 'grid' ) );
		echo '</a>';
	}
}

if ( !function_exists( 'thmfdn_archive_excerpt' ) ) {
	/**
	 * Entry content
	 *
	 * Displays the post content.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_archive_excerpt() {
		echo '<div class="' . apply_filters( 'thmfdn_entry_content_class', 'entry-content' ) . '">' . "\n";
		the_excerpt();
		echo '</div><!--.entry-content-->' . "\n";
	}
}

// Loads the default template part.
get_template_part( 'template-parts/content' );

