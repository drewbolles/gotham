<?php

/**
 * Implements hook_preprocess_html().
 */
function gotham_preprocess_html(&$vars) {}

/**
 * Implements hook_preprocess_page().
 */
function gotham_preprocess_page(&$vars) {
  // make page--node--NODETYPE.tpl.php available
  if(isset($vars['node'])) {
    $vars['theme_hook_suggestions'][] = 'page__node__'.$vars['node']->type;
  }
  // create copywrite variable
  $vars['copywrite'] = t('All rights reserved. &copy; !date', array('date' => date('Y')));
}

/**
 * Implements hook_preprocess_node().
 */
function gotham_preprocess_node(&$vars) {
  // Make "node--NODETYPE--VIEWMODE.tpl.php" templates available for nodes 
  $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];

  // Add css class "node-NODETYPE--VIEWMODE" to nodes
  $vars['classes_array'][] = 'node-' . $vars['type'] . '--' . $vars['view_mode'];
}

/**
 * Implements hook_preprocess_block().
 */
function gotham_preprocess_block(&$vars) {
  // apply the block bare tpl to certain blocks
  $bare_blocks = array(
    'block-system-main',
  );
  
  if(in_array($vars['block_html_id'], $bare_blocks)) {
    $vars['theme_hook_suggestions'][] = 'block__bare';
  }
}

/**
 * Implements hook_css_alter().
 */
function gotham_css_alter(&$css) {
  $exclude = array(
    'modules/system/system.css' => FALSE,
    'modules/system/system.admin.css' => FALSE,
    'modules/system/system.base.css' => FALSE,
    'modules/system/system.maintenance.css' => FALSE,
    'modules/system/system.menus.css' => FALSE,
    'modules/system/system.messages.css' => FALSE,
    'modules/system/system.theme.css' => FALSE,
  );
  
  $css = array_diff_key($css, $exclude);
}
