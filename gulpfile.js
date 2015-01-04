'use strict';
var gulp = require('gulp');
var elixir = require('laravel-elixir');
var bower = require('gulp-bower');
var clean = require('gulp-clean');
var gulpFilter = require('gulp-filter');
var install = require("gulp-install");
var mainBowerFiles = require('main-bower-files');
var react = require('gulp-react');
var urlAdjuster = require('gulp-css-url-adjuster');

gulp.task('clean', function () {
    gulp.src('public/assets').pipe(clean());
});

gulp.task('setup', ['clean'], function () {
    return gulp.src(['./bower.json']).pipe(install());
});

gulp.task('bower', ['setup'], function () {
    var jsFilter = gulpFilter('**/*.js');
    var cssFilter = gulpFilter('**/*.css');
    var fontFilter = gulpFilter([
        '**/*webfont*',
        "**/Font*",
        "**/glyphicons-*"
    ]);
    var imageFilter = gulpFilter(['**/*.png', "**/*.gif"]);
    return gulp.src(
        mainBowerFiles({
            paths: {
                bowerDirectory: 'vendor/bower_components',
                bowerrc: '.bowerrc',
                bowerJson: 'bower.json'
            }
        })
    )
        .pipe(jsFilter)
        .pipe(gulp.dest('public/assets/js'))
        .pipe(jsFilter.restore())
        .pipe(cssFilter)
        .pipe(gulp.dest('public/assets/css'))
        .pipe(cssFilter.restore())
        .pipe(fontFilter)
        .pipe(gulp.dest('public/assets/fonts'))
        .pipe(fontFilter.restore())
        .pipe(imageFilter)
        .pipe(gulp.dest('public/images'));
});


elixir.extend('init', function () {
    return this.queueTask("bower");
});
elixir.extend('ireplace', function () {
    gulp.task("replace", function () {
        return gulp.src(
            [
                'public/assets/css/jquery.fancybox.css',
                'public/assets/css/jquery.fileupload-ui.css'
            ])
            .pipe(urlAdjuster({
                replace:  ['../img/', ''],
                prepend: '/images/',
                append: '?version=1'
            }))
            .pipe(gulp.dest('public/assets/css'));
    });
    return this.queueTask("replace");
});
elixir.extend('reacter', function () {
    gulp.task('reacter', function () {
        gulp.src('resources/assets/jsx/app.jsx')
            .pipe(react())
            .pipe(gulp.dest('public/js'));
    });
    return this.queueTask('reacter');
});

elixir(function (mix) {
    mix.init()
        .ireplace()
        .reacter()
        .sass('app.scss', 'public/css');
        //.phpUnit();
});
