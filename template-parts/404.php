<?php
/**
 *  404 template
 *
 * @package Draft
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

add_action( 'thmfdn_entry', 'thmfdn_404_widgets' );


/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0
 */

if ( !function_exists( 'thmfdn_404_widgets' ) ) {
	/**
	 * Displays the 404 widget area
	 *
	 * @since 1.0
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
