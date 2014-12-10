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
<!-- BEGIN page.tpl.php -->
<div class="site">

  <header id="site-header" class="site-header site-section">
    <div class="container">
      <?php if ($logo): ?>
        <div class="site-logo">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" style="width: 120px; height: auto;">
          </a>
        </div>
      <?php endif; ?>
        
      <nav id="site-nav" class="site-nav" role="navigation">
        <?php if($page['navigation']): ?>
          <?php print render($page['navigation']); ?>
        <?php else if($main_menu):?>
          <?php print theme('links__system_main_menu',array('links' => $main_menu,'attributes' => array('id' => 'main-nav','class'=>'main-nav nav-list nav-list--main'),'heading' => array('text' => t('Main menu'),'level' => 'h2','class' => array('element-invisible')),));?>
        <?php endif; ?>
      </nav>
    </div>
  </header>

  <?php if($page['hero']): ?>
    <section id="site-hero" class="site-hero site-section"><div class="container">
      <?php print render($page['hero']); ?>
    </div></section>
  <?php endif; ?>

  <?php if($page['content_top']): ?>
    <section id="site-top-content" class="site-top-content site-section"><div class="container">
      <?php print render($page['content_top']); ?>
    </div></section>
  <?php endif; ?>

  <main id="site-main" class="site-main site-section" role="main">
    <div class="container">

      <?php if($messages):?><?php print render($messages); ?><?php endif; ?>

      <section id="main-content" class="main-content">
        <?php if($title):?>
          <h1 id="page-title" class="page-title"><?php print $title; ?></h1>
        <?php endif;?>

        <?php if($tabs = render($tabs)):?>
          <div id="tabs">
            <?php print render($tabs); ?>
          </div>
        <?php endif;?>

        <?php print render($page['content']); ?>
      </section>

      <?php if($page['sidebar_first']):?>
        <aside id="sidebar-first" class="sidebar sidebar-first">
          <?php print render($page['sidebar_first']);?>
        </aside>
      <?php endif;?>

      <?php if($page['sidebar_second']): ?>
        <aside id="sidebar-second" class="sidebar sidebar-second">
          <?php print render($page['sidebar_second']); ?>
        </aside>
      <?php endif;?>

    </div>
  </main>

  <?php if($page['content_bottom']): ?>
    <section id="site-bottom-content" class="site-bottom-content site-section"><div class="container">
      <?php print render($page['content_bottom']); ?>
    </div></section>
  <?php endif; ?>

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
<!-- END page.tpl.php -->