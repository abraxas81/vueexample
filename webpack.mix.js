require('dotenv').config();
let mix = require('laravel-mix');

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

mix .js('resources/assets/js/app.js', 'public/js')
    .styles([
    'node_modules/npm-font-open-sans/css/open-sans.css',
    'node_modules/fontawesome/css/font-awesome.css',
    'resources/assets/css/style.css'], 'public/css/app.css')
    .copy('node_modules/npm-font-open-sans/fonts', 'public/fonts')
    .copy('node_modules/font-awesome/fonts', 'public/fonts')
    .copy('resources/assets/images', 'public/images')
    .browserSync({ proxy: process.env.APP_URL, open: false }) ;
