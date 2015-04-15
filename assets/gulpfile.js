// Require Gulp
var gulp = require('gulp');
var sass = require('gulp-sass');
var sassdoc = require('sassdoc');
var sourcemaps = require('gulp-sourcemaps');
var prefix = require('gulp-autoprefixer');
var watch = require('gulp-watch');

// Gulp Sass Task 
gulp.task('sass', function() {
  gulp.src('sass/**/*.scss')    
    .pipe(sourcemaps.init()) // Initializes sourcemaps
    .pipe(sassdoc())
    .pipe(sass({
      errLogToConsole: true
      }))
    .pipe(prefix('last 2 versions', '> 1%', 'ie 8'))
    .pipe(sourcemaps.write()) // Writes sourcemaps into the CSS file
    .pipe(gulp.dest('css'));
})

gulp.task('watch', function() {
  gulp.watch('sass/**/*.scss', ['sass'])
})

gulp.task('default', ['sass', 'watch']);