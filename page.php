<?php
/**
 *  Single page template
 *
 * @package THMFDN
 * @since 1.0
 */

/**
 *****************************************************************************
 * Add actions
 *****************************************************************************
 *
 * This section adds actions to their respective action hooks.
 *
 * @see http://codex.wordpress.org/Function_Reference/add_action
 * @since 1.0
 */

// The thmfdn_header_after action hook is located in the header.php file.
add_action( 'thmfdn_header_after', 'thmfdn_page_featured_image', 50 );

/**
 *****************************************************************************
 * Add filters
 *****************************************************************************
 *
 * This section adds filters to their respective filter hooks.
 *
 * @see http://codex.wordpress.org/Function_Reference/add_filter
 * @since 1.0
 */

// The thmfdn_template_part_name filter hook is located in the index.php file.
add_filter( 'thmfdn_template_part_name', 'thmfdn_template_part_page' );


/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0
 */

if ( !function_exists( 'thmfdn_page_featured_image' ) ) {
	/**
	 * Featured image
	 *
	 * Displays the featured image (formerly called the post thumbnail).
	 *
	 * @since 1.0
	 */
	function thmfdn_page_featured_image() {
		if ( has_post_thumbnail() ) {
			?>
				<div class="row thmfdn-featured-image">
					<div class="wrap">
						<div>
							<?php the_post_thumbnail( apply_filters( 'thmfdn_thumbnail_size', '' ) ); ?>
						</div>
					</div>
				</div>
			<?php
		}
	}
}

/**
 *****************************************************************************
 * Define filters
 *****************************************************************************
 *
 * This section defines the filters associated with each hook.
 *
 * @since 1.0
 */

if ( !function_exists( 'thmfdn_template_part_page' ) ) {
	/**
	 * Single template part
	 *
	 * Filters the default template part to use.
	 */
	function thmfdn_template_part_page() {
		return 'page';
	}
}

/**
 *****************************************************************************
 * Load Template
 *****************************************************************************
 *
 * This section loads the default tamplate.
 *
 * @since 1.0
 */

require_once( get_stylesheet_directory() . '/index.php' );
