const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

const PUBLIC_JS_FOLDER = 'public/js';

mix.js('resources/js/app.js', PUBLIC_JS_FOLDER)
    .js('resources/js/dropdown.js', PUBLIC_JS_FOLDER)
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss'),
    ]);
