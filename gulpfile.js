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
    '../../resources/assets/js/app.js'
];

elixir(function(mix) {
    mix.less('app.less')
        .scripts(scripts, 'public/js/all.js', 'public/js');
});

