<?php
/**
 * @file
 * Block preprocess functions
 */

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