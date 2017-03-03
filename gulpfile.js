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
    var conditionizrPath = 'node_modules/conditionizr';
    var slickCarouselPath = 'node_modules/slick-carousel/slick';

    mix.task('translate');

    mix.copy(conditionizrPath + '/dist/conditionizr.js', 'public/js/conditionizr')
        .copy(conditionizrPath + '/detects/ios.js', 'public/js/conditionizr');

    mix.copy(slickCarouselPath + '/ajax-loader.gif', 'public/img/slick-carousel/')
        .copy(slickCarouselPath + '/fonts', 'public/fonts/slick-carousel/')
        .copy(slickCarouselPath + '/slick.js', 'public/js/slick-carousel');

    mix.sass('landing.scss', 'public/css/landing.css');
    mix.sass('site.scss', 'public/css/site.css');

    mix.webpack('main.js');
    mix.webpack('landing.js');

    mix.version(['public/css/*.css', 'public/js/*.js']);
});
