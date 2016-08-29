/**
 * @file
 * Gulp script to run build process.
 */
const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
const prefix = require('autoprefixer');
const watch = require('gulp-watch');
const plumber = require('gulp-plumber');
const babel = require('gulp-babel');
const uglify = require('gulp-uglify');
const svgmin = require('gulp-svgmin');
const svgstore = require('gulp-svgstore');
const rename = require('gulp-rename');
const sassLint = require('gulp-sass-lint');
const eslint = require('gulp-eslint');

gulp.task('sass', () => {
  const processors = [
    prefix({ browsers: ['last 2 versions', 'Safari >= 8'] }),
  ];
  return gulp.src('sass/**/*.scss')
    .pipe(plumber())
    .pipe(sassLint())
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError())
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(postcss(processors))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('../css'));
});

gulp.task('scripts', () => {
  return gulp.src('js/**/*.js')
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError())
    .pipe(babel())
    .pipe(uglify())
    .pipe(gulp.dest('../js'));
});

gulp.task('icons', () => {
  return gulp.src('icons/**/*.svg')
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
