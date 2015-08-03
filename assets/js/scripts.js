/**
 * Font Face Observer
 */
var roboto = new FontFaceObserver( "Roboto" );

Promise.all([
	roboto.check()
]).then(function() {
	document.documentElement.className += " fonts-loaded";
}); 

/**
 * jQuery script
 */
(function($){
	Drupal.behaviors.gotham = {
		attach: function(context, settings) {
			// console.log('works');
			$('#menu-toggle', context).bind( "tap", function( e ) {
				$('body', context).toggleClass('menu-open');
				e.preventDefault();
			});
		}
	}
})(jQuery);
