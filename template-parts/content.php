<?php
/**
 * Content for archives
 *
 * @package THMFDN
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

add_action( 'thmfdn_entry_top', 'thmfdn_post_open' );

add_action( 'thmfdn_entry', 'thmfdn_archive_featured_image' );
add_action( 'thmfdn_entry', 'thmfdn_archive_title' );
add_action( 'thmfdn_entry', 'thmfdn_archive_meta_top' );
add_action( 'thmfdn_entry', 'thmfdn_archive_content' );
add_action( 'thmfdn_entry', 'thmfdn_archive_meta_bottom' );

add_action( 'thmfdn_entry_bottom', 'thmfdn_post_close' );

/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0
 */

if ( !function_exists( 'thmfdn_post_open' ) ) {
	/**
	 * Open #post div
	 *
	 * @since 1.0
	 */
	function thmfdn_post_open() {
		?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
	}
}

if ( !function_exists( 'thmfdn_archive_featured_image' ) ) {
	/**
	 * Featured image
	 *
	 * Displays the featured image (formerly called the post thumbnail).
	 *
	 * @since 1.0
	 */
	function thmfdn_archive_featured_image() {
		the_post_thumbnail( apply_filters( 'thmfdn_archive_thumbnail_size', apply_filters( 'thmfdn_thumbnail_size', '' ) ) );
		echo "\n";
	}
}

if ( !function_exists( 'thmfdn_archive_title' ) ) {
	/**
	 * Entry title
	 *
	 * Displays the post title.
	 *
	 * @since 1.0
	 */
	function thmfdn_archive_title() {
		echo '<h2 class="' . apply_filters( 'thmfdn_entry_title_class', 'entry-title' ) . '">';
		echo '<a href="' . get_permalink() . '">';
		the_title();
		echo '</a>';
		echo '</h2>' . "\n";
	}
}

if ( !function_exists( 'thmfdn_archive_meta_top' ) ) {
	/**
	 * Entry meta
	 *
	 * Displays the post meta data.
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

if ( !function_exists( 'thmfdn_archive_content' ) ) {
	/**
	 * Entry content
	 *
	 * Displays the post content.
	 *
	 * @since 1.0
	 */
	function thmfdn_archive_content() {
		echo '<div class="' . apply_filters( 'thmfdn_entry_content_class', 'entry-content' ) . '">' . "\n";
		the_content();
		echo '</div><!--.entry-content-->' . "\n";
	}
}

if ( !function_exists( 'thmfdn_archive_meta_bottom' ) ) {
	/**
	 * Entry meta
	 *
	 * Displays the post meta data.
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

if ( !function_exists( 'thmfdn_post_close' ) ) {
	/**
	 * Close #post div
	 *
	 * @since 1.0
	 */
	function thmfdn_post_close() {
		?>
			</div><!-- #post-number -->
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

// Use this hook to add and remove actions.
do_action( 'thmfdn_template_part_setup' );

do_action( 'thmfdn_entry_before' );
do_action( 'thmfdn_entry_top' );
do_action( 'thmfdn_entry' );
do_action( 'thmfdn_entry_bottom' );
do_action( 'thmfdn_entry_after' );
