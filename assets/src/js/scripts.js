/**
 * @file
 * Custom theme scripts.
 */
($ => {
  Drupal.behaviors.Gotham = {
    attach(context) {
      const docEl = document.documentElement;
      const $menuToggle = $('#menu-toggle', context);

      $menuToggle.bind('tap', e => {
        docEl.classList.toggle('menu-open');
        e.preventDefault();
      });
    },
  };
})(jQuery);
