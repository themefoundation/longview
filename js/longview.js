
jQuery( document ).ready(function( $ ) {
	// $('.site-header .menu').mojs({
	// 	toggleButtonID: 'mojs-button',
	// 	mobileMenuLocation: '#header'
	// });
	$('.site-header .widget_pages > ul').mojs({
		toggleButtonID: 'mojs-button',
		mobileMenuLocation: 'body'
	});

	$('.site-header .menu').mojs({
		toggleButtonID: 'mojs-button',
		mobileMenuLocation: 'body'
	});
});