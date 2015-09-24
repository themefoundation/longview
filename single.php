<?php
/**
 *  Single post template
 *
 * @package Longview
 * @since 1.0.0
 */

if ( !function_exists( 'thmfdn_single_featured_image' ) ) {
	/**
	 * Featured image
	 *
	 * Displays the featured image (formerly called the post thumbnail).
	 */
	function thmfdn_single_featured_image() {
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
// The thmfdn_header_after action hook is located in the header.php file.
add_action( 'thmfdn_header_after', 'thmfdn_single_featured_image', 50 );

if ( !function_exists( 'thmfdn_template_part_single' ) ) {
	/**
	 * Single template part
	 *
	 * Filters the default template part to use.
	 */
	function thmfdn_template_part_single() {
		return 'single';
	}
}
// The thmfdn_template_part_name filter hook is located in the index.php file.
add_filter( 'thmfdn_template_part_name', 'thmfdn_template_part_single' );

// Loads the default template.
require_once( get_stylesheet_directory() . '/index.php' );
