var elixir = require('laravel-elixir'),
    gulp = require('gulp'),
    bower = require('bower'),
    shell = require('gulp-shell'),
    react = require('gulp-react'),
    notify = require('gulp-notify');

var jsOutput = elixir.config.jsOutput,
    bowerDir = elixir.config.bowerDir,
    assetsDir = elixir.config.assetsDir;

var paths = {
    foundation: bowerDir + '/foundation/'
};


gulp.task('bower', function () {
    return bower.commands.install([], {save: true}, {})
        .on('end', function (data) {
            console.log(data);
        });
});

elixir.extend('foundation', function () {
    gulp.task('copyfoundation', ['bower'], function () {
        gulp.src(paths.foundation + 'scss/**/*.scss')
            .pipe(gulp.dest(assetsDir + '/sass'));
    });
    return this.queueTask("copyfoundation");
});

elixir.extend('reacter', function () {
    gulp.task('reacter', function () {
        gulp.src('resources/assets/jsx/*.jsx')
            .pipe(react())
            .pipe(gulp.dest('public/js'));
    });
    return this.queueTask('reacter');
});

elixir(function (mix) {
    mix.foundation()
        .sass("*.scss", "public/css/foundation")
        .reacter()
        .copy(bowerDir + "/jquery/dist/jquery.min.js", jsOutput + "/jquery.min.js")
        .copy(bowerDir + "/react/react.min.js", jsOutput + "/react.min.js")
        .copy(bowerDir + "/react/react-with-addons.min.js", jsOutput + "/react-with-addons.min.js");
});
