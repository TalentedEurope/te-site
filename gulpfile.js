var elixir = require('laravel-elixir');
var trans = require('te-translation-builder');

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

elixir(function(mix) {
  var bootstrapPath = 'node_modules/bootstrap-sass/assets';
  var conditionizrPath = 'node_modules/conditionizr';
  mix.task('translate');
  mix.sass('app.scss')
    .copy(bootstrapPath + '/fonts', 'public/fonts')
    .copy(bootstrapPath + '/javascripts/bootstrap.min.js', 'public/js')
    .copy(conditionizrPath + '/dist/conditionizr.js', 'public/js/conditionizr')
    .copy(conditionizrPath + '/detects/ios.js', 'public/js/conditionizr')
    .styles(['vendor/*.css', 'app.css'], 'public/css/style.css', 'public/css')
    .version("public/css/style.css");
  mix.phpUnit();
});
