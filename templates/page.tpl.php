<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['content']: The main content of the current page.
 * - $page['content_top']: Items above the main content.
 * - $page['content_bottom']: Items below the main content.
 * - $page['navigation']: Items for the navigation region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<div class="site">

  <header id="site-header" class="site-header site-section">
    <div class="container">
      <div class="grid is-inline">
        <div class="grid__item lap-one-third">
          <?php if ($logo): ?>
            <div class="site-logo">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
              </a>
            </div>
          <?php endif; ?>
        </div><!--
        --><div class="grid__item lap-two-thirds">
          <nav id="site-nav" class="site-nav" role="navigation">
            <?php if($main_menu):?>
              <?php print theme('links__system_main_menu',array('links' => $main_menu,'attributes' => array('id' => 'main-nav','class'=>'main-nav nav-list nav-list--main'),'heading' => array('text' => t('Main menu'),'level' => 'h2','class' => array('element-invisible')),));?>
            <?php endif; ?>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <main id="site-main" class="site-section site-main">

    <?php if($page['content_top']): ?>
      <section id="content-top" class="content-top content-section">
        <div class="container">
          <?php print render($page['content_top']); ?>
        </div>
      </section>
    <?php endif; ?>

    <?php if($page['content']): ?>
      <section id="content-main" class="content-main content-section">
        <div class="container">
          <?php print render($title_prefix); ?>
          <?php if ($title): ?><h1 class="page-title" id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if ($tabs = render($tabs)): ?><div class="tabs" class="tabs-wrap"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['content']); ?>
        </div>
      </section>
    <?php endif; ?>

    <?php if($page['content_bottom']): ?>
      <section id="content-bottom" class="content-bottom content-section ">
        <div class="container">
          <?php print render($page['content_bottom']); ?>
        </div>
      </section>
    <?php endif; ?>

  </main>

</div>

<footer id="footer" class="footer">

  <?php if($page['footer_top']):?>
    <section id="footer-top" class="footer-top footer-section">
      <div class="container">
        <?php print render($page['footer_top']); ?>
      </div>
    </section>
  <?php endif; ?>

  <?php if($page['footer']): ?>
    <section id="main-footer" class="main-footer footer-section">
      <div class="container">
          <?php print render($page['footer']); ?>
      </div>
    </section>
  <?php endif; ?>

  <?php if($page['footer_bottom']):?>
    <section id="footer-bottom" class="footer-bottom footer-section">
      <div class="container">
        <?php print render($page['footer_bottom']); ?>
      </div>
    </section>
  <?php endif; ?>

</footer>