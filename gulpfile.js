'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    livereload = require('gulp-livereload'),
    sassLint = require('gulp-sass-lint')

gulp.task('sass-lint'), function() {
    return gulp.src('./assets/scss/**/*.scss')
    .pipe(sassLint())
    .pipe(sassLint.format())
    .pipe(sassLint.failOnError())
}

gulp.task('sass', function () {
    return gulp.src('./assets/scss/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('./assets/css'))
    .pipe(livereload());
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch('./assets/scss/**/*.scss', ['sass']);
});

gulp.task('default',['sass-lint', 'sass', 'watch']);