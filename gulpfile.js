'use strict';

var gulp = require('gulp'),
  sass = require('gulp-sass'),
  sourcemaps = require('gulp-sourcemaps'),
  sassLint = require('gulp-sass-lint'),
  uglify = require('gulp-uglify'),
  concat = require('gulp-concat'),
  browserSync = require('browser-sync'),
  eslint = require('gulp-eslint'),
  babel = require("gulp-babel"),
  reload = browserSync.reload;

gulp.task('sass-lint'), function() {
  return gulp.src('./assets/scss/**/*.scss')
    .pipe(sassLint())
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError())
}

gulp.task('sass', function () {
  return gulp.src('./assets/scss/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({}).on('error', sass.logError))
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest('./assets/css'))
    .pipe(reload({stream:true}))
});


// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
  //watch files
  var files = [
  './assets/css/style.css',
  './assets/js/src/*.js',
  './*.php'
  ];

  // initialize browsersync
  browserSync.init(files, {
  // browsersync with a php server
  proxy: "actualgabe.dev",
  notify: false
  });
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
  return gulp.src('./assets/js/src/*.js')
    .pipe(eslint())
    .pipe(babel())
    .pipe(concat('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('assets/js/dist'))
});

gulp.task('watch', function () {
  gulp.watch(['./assets/scss/**/*.scss', '**/*.php'], ['sass-lint', 'sass']);
  gulp.watch('./assets/js/src/*.js', ['scripts']);
});

gulp.task('default',['sass-lint', 'sass', 'scripts', 'browser-sync', 'watch']);
