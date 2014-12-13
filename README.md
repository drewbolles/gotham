# Gotham starter Drupal theme

A bare-bones Drupal 7 starter theme. Built with [Sass](http://sass-lang.com) and [Susy](http://susy.oddbird.net). Meant to be a bare theme that developers can build off. Applies the [SMACSS](http://smacss.com) architecture and tries to adhear to Drupal's new CSS best practices.

## Install

Download Gotham and place in the /sites/all/themes folder of a Drupal 7 installation. Enable the theme through the 'appearances' tab. To compile Sass into css, you may use whichever tool you see fit, but I just simply use the native Sass gem. Navigate to the themes asset folder '$ cd sites/all/themes/gotham/assets' and simply run '$ sass --watch sass:css'. The Sass gem will now watch for your changes. 

## Requirements 

Sass >= 3.3