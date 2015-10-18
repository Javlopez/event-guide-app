var elixir = require('laravel-elixir');

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

  mix.styles([
   '../../../public/bower/bootstrap/dist/css/bootstrap.min.css',
   '../theme/css/creative.css',
   '../theme/css/animate.min.css',
  ],'public/css/vendor.css');

   mix.scripts([
    '../../../public/bower/jquery/dist/jquery.js',
    '../../../public/bower/bootstrap/dist/js/bootstrap.min.js',
    '../theme/js/jquery.easing.min.js',
    '../theme/js/jquery.fittext.js',
    '../theme/js/wow.min.js',
    '../theme/js/creative.js'
   ], 'public/js/vendor.js');
});

