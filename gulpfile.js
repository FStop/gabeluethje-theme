'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    livereload = require('gulp-livereload'),
    sassLint = require('gulp-sass-lint'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat');

gulp.task('sass-lint'), function() {
    return gulp.src('./assets/scss/**/*.scss')
    .pipe(sassLint())
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError())
}

gulp.task('sass', function () {
    return gulp.src('./assets/scss/style.scss')
    .pipe(sass({
        //
    }).on('error', sass.logError))
    .pipe(gulp.dest('./assets/css'))
    .pipe(livereload());
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('./assets/js/src/*.js')
    .pipe(concat('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('assets/js/dist'))
    .pipe(livereload())
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('./assets/scss/**/*.scss', ['sass-lint', 'sass']);
    gulp.watch('./assets/js/src/*.js', ['scripts']);
});

gulp.task('default',['sass-lint', 'sass', 'scripts', 'watch']);
