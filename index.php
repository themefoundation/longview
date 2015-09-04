<?php
/**
 *  Index template
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

add_action( 'thmfdn_content_top', 'thmfdn_content_open' );
add_action( 'thmfdn_content_top', 'thmfdn_archive_title' );
add_action( 'thmfdn_content_bottom', 'thmfdn_pagination' );
add_action( 'thmfdn_content_bottom', 'thmfdn_content_close' );

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

// Overrides default template part used for post content.
add_action( 'thmfdn_content_part', 'thmfdn_grid' );


/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0
 */

if ( !function_exists( 'thmfdn_content_open' ) ) {
	/**
	 * Primary opening
	 *
	 * Opens the #primary div column and the #content div. This theme supports
	 * up to three columns, #primary, #secondary, and #tertiary.
	 *
	 * This function is repeated in the base template files (index.php,
	 * page.php, and single.php). This duplication is the unfortunate side
	 * effect of trying to keep everything in its natural place.
	 *
	 * @since 1.0
	 */
	function thmfdn_content_open() {
		?>
			<div id="content" class="<?php echo apply_filters( 'thmfdn_content_class', 'primary hfeed' ) ?>" role="main">
		<?php
	}
}

if ( !function_exists( 'thmfdn_archive_title' ) ) {
	/**
	 * Archive title
	 *
	 * Displays the title for archive pages.
	 *
	 * @since 1.0
	 * @see https://developer.wordpress.org/reference/functions/the_archive_title/
	 */
	function thmfdn_archive_title() {
		
		$thmfdn_archive_title = get_the_archive_title();
		if ( 'Archives' != $thmfdn_archive_title ) {
			echo '<h1 class="page-title">' . $thmfdn_archive_title . '</h1>';
		}
		the_archive_description( '<p class="page-description">', '</p>' );
	}
}

if ( !function_exists( 'thmfdn_pagination' ) ) {
	/**
	 * Content closing
	 *
	 * Closes the #content div.
	 *
	 * This function is repeated in the base template files (index.php,
	 * page.php, and single.php). This duplication is the unfortunate side
	 * effect of trying to keep everything in its natural place.
	 *
	 * @since 1.0
	 */
	function thmfdn_pagination() {
		the_posts_pagination();
	}
}

if ( !function_exists( 'thmfdn_content_close' ) ) {
	/**
	 * Content closing
	 *
	 * Closes the #content div.
	 *
	 * This function is repeated in the base template files (index.php,
	 * page.php, and single.php). This duplication is the unfortunate side
	 * effect of trying to keep everything in its natural place.
	 *
	 * @since 1.0
	 */
	function thmfdn_content_close() {
		?>
			</div><!-- #content -->
		<?php
	}
}

/**
 *****************************************************************************
 * Define filters
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0
 */
if ( !function_exists( 'thmfdn_grid' ) ) {
	/**
	 * Grid template
	 *
	 * This function specifies which template part should be used.
	 *
	 * @since 1.0
	 */
	function thmfdn_grid() {
		return 'grid';
	}
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

get_header();

// Use this hook to add and remove actions.
do_action( 'thmfdn_template_setup' );

do_action( 'thmfdn_content_before' );
do_action( 'thmfdn_content_top' );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', apply_filters( 'thmfdn_content_part', '' ) );
	}
} else {
	get_template_part( 'template-parts/404' );
}

do_action( 'thmfdn_content_bottom' );
do_action( 'thmfdn_content_after' );

get_sidebar();
get_footer();
