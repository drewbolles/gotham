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

// Gulp Sass Task 
gulp.task('sass', function() {
  gulp.src('sass/**/*.scss')    
    .pipe(sourcemaps.init()) // Initializes sourcemaps
    .pipe(sassdoc())
    .pipe(sass().on('error', sass.logError))
    .pipe(prefix('last 2 versions', '> 1%', 'ie 8'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('../css'));
});

gulp.task('svg', function() {
  return gulp
    .src(['icons/*.svg'])
    .pipe(svgmin())
    .pipe(svgstore({
      inlineSvg: true
    }))
    .pipe(gulp.dest('../images'));
});

gulp.task('watch', function() {
  gulp.watch('sass/**/*.scss', ['sass']);
  gulp.watch(['icons/*.svg'], ['svg']);
});

gulp.task('default', ['sass', 'watch']);
