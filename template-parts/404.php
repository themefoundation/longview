<?php
/**
 *  404 template
 *
 * @package Longview
 * @since 1.0.0
 */

if( !function_exists( 'thmfdn_content_grid_setup' ) ) {
	/**
	 * Adds and removes actions from the hooks in the base template part
	 *
	 * @since 1.0.0
	 */
	function thmfdn_content_grid_setup() {
		remove_all_actions( 'thmfdn_entry' );

		add_action( 'thmfdn_entry', 'thmfdn_404_widgets' );
	}
}
add_action( 'thmfdn_template_part_setup', 'thmfdn_content_grid_setup' );

if ( !function_exists( 'thmfdn_404_widgets' ) ) {
	/**
	 * Displays the 404 widget area
	 *
	 * @since 1.0.0
	 */
	function thmfdn_404_widgets() {

		// Does the 404 widget area contain any widgets?
		if ( is_active_sidebar( '404' ) ) {

			// Filters for class names.
			$widget_count = thmfdn_widget_count('404');
			$widget_classes = '';
			if ( $widget_count > 0 ) {
				$widget_classes = ' widget-columns widget-count-' . $widget_count;
			}
			$thmfdn_404_class = apply_filters( 'thmfdn-404-class', 'row' . $widget_classes );
			$thmfdn_404_wrap_class = apply_filters( 'thmfdn-404-wrap-class', 'wrap' );
			?>

				<div class="<?php echo $thmfdn_404_class; ?>">
					<div class="<?php echo $thmfdn_404_wrap_class; ?>">
						<?php dynamic_sidebar( '404' ); ?>
					</div><!--.wrap-->
				</div><!--.row-->

			<?php
		} else {
			echo '<h1 class="entry-title">404</h1>';
			echo '<div class="entry-content"><p>';
			_e( 'Page not found.', 'thmfdn_textdomain');
			echo '</p></div>';
		}
	}
}

// Loads the default template part.
get_template_part( 'template-parts/content' );
