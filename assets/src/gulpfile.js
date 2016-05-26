/**
 * @file
 * Gulp script to run build process.
 */
'use strict';

// Require Gulp
var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var prefix = require('gulp-autoprefixer');
var watch = require('gulp-watch');
var plumber = require('gulp-plumber');
var babel = require('gulp-babel');

// Gulp Sass Task
gulp.task('sass', function() {
  gulp.src('sass/**/*.scss')
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(prefix('last 2 versions', '> 1%', 'ie 8'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('../css'));
});

gulp.task('scripts', function() {
  return gulp
    .src('js/**/*.js')
    .pipe(babel())
    .pipe(gulp.dest('../js'));
});

gulp.task('watch', function() {
  gulp.watch('sass/**/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'scripts', 'watch']);
