<?php
/**
 * @file
 * Page preprocess functions
 */

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