/**
 * @file
 * Custom theme scripts.
 */
($ => {
  Drupal.behaviors.Gotham = {
    attach(context) {
      $('#menu-toggle', context).bind('tap', e => {
        $('body').toggleClass('menu-open');
        e.preventDefault();
      });
    },
  };
})(jQuery);
