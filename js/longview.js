
jQuery( document ).ready(function( $ ) {
	var runBreakpoints = true;

	$(window).on('resize', function() {
		if ( runBreakpoints ) {
			runBreakpoints = false;

			setTimeout( function() {
				breakpointLarge();
				runBreakpoints = true;
			}, 250 );
		}
	});

	function breakpointLarge() {

	}


	// Sets up mo.js menus.
	$('.site-header .widget_pages > ul').mojs({
		toggleButtonID: 'mojs-button',
		mobileMenuLocation: 'body'
	});

	$('.site-header .menu').mojs({
		toggleButtonID: 'mojs-button',
		mobileMenuLocation: 'body'
	});


});