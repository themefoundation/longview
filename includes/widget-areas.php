<?php
/**
 * Widget areas
 *
 * This file registers the widget areas and provides functions related to
 * displaying the widget areas.
 *
 * @package THMFDN
 * @version 1.0
 */

/**
 * Registers sidebars
 *
 * @since 1.0
 */
function thmfdn_register_sidebars() {

	// Registers the main sidebar widget area.
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'thmfdn_textdomain' ),
			'id' => 'sidebar-1',
			'description' => __( 'This is the main sidebar.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the additional sidebar widget area.
	register_sidebar(
		array(
			'name' => __( 'Additional Sidebar', 'thmfdn_textdomain' ),
			'id' => 'sidebar-2',
			'description' => __( 'This is the secondary sidebar.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area before the header.
	register_sidebar(
		array(
			'name' => __( 'Before Header', 'thmfdn_textdomain' ),
			'id' => 'header-before',
			'description' => __( 'Displayed above the header area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area in the header.
	register_sidebar(
		array(
			'name' => __( 'Inside Header', 'thmfdn_textdomain' ),
			'id' => 'header-inside',
			'description' => __( 'Displayed in the header area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area after the header.
	register_sidebar(
		array(
			'name' => __( 'After Header', 'thmfdn_textdomain' ),
			'id' => 'header-after',
			'description' => __( 'Displayed below the header area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area before the footer.
	register_sidebar(
		array(
			'name' => __( 'Before Footer', 'thmfdn_textdomain' ),
			'id' => 'footer-before',
			'description' => __( 'Displayed above the footer area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area before the footer.
	register_sidebar(
		array(
			'name' => __( 'Inside Footer', 'thmfdn_textdomain' ),
			'id' => 'footer-inside',
			'description' => __( 'Displayed in the footer area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	// Registers the widget area before the footer.
	register_sidebar(
		array(
			'name' => __( 'After Footer', 'thmfdn_textdomain' ),
			'id' => 'footer-after',
			'description' => __( 'Displayed below the footer area.', 'thmfdn_textdomain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

}
add_action( 'widgets_init', 'thmfdn_register_sidebars' );






/**
 * Displays the Before Footer widget area
 *
 * @since 1.0
 */
function thmfdn_before_footer_widgets() {

	// Does the Before Footer widget area contain any widgets?
	if ( is_active_sidebar( 'footer-before' ) ) {
		// Filters for class names.
		$thmfdn_footer_before_class = apply_filters( 'thmfdn-footer-before-class', 'footer-before' );
		$thmfdn_footer_before_wrap_class = apply_filters( 'thmfdn-footer-before-wrap-class', 'wrap' );
		?>

			<div class="<?php echo $thmfdn_footer_before_class; ?>">
				<div class="<?php echo $thmfdn_footer_before_wrap_class; ?>">
					<?php dynamic_sidebar( 'footer-before' ); ?>
				</div><!--.wrap-->
			</div><!--.footer-before-->

		<?php
	}
}

/**
 * Displays the Inside Footer widget area
 *
 * @since 1.0
 */
function thmfdn_footer_widgets() {

	// Does the Inside Footer widget area contain any widgets?
	if ( is_active_sidebar( 'footer-inside' ) ) {

		// Filters for class names.
		$thmfdn_footer_inside_class = apply_filters( 'thmfdn-footer-inside-class', 'footer-inside' );
		?>

			<div class="<?php echo $thmfdn_footer_inside_class; ?>">
				<?php dynamic_sidebar( 'footer-inside' ); ?>
			</div><!--.footer-inside-->

		<?php
	}
}

/**
 * Displays the After Footer widget area
 *
 * @since 1.0
 */
function thmfdn_after_footer_widgets() {

	// Does the After Footer widget area contain any widgets?
	if ( is_active_sidebar( 'footer-after' ) ) {
		// Filters for class names.
		$thmfdn_footer_after_class = apply_filters( 'thmfdn-footer-after-class', 'footer-after' );
		$thmfdn_footer_after_wrap_class = apply_filters( 'thmfdn-footer-after-wrap-class', 'wrap' );
		?>

			<div class="<?php echo $thmfdn_footer_after_class; ?>">
				<div class="<?php echo $thmfdn_footer_after_wrap_class; ?>">
					<?php dynamic_sidebar( 'footer-after' ); ?>
				</div><!--.wrap-->
			</div><!--.footer-after-->

		<?php
	}
}

/**
 * Counts the number of widgets in a widget area
 *
 * @return integer The number of widgets present in the specified widget area.
 * @since 1.0
 */
function thmfdn_count_widgets( $widget_area_id ) {
	global $wp_registered_sidebars;
	$widget_areas = wp_get_sidebars_widgets();

	if( empty( $widget_areas[$widget_area_id] ) ) {
		return false;
	} else {
		return $widget_areas[$widget_area_id];
	}

}