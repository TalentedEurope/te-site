var elixir = require('laravel-elixir');
var trans = require('te-translation-builder');
require('laravel-elixir-vue');
require('laravel-elixir-webpack-official');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.muted = true;

elixir(function(mix) {
    var bootstrapPath = 'node_modules/bootstrap-sass/assets';
    var conditionizrPath = 'node_modules/conditionizr';
    mix.task('translate');

    mix.copy(bootstrapPath + '/fonts', 'public/fonts')
        .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js');


    mix.sass('landing.scss')
        .copy(conditionizrPath + '/dist/conditionizr.js', 'public/js/conditionizr')
        .copy(conditionizrPath + '/detects/ios.js', 'public/js/conditionizr')
        .styles(['vendor/*.css', 'app.css'], 'public/css/landing.css', 'public/css')

    mix.sass('site.scss')
        .styles(['vendor/*.css', 'app.css'], 'public/css/site.css', 'public/css')


    mix.webpack('main.js');

    mix.version(['public/css/*.css', 'public/js/*.js']);
});
