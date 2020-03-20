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

// .js('resources/assets/js/app.js', 'public/js')
// .sass('resources/assets/sass/app.scss', 'public/css')

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/admin.js', 'public/js')
    .js('resources/assets/js/auth_admin.js', 'public/js')
    .js('resources/assets/js/auth_user.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/admin.scss', 'public/css')
    .sass('resources/assets/sass/auth_admin.scss', 'public/css')
    .sass('resources/assets/sass/auth_user.scss', 'public/css')
    .copy('node_modules/font-awesome/', 'public/lib/font-awesome')
    .copy('node_modules/bootstrap/', 'public/lib/bootstrap')
    .copy('node_modules/jquery/', 'public/lib/jquery')
    .copy('node_modules/jquery-ui/', 'public/lib/jquery-ui')
    .copy('node_modules/parsleyjs/', 'public/lib/parsleyjs')
    .copy('node_modules/moment/', 'public/lib/moment')
    .copy('node_modules/lightbox2/', 'public/lib/lightbox2')
    .copy('node_modules/select2/', 'public/lib/select2')
    .copy('node_modules/waitme/', 'public/lib/waitme')
    .copy('node_modules/sweetalert2/', 'public/lib/sweetalert2')
    .copy('node_modules/datatables/', 'public/lib/datatables')
    .copy('node_modules/autoNumeric/', 'public/lib/autoNumeric')
    .copy('node_modules/quill/', 'public/lib/quill')
    .copy('node_modules/fullcalendar/', 'public/lib/fullcalendar')
    .copy('node_modules/waves/', 'public/lib/waves')
    .copy('node_modules/ckeditor4/', 'public/lib/ckeditor4')
    // .copy('node_modules/chart.js/', 'public/lib/chart.js')
    .version();