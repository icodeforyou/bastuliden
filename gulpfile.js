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


// set scripts to combine
var scripts = [
    'app.js',
    '../../node_modules/bootstrap/dist/js/bootstrap.js'
];

elixir(function(mix) {
    mix.copy('node_modules/bootstrap/dist/fonts', 'public/fonts')
        .less('app.less')
        .scripts(scripts, 'public/js/all.js', 'public/js');
});

