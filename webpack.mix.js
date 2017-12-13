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




// Javascript e CSS de terceiros (Ex.: jQuery, Bootstrap etc)
mix.js('resources/assets/js/vendor.js', 'public/js');
mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/font-awesome/css/font-awesome.css',
    'node_modules/ionicons/dist/css/ionicons.css',
    'node_modules/sweetalert2/dist/sweetalert2.css',
    'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
    'node_modules/izitoast/dist/css/iziToast.css',
    'node_modules/sweetalert2/dist/css/sweetalert2.css',
    'node_modules/select2/dist/css/select2.css',
    'node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
], 'public/css/vendor.css');




// Fontes Glyphicons
mix.copy('node_modules/bootstrap/dist/fonts', 'public/fonts');

// Fontes Font-awesome
mix.copy('node_modules/font-awesome/fonts', 'public/fonts');

// Fontes Ionicons
mix.copy('node_modules/ionicons/dist/fonts', 'public/fonts');

// Template Admin LTE
mix.styles([
    'node_modules/admin-lte/dist/css/AdminLTE.css',
    'node_modules/admin-lte/dist/css/skins/skin-blue-light.css',
    'node_modules/admin-lte/plugins/iCheck/flat/blue.css',

    'node_modules/admin-lte/dist/css/skins/skin-green.css',
    'node_modules/admin-lte/dist/css/skins/skin-green-light.css',
    

], 'public/css/template.css');
mix.scripts([
    'node_modules/admin-lte/dist/js/adminlte.js'
], 'public/js/template.js');





// TinyMCE Editor
//mix.copy('node_modules/tinymce', 'public/tinymce');

// Javascript
mix.scripts([
    //'resources/assets/js/fungen.js',
    'resources/assets/js/alertas.js',
    'resources/assets/js/app.js',
    'resources/assets/js/operacoes-comuns.js',
], 'public/js/app.js');

// Javascript auxiliares
mix.js('resources/assets/js/datatables-padrao.js', 'public/js');

// CSS
mix.styles([
    'resources/assets/css/geral.css',
    'resources/assets/css/app.css',
    'resources/assets/css/modal-processando.css',
], 'public/css/app.css');

mix.version();









//mix.js('resources/assets/js/vendor.js', 'public/js')
 //  .sass('resources/assets/sass/vendor.scss', 'public/css');



   

