(function($){
	// console.log('works');
	/* when document is ready */
	$(document).ready(function(){
		$('#menu-toggle').click(function(e){
			$('body').toggleClass('menu-open');
			e.preventDefault();
		});
	});

	/* when window is ready */
	$(window).ready(function(){
		
	});

	/* theme Drupal behaviors */
	Drupal.behaviors.Gotham = {
		attach: function(context, settings) {

		}
	}
})(jQuery);