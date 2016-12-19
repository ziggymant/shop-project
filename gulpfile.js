const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

elixir(mix => {
    mix.sass('app.scss')
       // .webpack('app.js')


       .styles([
       		'blog-post.css',
       		'bootstrap.css',
       		'bootstrap.min.css',
       		'font-awesome.css',
       		'metisMenu.css',
       		'sb-admin-2.css',
       		'styles.css',
       		'timeline.css'
       	], './public/css/libs.css')

       .scripts([
       		'app.js',
       		'bootstrap.js',
       		'bootstrap.min.js',
       		'jquery.js',
       		'metisMenu.js',
       		'sb-admin-2.js'
       	], './public/js/libs.js');
});
