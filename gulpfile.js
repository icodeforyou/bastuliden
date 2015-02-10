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

elixir(function(mix) {
    mix.less('app.less');
});

// elixir(function(mix) {
//     mix.scripts([
//         "map.js"
//     ]);
// });

var paths = {
    'bootstrap': '/node_modules/bootstrap/dist/'
}

elixir(function(mix) {
    mix.copy(paths.bootstrap + 'fonts/bootstrap/**', 'public/fonts')
        .scripts([
            paths.bootstrap + "js/bootstrap.js"
        ], 'public/js/app.js');
});