var elixir = require('laravel-elixir'),
    gulp = require('gulp'),
    bower = require('bower'),
    shell = require('gulp-shell'),
    react = require('gulp-react'),
    notify = require('gulp-notify'),
    urlAdjuster = require('gulp-css-url-adjuster');

var jsOutput = elixir.config.jsOutput,
    bowerDir = elixir.config.bowerDir,
    assetsDir = elixir.config.assetsDir;

var paths = {
    foundation: bowerDir + '/foundation/',
    fontAwesome: bowerDir + '/font-awesome/'
};


gulp.task('bower', function () {
    return bower.commands.install([], {save: true}, {})
        .on('end', function (data) {
            console.log(data);
        });
});

elixir.extend('awesome', function () {
    gulp.task('fontAwesome', function () {
        return gulp.src(paths.fontAwesome + 'scss/**/*.scss')
            .pipe(gulp.dest(assetsDir + '/sass/font-awesome'));
    });
    return this.queueTask("fontAwesome");
});

elixir.extend('foundation', function () {
    gulp.task('copyfoundation', ['bower'], function () {
        return gulp.src(paths.foundation + 'scss/**/*.scss')
            .pipe(gulp.dest(assetsDir + '/sass/foundation'));
    });
    return this.queueTask("copyfoundation");
});

elixir.extend('reacter', function () {
    gulp.task('reacter', function () {
        return gulp.src('resources/assets/jsx/*.jsx')
            .pipe(react())
            .pipe(gulp.dest('public/js'));
    });
    return this.queueTask('reacter');
});

elixir.extend('pathReplace', function () {
    gulp.task("replace", function () {
        return gulp.src(
            [
                'public/css/font-awesome/font-awesome.css'
            ])
            .pipe(urlAdjuster({
                replace:  ['../fonts/', ''],
                prepend: '/fonts/'
            }))
            .pipe(gulp.dest('public/css/font-awesome'));
    });
    return this.queueTask('replace');
});

elixir(function (mix) {
    mix.foundation()
        .awesome()
        .sass("**/*.scss")
        .reacter()
        .copy(bowerDir + "/font-awesome/fonts", "public/fonts")
        .copy(bowerDir + "/jquery/dist/jquery.min.js", jsOutput + "/jquery.min.js")
        .copy(bowerDir + "/react/react.min.js", jsOutput + "/react.min.js")
        .copy(bowerDir + "/react/react-with-addons.min.js", jsOutput + "/react-with-addons.min.js")
        .copy(bowerDir + "/showdown/compressed/showdown.min.js", jsOutput + "/showdown.min.js")
        .copy(bowerDir + "/showdown/compressed/extensions/github.min.js", jsOutput + "/extensions/github.min.js")
        .pathReplace();
});
