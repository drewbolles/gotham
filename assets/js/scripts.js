'use strict';

/**
 * @file
 * Custom theme scripts.
 */
(function ($) {
  Drupal.behaviors.Gotham = {
    attach: function attach(context, settings) {
      $('#menu-toggle', context).bind('tap', function (e) {
        $('body').toggleClass('menu-open');
        e.preventDefault();
      });
    }
  };
})(jQuery);