<?php
/**
 *  Single post template
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
add_action( 'thmfdn_header_after', 'thmfdn_single_featured_image', 50 );

add_action( 'thmfdn_content_top', 'thmfdn_content_open' );



add_action( 'thmfdn_content_bottom', 'thmfdn_content_close' );


/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0
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

if ( !function_exists( 'thmfdn_content_open' ) ) {
	/**
	 * Primary opening
	 *
	 * Opens the #primary div column and the #content div. This theme supports
	 * up to three columns, #primary, #secondary, and #tertiary.
	 *
	 * This function is repeated in the base template files (index.php, page.php,
	 * and single.php files. This duplication is the unfortunate side effect of
	 * trying to keep everything in its natural place.
	 *
	 * @since 1.0
	 */
	function thmfdn_content_open() {
		?>
			<div id="content" class="<?php echo apply_filters( 'thmfdn_content_class', 'primary hfeed' ) ?>" role="main">
		<?php	}
}



if ( !function_exists( 'thmfdn_content_close' ) ) {
	/**
	 * Content closing
	 *
	 * Closes the #content div.
	 *
	 * This function is repeated in the page.php and single.php files. This
	 * duplication is the unfortunate side effect of trying to keep everything
	 * in its natural place.
	 *
	 * @since 1.0
	 */
	function thmfdn_content_close() {
		?>
			</div><!-- #content -->
		<?php	}
}

/**
 *****************************************************************************
 * Do actions
 *****************************************************************************
 *
 * This section runs the actions associated with each hook.
 *
 * @see http://codex.wordpress.org/Function_Reference/do_action
 * @since 1.0
 */

// Use this hook to add and remove actions.
do_action( 'thmfdn_template_setup' );

get_header();

do_action( 'thmfdn_content_before' );
do_action( 'thmfdn_content_top' );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		// do_action( 'thmfdn_entry_before' );
		// do_action( 'thmfdn_entry_top' );
		// do_action( 'thmfdn_entry' );
		// do_action( 'thmfdn_entry_bottom' );
		// do_action( 'thmfdn_entry_after' );

		get_template_part( apply_filters( 'thmfdn_template_part_slug', 'template-parts/content' ), apply_filters( 'thmfdn_template_part_name', 'single' ) );

	}
} else {
	get_template_part( 'template-parts/404' );
}

do_action( 'thmfdn_content_bottom' );
do_action( 'thmfdn_content_after' );

get_sidebar();
get_footer();
