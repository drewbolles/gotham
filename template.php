<?php
/**
 * Implements hook_preprocess_page().
 */
function gotham_preprocess_page(&$vars) {}

/**
 * Implements hook_preprocess_html().
 */
function gotham_preprocess_html(&$vars) {}

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
