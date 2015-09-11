
jQuery( document ).ready(function( $ ) {
	var runBreakpoints = true;

	$( window ).on( 'resize', function() {
		if ( runBreakpoints ) {
			runBreakpoints = false;

			setTimeout( function() {
				runBreakpoints = true;
			}, 250 );
		}
	});

	function breakpointLarge() {}

	// Sets up mo.js menus.
	$( '.site-header .widget_pages > ul' ).mojs({
		toggleButtonID: 'mojs-button',
		mobileMenuLocation: 'body'
	});

	$( '.site-header .menu' ).mojs({
		toggleButtonID: 'mojs-button',
		mobileMenuLocation: 'body'
	});

	/**
	 * Adds support for converting phone numbers to links on touch devices
	 */
	if ( 'ontouchstart' in document.documentElement ) {

		// For each element with class "touch-to-dial".
		$( '.thmfdn-touch-to-dial' ).each(function() {
			var ctdPhoneNumber = $( this ).text();

			// Wrap phone with href="tel:" and then insert phone number
			$( this ).wrapInner( '<a class="ttd-link" href=""></a>' );
			$( '.ttd-link' ).attr( 'href', 'tel:' + ctdPhoneNumber );
		});
	}
});
