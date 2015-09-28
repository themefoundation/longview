<?php
/**
 *  Single page template
 *
 * @package Longview
 * @since 1.0.0
 */

if ( !function_exists( 'thmfdn_page_featured_image' ) ) {
	/**
	 * Featured image
	 *
	 * Displays the featured image (formerly called the post thumbnail).
	 *
	 * @since 1.0.0
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
// The thmfdn_header_after action hook is located in the header.php file.
add_action( 'thmfdn_header_after', 'thmfdn_page_featured_image', 50 );

if ( !function_exists( 'thmfdn_template_part_page' ) ) {
	/**
	 * Single template part
	 *
	 * Filters the default template part to use.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_template_part_page() {
		return '';
	}
}
// The thmfdn_template_part_name filter hook is located in the index.php file.
add_filter( 'thmfdn_template_part_name', 'thmfdn_template_part_page' );

// Loads the default template.
locate_template( array( 'index.php' ), true );
