<?php

function gotham_preprocess_page(&$vars){

}

function gotham_preprocess_html(&$vars){

}

function gotham_css_alter(&$css){
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
