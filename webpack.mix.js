const mix = require('laravel-mix');
const glob = require('glob');
const path = require('path');
const ReplaceInFileWebpackPlugin = require('replace-in-file-webpack-plugin');
const rimraf = require('rimraf');

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

// Default
mix.js('resources/js/app.js', 'public/js').scripts('resources/js/config.js', 'public/js/config.js').sass('resources/sass/app.scss', 'public/css');

// Global jquery
// mix.autoload({
// 'jquery': ['$', 'jQuery'],
// Popper: ['popper.js', 'default'],
// });

// 3rd party plugins css/js
// mix.sass('resources/plugins/plugins.scss', 'public/plugins/global/plugins.bundle.css').then(() => {
//     // remove unused preprocessed fonts folder
//     rimraf(path.resolve('public/fonts'), () => {});
//     rimraf(path.resolve('public/images'), () => {});
// })
//     // .setResourceRoot('./')
//     .options({processCssUrls: false}).js(['resources/plugins/plugins.js'], 'public/plugins/global/plugins.bundle.js');

// Metronic cs
    // Guest css/js
 mix.sass('resources/sass/guest/style.scss', 'public/css/guest/style.bundle.css', {
        // sassOptions: {includePaths: ['node_modules']},
    })
    .js('resources/js/guest/scripts.js', 'public/js/guest/scripts.bundle.js');;
        // .options({processCssUrls: false})
        // .js('resources/js/guest/scripts.js', 'public/js/scripts.bundle.js');
        // .js('resources/js/guest/scripts.js', 'public/js/scripts.bundle.js');

// Custom 3rd party plugins
// (glob.sync('resources/plugins/custom/**/*.js') || []).forEach(file => {
//     mix.js(file, `public/${file.replace('resources/', '').replace('.js', '.bundle.js')}`);
// });
// (glob.sync('resources/plugins/custom/**/*.scss') || []).forEach(file => {
//     mix.sass(file, `public/${file.replace('resources/', '').replace('.scss', '.bundle.css')}`);
// });

// Guest css pages (single page use)
(glob.sync('resources/sass/guest/pages/**/!(_)*.scss') || []).forEach(file => {
    file = file.replace(/[\\\/]+/g, '/');
    mix.sass(file, file.replace('resources/sass/guest/pages', 'public/css/guest').replace(/\.scss$/, '.css'));
});
