<?php
/**
 * Footer template
 *
 * @package Longview
 * @since 1.0.0
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

add_action( 'thmfdn_footer_before', 'thmfdn_before_footer_widgets' );

add_action( 'thmfdn_footer', 'thmfdn_footer_open', 1 );
add_action( 'thmfdn_footer', 'thmfdn_footer_menu', 20 );
add_action( 'thmfdn_footer', 'thmfdn_footer_widgets', 30 );
add_action( 'thmfdn_footer', 'thmfdn_footer', 50 );
add_action( 'thmfdn_footer', 'thmfdn_footer_close', 100 );

add_action( 'thmfdn_footer_after', 'thmfdn_after_footer_widgets' );

add_action( 'thmfdn_body_bottom', 'thmfdn_wrapper_close' );

/**
 *****************************************************************************
 * Define actions
 *****************************************************************************
 *
 * This section defines the actions associated with each hook.
 *
 * @since 1.0.0
 */

if ( !function_exists( 'thmfdn_before_footer_widgets' ) ) {
	/**
	 * Displays the Before Footer widget area
	 *
	 * @since 1.0.0
	 */
	function thmfdn_before_footer_widgets() {

		// Does the Before Footer widget area contain any widgets?
		if ( thmfdn_is_registered_sidebar( 'footer-before' ) ) {

			// Filters for class names.
			$widget_count = thmfdn_widget_count('footer-before');
			$widget_classes = '';
			if ( $widget_count > 0 ) {
				$widget_classes = ' widget-columns widget-count-' . $widget_count;
			}
			$thmfdn_footer_before_class = apply_filters( 'thmfdn-footer-before-class', 'row site-footer footer-before' );
			$thmfdn_footer_before_wrap_class = apply_filters( 'thmfdn-footer-before-wrap-class', 'wrap' . $widget_classes );
			?>

				<div class="<?php echo $thmfdn_footer_before_class; ?>">
					<div class="<?php echo $thmfdn_footer_before_wrap_class; ?>">
						<?php dynamic_sidebar( 'footer-before' ); ?>
					</div><!--.wrap-->
				</div><!--.footer-before-->

			<?php
		}
	}
}

if ( !function_exists( 'thmfdn_footer_open' ) ) {
	/**
	 * Footer opening
	 *
	 * Opens the footer and wrapper.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_footer_open() {
		echo '<footer id="' . apply_filters( 'thmfdn_footer_id', 'footer' ) . '" class="' . apply_filters( 'thmfdn_footer_class', 'site-footer row' ) . '">' . "\n";
		echo '<div class="' . apply_filters( 'thmfdn_footer_wrap_class', 'wrap' ) . '">' . "\n";
	}
}

if ( !function_exists( 'thmfdn_footer_menu' ) ) {
	/**
	 * Footer Menu
	 *
	 * Displays the footer menu. However, if there are widgets present in the
	 * Inside Footer widget area, that widget area overrides this menu.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_footer_menu() {

		// Is the Inside Footer widget area currently empty?
		if ( ! is_active_sidebar( 'footer-replacement' ) && ! is_active_sidebar( 'footer-inside' ) ) {
			wp_nav_menu( array(
				'theme_location' => 'footer_menu',
				'container' => 'div',
				'container_class' => 'thmfdn-footer-menu',
				'fallback_cb' => false
			) );
		}
	}
}

if ( !function_exists( 'thmfdn_footer_widgets' ) ) {
	/**
	 * Displays the Replacement Footer widget area
	 *
	 * @since 1.0.0
	 */
	function thmfdn_footer_widgets() {

		// Does the Inside Footer widget area contain any widgets?
		if ( thmfdn_is_registered_sidebar( 'footer-replacement' ) ) {

			// Filters for class names.
			$widget_count = thmfdn_widget_count('footer-replacement');
			$widget_classes = '';
			if ( $widget_count > 0 ) {
				$widget_classes = ' widget-columns widget-count-' . $widget_count;
			}
			$thmfdn_footer_class = apply_filters( 'thmfdn-footer-replacement-class', 'footer-replacement' . $widget_classes );
			?>

				<div class="<?php echo $thmfdn_footer_class; ?>">
					<?php dynamic_sidebar( 'footer-replacement' ); ?>
				</div><!--.footer-inside-->

			<?php
		}
	}
}


if ( !function_exists( 'thmfdn_footer' ) ) {
	/**
	 * Footer
	 *
	 * Displays the site footer.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_footer() {
		if ( ! is_active_sidebar( 'footer-replacement' ) ) {
			echo apply_filters( 'site_credits', '<p class="site-credits">&copy;  <a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo('name') . '</a></p>' . "\n" );

			if ( thmfdn_is_registered_sidebar( 'footer-inside' ) ) {
				echo '<div class="footer-inside-widgets">';
				dynamic_sidebar( 'footer-inside' );
				echo '</div>';
			}
		}
	}
}

if ( !function_exists( 'thmfdn_footer_close' ) ) {
	/**
	 * Footer closing
	 *
	 * Closes the footer and wrapper.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_footer_close() {
		echo 	'</div><!--.wrap-->' . "\n";
		echo '</footer><!--#footer-->' . "\n";
	}
}

if ( !function_exists( 'thmfdn_after_footer_widgets' ) ) {
	/**
	 * Displays the After Footer widget area
	 *
	 * @since 1.0.0
	 */
	function thmfdn_after_footer_widgets() {

		// Does the After Footer widget area contain any widgets?
		if ( thmfdn_is_registered_sidebar( 'footer-after' ) ) {

			// Filters for class names.
			$widget_count = thmfdn_widget_count('footer-after');
			$widget_classes = '';
			if ( $widget_count > 0 ) {
				$widget_classes = ' widget-columns widget-count-' . $widget_count;
			}
			$thmfdn_footer_after_class = apply_filters( 'thmfdn-footer-after-class', 'row site-footer footer-after' );
			$thmfdn_footer_after_wrap_class = apply_filters( 'thmfdn-footer-after-wrap-class', 'wrap' . $widget_classes );
			?>

				<div class="<?php echo $thmfdn_footer_after_class; ?>">
					<div class="<?php echo $thmfdn_footer_after_wrap_class; ?>">
						<?php dynamic_sidebar( 'footer-after' ); ?>
					</div><!--.wrap-->
				</div><!--.footer-after-->

			<?php
		}
	}
}


if ( !function_exists( 'thmfdn_wrapper_close' ) ) {
	/**
	 * Closes the site wrapper
	 *
	 * This div wraps the entire site, and can be used for handling the
	 * site width.
	 *
	 * @since 1.0.0
	 */
	function thmfdn_wrapper_close() {
		echo '</div><!--#page-->';
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
 * @since 1.0.0
 */

do_action( 'thmfdn_footer_before' );
do_action( 'thmfdn_footer' );
do_action( 'thmfdn_footer_after' );

do_action( 'thmfdn_body_bottom' );

wp_footer();

?>

</body>
</html>
