'use strict';

// Require Gulp
var gulp = require('gulp');
var sass = require('gulp-sass');
var sassdoc = require('sassdoc');
var sourcemaps = require('gulp-sourcemaps');
var prefix = require('gulp-autoprefixer');
var watch = require('gulp-watch');
var svgmin = require('gulp-svgmin');
var svgstore = require('gulp-svgstore');
var plumber = require('gulp-plumber');

// Gulp Sass Task 
gulp.task('sass', function() {
  gulp.src('sass/**/*.scss')
    .pipe(plumber())
    .pipe(sourcemaps.init()) // Initializes sourcemaps
    .pipe(sassdoc())
    .pipe(sass().on('error', sass.logError))
    .pipe(prefix('last 2 versions', '> 1%', 'ie 8'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./css'));
});

gulp.task('imagemin', function() {
  var imgSrc = 'images/src/*';
  var imgDest = './images';
  return gulp.src(imgSrc)
    .pipe(newer(imgDest))
    .pipe(imagemin({
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
    }))
    .pipe(gulp.dest(imgDest));
});

gulp.task('icons', function() {
  return gulp
    .src(['images/icons/*.svg'])
    .pipe(svgmin())
    .pipe(svgstore({
      inlineSvg: true
    }))
    .pipe(gulp.dest('./images'));
});

gulp.task('watch', function() {
  gulp.watch('sass/**/*.scss', ['sass']);
  gulp.watch(['images/icons/*.svg'], ['icons']);
});

gulp.task('default', ['sass', 'imagemin', 'icons', 'watch']);
