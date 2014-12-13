# Gotham starter Drupal theme

A bare-bones Drupal 7 starter theme. Built with [Sass](http://sass-lang.com) and [Susy](http://susy.oddbird.net). Meant to be a bare theme that developers can build off. Applies the [SMACSS](http://smacss.com) architecture and tries to adhear to Drupal's new CSS best practices.

## Requirements 

* Drupal 7
* Sass >= 3.3

## Install

Download Gotham and place in the /sites/all/themes folder of a Drupal 7 installation. Enable the theme through the 'appearances' tab. To compile Sass into css, you may use whichever tool you see fit, but I use the native Sass gem. Navigate to the themes asset folder `$ cd sites/all/themes/gotham/assets` and run `$ sass --watch sass:css`. The Sass gem will now watch for your changes.

## Using Susy

Susy is a layout toolset that will provide you with the ability to create your own grids - symmetric, asymmetric, and isolation out of the box. It's incredibly powerful and useful. You can create multiple grids, have nested grids, or no grids and Susy will do all the math for you.

In Gotham, there's a Susy section in the /base/_vars.scss file. It defaults to

```
$susy: (
  columns: 12,
  gutters: 1/4,
);

$main-layout: layout(12 1/2 fluid isolate);
```

So by default, any use of Susy's span mixin will base it's math of 12 columns with 1/4 of a column as a gutter. The main layout variable defines a slightly different grid we use for the sidebar and content regions of the site. Change these variables, or create new layout variables, as you see fit. [Read more about Susy](http://susydocs.oddbird.net/en/latest/)