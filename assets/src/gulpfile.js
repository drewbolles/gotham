/**
 * @file
 * Gulp script to run build process.
 */

// Require Gulp
const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const prefix = require('gulp-autoprefixer');
const watch = require('gulp-watch');
const plumber = require('gulp-plumber');
const babel = require('gulp-babel');

// Gulp Sass Task
gulp.task('sass', () => {
  gulp.src('sass/**/*.scss')
    .pipe(plumber())
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(prefix('last 2 versions', '> 1%', 'ie 8'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('../css'));
});

gulp.task('scripts', () => {
  return gulp
    .src('js/**/*.js')
    .pipe(babel())
    .pipe(gulp.dest('../js'));
});

gulp.task('watch', () => {
  gulp.watch('sass/**/*.scss', ['sass']);
  gulp.watch('js/**/*.js', ['scripts']);
});

gulp.task('default', ['sass', 'scripts', 'watch']);
