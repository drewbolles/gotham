<?php
/**
 * @file
 * Node preprocess functions
 */

/**
 * Implements hook_preprocess_node().
 */
function gotham_preprocess_node(&$vars) {
  // Make "node--NODETYPE--VIEWMODE.tpl.php" templates available for nodes 
  $vars['theme_hook_suggestions'][] = 'node__' . $vars['type'] . '__' . $vars['view_mode'];

  // Add css class "node-NODETYPE--VIEWMODE" to nodes
  $vars['classes_array'][] = 'node-' . $vars['type'] . '--' . $vars['view_mode'];
}