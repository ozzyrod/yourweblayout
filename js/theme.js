( function( window, $, undefined ) {
	'use strict';

	var $window   = $( window ),
		$document = $( document ),
		$body     = $( 'body' );

	/**
	 * Sets up the bootstrap scrollspy.
	 *
	 * @since  1.1.1
	 * @return {null} Bails early if there's nothing in the side scroll.
	 */
	function themeScrollSpy() {
		var $rightScroll  = $( '#menu-vertical-fixed' );

		if ( 0 === $rightScroll.length ) {
			return;
		}

		$body.scrollspy({
			target: '#content',
		});
	}

	// Document ready.
	$document.ready(function() {
		themeScrollSpy();
	});

})( this, jQuery );
