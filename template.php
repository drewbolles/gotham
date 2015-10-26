<?php
/**
 * @file
 * Template preprocess functions
 */

/**
 * Implements hook_css_alter().
 */
function gotham_css_alter(&$css) {
  $exclude = array(
    'modules/system/system.css' => FALSE,
    'modules/system/system.admin.css' => FALSE,
    // 'modules/system/system.base.css' => FALSE, // this one adds the autocomplete styles
    'modules/system/system.maintenance.css' => FALSE,
    'modules/system/system.menus.css' => FALSE,
    'modules/system/system.messages.css' => FALSE,
    'modules/system/system.theme.css' => FALSE,
    'modules/node/node.css' => FALSE,
    'modules/search/search.css' => FALSE,
    'modules/user/user.css' => FALSE,
    // Un-comment as needed
    // 'sites/all/modules/contrib/ckeditor/css/ckeditor.css' => FALSE,
    // 'sites/all/modules/contrib/entity_embed/css/entity_embed.css' => FALSE,
    // 'sites/all/modules/contrib/views/css/views.css' => FALSE,
    // 'sites/all/modules/contrib/date/date_api/date.css' => FALSE,
    // 'sites/all/modules/contrib/date/date_popup/themes/datepicker.1.7.css' => FALSE,
  );
  
  $css = array_diff_key($css, $exclude);
}

/**
 * Implements hook_preprocess_html().
 */
function gotham_preprocess_html(&$vars) {
  $viewport = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width, initial-scale=1',
    ),
  );

  $ie_ua = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'X-UA-Compatible',
      'content' => 'IE=edge,chrome=1',
    ),
  );

  drupal_add_html_head($viewport, 'viewport');
  drupal_add_html_head($ie_ua, 'x-ua-compatible');
}

/**
 * Implements hook_preprocess_page().
 */
function gotham_preprocess_page(&$vars) {  
  // unset the 'page' class for the site-wrapper
  unset($vars['classes_array'][0]);
  $vars['classes_array'][] = 'site';

  // make page--node--NODETYPE.tpl.php available
  if(!empty($vars['node'])) {
    $vars['theme_hook_suggestions'][] = 'page__node__'.$vars['node']->type;
  }
  // create copywrite variable
  $vars['copywrite'] = t('All rights reserved. &copy; !date', array('date' => date('Y')));
}

/**
 * Implements hook_preprocess_node().
 */
function gotham_preprocess_node(&$vars) {
  // Add default title wrapper
  $vars['title_wrapper'] = 'h2';
  
  // Add css class "node-NODETYPE--VIEWMODE" to nodes
  $vars['classes_array'][] = 'node-' . $vars['type'] . '--' . drupal_html_class($vars['view_mode']);
}

/**
 * Implements hook_preprocess_block().
 */
function gotham_preprocess_block(&$vars) {
  // Set default title wrapper
  $vars['title_wrapper'] = 'h3';
  // Set default block title class
  $vars['title_attributes_array']['class'][] = 'block__title';

  // apply the block bare tpl to certain blocks
  $bare_blocks = array(
    'block-system-main',
  );
  
  if(in_array($vars['block_html_id'], $bare_blocks)) {
    $vars['theme_hook_suggestions'][] = 'block__bare';
  }
}
