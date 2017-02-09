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
    var slickCarouselPath = 'node_modules/slick-carousel/slick';

    mix.task('translate');

    mix.copy(bootstrapPath + '/fonts', 'public/fonts')
        .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js');

    mix.copy(conditionizrPath + '/dist/conditionizr.js', 'public/js/conditionizr')
        .copy(conditionizrPath + '/detects/ios.js', 'public/js/conditionizr');

    mix.copy(slickCarouselPath + '/ajax-loader.gif', 'public/img/slick-carousel/')
        .copy(slickCarouselPath + '/fonts', 'public/fonts/slick-carousel/')
        .copy(slickCarouselPath + '/slick.js', 'public/js/slick-carousel');

    mix.sass('home.scss')
        .styles(['vendor/*.css', 'app.css'], 'public/css/home.css', 'public/css')

    mix.sass('landing.scss')
        .styles(['vendor/*.css', 'app.css'], 'public/css/landing.css', 'public/css')

    mix.sass('site.scss')
        .styles(['vendor/*.css', 'app.css'], 'public/css/site.css', 'public/css')


    mix.webpack('main.js');
    mix.webpack('landing.js');

    mix.version(['public/css/*.css', 'public/js/*.js']);
});
