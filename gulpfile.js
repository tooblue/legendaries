var elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

elixir.config.js.browserify.watchify.options.poll = true;

elixir(function(mix) {
    mix.sass('app.scss')
        .browserify('app.js')
        .browserSync({
            proxy: 'legendaries.dev',
        });
});
