var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'bootstrap': './node_modules/bootstrap/dist/'
}
var combine_dir = 'resources/assets';

// set scripts to combine
var scripts = [
    '../../node_modules/bootstrap/dist/js/bootstrap.js',
    './js/app.js'
];

elixir(function(mix) {
    mix.copy(paths.bootstrap + 'fonts/bootstrap/fonts', 'public/fonts')
  //      .copy(paths.bootstrap + "js/bootstrap.js", 'resources/assets/js/bootstrap.js')
        .less('app.less')
        .scripts(scripts);
});

