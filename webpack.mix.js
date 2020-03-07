const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/view/absensi/index.js', 'public/js/view/absensi/index.js')
   .js('resources/js/view/landing_page/event.js', 'public/js/view/landing_page/event.js')
   .js('resources/js/view/events/index.js', 'public/js/view/events/index.js');