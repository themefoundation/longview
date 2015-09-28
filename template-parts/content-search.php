<?php
/**
 * Content for search archives
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
	<h2 class="<?php echo apply_filters( 'thmfdn_entry_title_class', 'entry-title' ); ?>">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h2>
	<?php do_action( 'thmfdn_entry_title_after' ); ?>

	<?php do_action( 'thmfdn_entry_content_before' ); ?>
	<div class="<?php echo apply_filters( 'thmfdn_entry_content_class', 'entry-content' ); ?>">
		<?php the_excerpt(); ?>
	</div><!--.entry-content-->
	<?php do_action( 'thmfdn_entry_content_after' ); ?>

	<?php do_action( 'thmfdn_entry_bottom' ); ?>
</div><!-- #post-number -->
