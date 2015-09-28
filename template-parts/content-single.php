<?php
/**
 * Content for pages
 *
 * @package Longview
 * @since 1.0.0
 */

// Use this hook to add and remove actions.
do_action( 'thmfdn_template_part_setup' );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'thmfdn_entry_top' ); ?>

	<?php do_action( 'thmfdn_entry_title_before' ); ?>
	<?php if ( is_singular() ) { ?>
		<h1 class="<?php echo apply_filters( 'thmfdn_entry_title_class', 'entry-title' ); ?>">
			<?php the_title(); ?>
		</h1>
	<?php } else { ?>
		<h2 class="<?php echo apply_filters( 'thmfdn_entry_title_class', 'entry-title' ); ?>">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
	<?php } ?>
	<?php do_action( 'thmfdn_entry_title_after' ); ?>

	<?php thmfdn_post_meta( array( 'date' ), array( 'display_titles' => false ) ); ?>

	<?php do_action( 'thmfdn_entry_content_before' ); ?>
	<div class="<?php echo apply_filters( 'thmfdn_entry_content_class', 'entry-content' ); ?>">
		<?php the_content(); ?>
	</div><!--.entry-content-->
	<?php do_action( 'thmfdn_entry_content_after' ); ?>

	<?php
		// Display additional post meta (function located in includes/helpers.php file).
		thmfdn_post_meta( array( 'categories' ) );

		// Display post naviation (WordPress core function).
		the_post_navigation();

		// Loads comments.php file.
		comments_template();
	?>

	<?php do_action( 'thmfdn_entry_bottom' ); ?>
</div><!-- #post-number -->
