# Gotham starter Drupal theme`

A bare-bones Drupal 8 starter theme. Built with [Sass](http://sass-lang.com) and [Susy](http://susy.oddbird.net). Meant to be a bare theme that developers can build off. Applies the [SMACSS](http://smacss.com) architecture and tries to adhear to Drupal's new CSS best practices.

## Requirements 

* Drupal 8
* Sass >= 3.3
* Gulp (you may use another method to compile Sass)
* Bower (you may download dependencies manually, as well)

## Install

1. Download Gotham, place in 'sites/all/themes' of a Drupal 7 site
2. Navigate to the asset folder `cd ~/path/to/drupal/sites/all/themes/gotham/assets`
3. Run NPM install for gulp packages `npm i`
4. Run bower install for bower packages `bower install`
5. Run Gulp to ensure process are working `gulp`
6. Happy buildling!


## Using Susy

Susy is a layout toolset that will provide you with the ability to create your own grids - symmetric, asymmetric, and isolation out of the box. It's incredibly powerful and useful. You can create multiple grids, have nested grids, or no grids and Susy will do all the math for you.

In Gotham, there's a Susy section in the /base/_vars.scss file. It reads:

```
/// Base Susy variables for theme
$susy: (
  columns: 12,
  gutters: .25,
  container: $site-width,
  use-custom: (
    clearfix: true,
  ),
);

/// The layout for the primary columns. Uses isolate to push / pull
$main-layout: layout(12 .25 isolate);
```

So by default, any use of Susy's span mixin will base it's math off 12 columns with 1/4 of a column as a gutter. The main layout variable defines a slightly different grid we use for the sidebar and content regions of the site. Change these variables, or create new layout variables, as you see fit. [Read more about Susy](http://susydocs.oddbird.net/en/latest/)

## Recommended starting modules

These are the modules I recommend as an extended core for site development.

* Views
* Entity View Mode
* Metatag
* Google Analytics
* Entity
* Token
* Bean
