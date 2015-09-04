<?php
/**
 * Helpers
 *
 * This file contains functions to extend the functionality of the
 * THMFDN theme. 
 *
 * @package THMFDN
 */

function thmfdn_post_meta( $meta_args = array() ) {
	if ( !empty( $meta_args ) ) {
		foreach ( $meta_args as $meta => $meta_title ) {
			switch ( $meta ) {
				case 'author':
					echo '<span class="meta author-wrap">' . $meta_title;
					echo '<span class="author">';
					the_author();
					echo '</span>';
					echo '</span>';
					break;
				case 'author_website':
					echo '<span class="meta author-wrap">' . $meta_title;
					echo '<span class="author">';
					the_author_link();
					echo '</span>';
					echo '</span>';
					break;
				case 'author_posts':
					echo '<span class="meta author-wrap">' . $meta_title;
					echo '<span class="author">';
					the_author_posts_link();
					echo '</span>';
					echo '</span>';
					break;
				case 'categories':
					echo '<span class="meta categories-wrap">' . $meta_title;
					echo '<span class="categories">';
					the_category();
					echo '</span>';
					echo '</span>';
					break;
				case 'date':
					echo '<span class="meta date-wrap">' . $meta_title;
					echo '<span class="date">';
					the_time( get_option( 'date_format' ) );
					echo '</span>';
					echo '</span>';
					break;
				case 'tags':
					echo '<span class="meta tags-wrap">';
					the_tags( $meta_title );
					echo '</span>';
					break;

				
				default:
					# code...
					break;
			}
		}
	}
}


/**
 * Counts the number of widgets in a widget area
 *
 * @since 1.0
 * @param string The ID of the widget area to count.
 * @return integer The number of widgets present in the specified widget area.
 */
function thmfdn_widget_count( $widget_area_id ) {
	$widget_areas = wp_get_sidebars_widgets();

	if( empty( $widget_areas[$widget_area_id] ) ) {
		return false;
	} else {
		return count( $widget_areas[$widget_area_id] );
	}
}