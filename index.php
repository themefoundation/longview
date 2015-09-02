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
add_action( 'thmfdn_content_bottom', 'thmfdn_pagination' );
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
		

if ( !function_exists( 'thmfdn_index_post_open' ) ) {
	/**
	 * Open #post div
	 *
	 * @since 1.0
	 */
	function thmfdn_index_post_open() {
		?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
	}
}

if ( !function_exists( 'thmfdn_index_featured_image' ) ) {
	/**
	 * Featured image
	 *
	 * Displays the featured image (formerly called the post thumbnail).
	 *
	 * @since 1.0
	 */
	function thmfdn_index_featured_image() {
		the_post_thumbnail( apply_filters( 'thmfdn_index_thumbnail_size', apply_filters( 'thmfdn_thumbnail_size', '' ) ) );
		echo "\n";
	}
}

if ( !function_exists( 'thmfdn_index_entry_title' ) ) {
	/**
	 * Entry title
	 *
	 * Displays the post title.
	 *
	 * @since 1.0
	 */
	function thmfdn_index_entry_title() {
		echo '<h2 class="' . apply_filters( 'thmfdn_entry_title_class', 'entry-title' ) . '">';
		echo '<a href="' . get_permalink() . '">';
		the_title();
		echo '</a>';
		echo '</h2>' . "\n";
	}
}

if ( !function_exists( 'thmfdn_index_meta' ) ) {
	/**
	 * Entry meta
	 *
	 * Displays the post meta data.
	 *
	 * @since 1.0
	 */
	function thmfdn_index_meta() {
		echo '<div class="' . apply_filters( 'thmfdn_entry_meta_class', 'entry-meta' ) . '">';
		get_template_part( 'template-parts/entry', 'meta' );
		echo '</div>' . "\n";
	}
}

if ( !function_exists( 'thmfdn_index_content' ) ) {
	/**
	 * Entry content
	 *
	 * Displays the post content.
	 *
	 * @since 1.0
	 */
	function thmfdn_index_content() {
		echo '<div class="' . apply_filters( 'thmfdn_entry_title_class', 'entry-content' ) . '">' . "\n";
		the_content();
		echo '</div><!--.entry-content-->' . "\n";
	}
}

if ( !function_exists( 'thmfdn_index_post_close' ) ) {
	/**
	 * Close #post div
	 *
	 * @since 1.0
	 */
	function thmfdn_index_post_close() {
		?>
			</div><!-- #post-number -->
		<?php
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
		get_template_part( 'template-parts/content' );
	}
} else {
	get_template_part( 'template-parts/404' );
}

do_action( 'thmfdn_content_bottom' );
do_action( 'thmfdn_content_after' );

get_sidebar();
get_footer();
