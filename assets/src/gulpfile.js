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
const uglify = require('gulp-uglify');
const svgmin = require('gulp-svgmin');
const svgstore = require('gulp-svgstore');
const rename = require('gulp-rename');
const sassLint = require('gulp-sass-lint');
const eslint = require('gulp-eslint');

// Gulp Sass Task
gulp.task('sass', () => {
  gulp.src('sass/**/*.scss')
    .pipe(plumber())
    .pipe(sassLint())
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError())
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(prefix({ browsers: ['last 2 versions', '> 1%', 'ie 8'] }))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('../css'));
});

gulp.task('scripts', () => {
  return gulp
    .src('js/**/*.js')
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError())
    .pipe(babel())
    .pipe(uglify())
    .pipe(gulp.dest('../js'));
});

gulp.task('icons', () => {
  return gulp
    .src('icons/**/*.svg')
    .pipe(rename({ prefix: 'icon-' }))
    .pipe(svgmin())
    .pipe(svgstore({ inlineSvg: true }))
    .pipe(gulp.dest('../'));
});

gulp.task('watch', () => {
  gulp.watch('sass/**/*.scss', ['sass']);
  gulp.watch('js/**/*.js', ['scripts']);
  gulp.watch('icons/**/*.svg', ['icons']);
});

gulp.task('default', ['sass', 'scripts', 'icons', 'watch']);
