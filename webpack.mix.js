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

mix

// ASSETS ADMIN
// CSS
    .styles('resources/views/admin/assets/libs/datatables/dataTables.bootstrap4.css',
    'public/admin/assets/libs/datatables/dataTables.bootstrap4.css')

.styles('resources/views/admin/assets/libs/datatables/responsive.bootstrap4.css',
    'public/admin/assets/libs/datatables/responsive.bootstrap4.css')

.styles('resources/views/admin/assets/libs/datatables/buttons.bootstrap4.css',
    'public/admin/assets/libs/datatables/buttons.bootstrap4.css')

.styles('resources/views/admin/assets/libs/datatables/select.bootstrap4.css',
    'public/admin/assets/libs/datatables/select.bootstrap4.css')

.styles('resources/views/admin/assets/libs/sweetalert2/sweetalert2.min.css',
    'public/admin/assets/libs/sweetalert2/sweetalert2.min.css')

.styles('resources/views/admin/assets/libs/jquery-toast/jquery.toast.min.css',
    'public/admin/assets/libs/jquery-toast/jquery.toast.min.css')

.styles('resources/views/admin/assets/libs/flatpickr/flatpickr.min.css',
    'public/admin/assets/libs/flatpickr/flatpickr.min.css')

.styles('resources/views/admin/assets/css/main.css',
    'public/admin/assets/css/main.css')

.styles('resources/views/admin/assets/css/bootstrap.min.css',
    'public/admin/assets/css/bootstrap.min.css')

.styles('resources/views/admin/assets/libs/bootstrap-table/bootstrap-table.min.css',
    'public/admin/assets/assets/libs/bootstrap-table/bootstrap-table.min.css')

.styles('resources/views/admin/assets/css/icons.min.css',
    'public/admin/assets/css/icons.min.css')

.styles('resources/views/admin/assets/css/app.css',
    'public/admin/assets/css/app.css')

.styles('resources/views/admin/assets/libs/cropper/cropper.min.css',
    'public/admin/assets/libs/cropper/cropper.min.css')

.styles('resources/views/admin/assets/libs/dropzone/dropzone.min.css',
    'public/admin/assets/libs/dropzone/dropzone.min.css')

.styles('resources/views/admin/assets/libs/dropify/dropify.min.css',
    'public/admin/assets/libs/dropify/dropify.min.css')

.styles('resources/views/admin/assets/libs/quill/quill.core.css',
    'public/admin/assets/libs/quill/quill.core.css')

.styles('resources/views/admin/assets/libs/quill/quill.bubble.css',
    'public/admin/assets/libs/quill/quill.bubble.css')

.styles('resources/views/admin/assets/libs/quill/quill.snow.css',
    'public/admin/assets/libs/quill/quill.snow.css')

.styles('resources/views/admin/assets/libs/select2/select2.min.css',
    'public/admin/assets/libs/select2/select2.min.css')

.styles('resources/views/admin/assets/libs/summernote/summernote-bs4.css',
    'public/admin/assets/libs/summernote/summernote-bs4.css')

.styles('resources/views/admin/assets/libs/flatpickr/flatpickr.min.css',
    'public/admin/assets/libs/flatpickr/flatpickr.min.css')

.styles('resources/views/admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css',
    'public/admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')

.styles('resources/views/admin/assets/libs/clockpicker/bootstrap-clockpicker.min.css',
    'public/admin/assets/libs/clockpicker/bootstrap-clockpicker.min.css')

// SCRIPTS
.scripts('resources/views/admin/assets/libs/flatpickr/flatpickr.min.js',
    'public/admin/assets/libs/flatpickr/flatpickr.min.js')

.scripts('resources/views/admin/assets/libs/jquery-knob/jquery.knob.min.js',
    'public/admin/assets/libs/jquery-knob/jquery.knob.min.js')

.scripts('resources/views/admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js',
    'public/admin/assets/libs/jquery-sparkline/jquery.sparkline.min.js')

.scripts('resources/views/admin/assets/libs/flot-charts/jquery.flot.js',
    'public/admin/assets/libs/flot-charts/jquery.flot.js')

.scripts('resources/views/admin/assets/libs/flot-charts/jquery.flot.time.js',
    'public/admin/assets/libs/flot-charts/jquery.flot.time.js')

.scripts('resources/views/admin/assets/libs/flot-charts/jquery.flot.tooltip.min.js',
    'public/admin/assets/libs/flot-charts/jquery.flot.tooltip.min.js')

.scripts('resources/views/admin/assets/libs/datatables/jquery.dataTables.js',
    'public/admin/assets/libs/datatables/jquery.dataTables.js')

.scripts('resources/views/admin/assets/libs/datatables/dataTables.bootstrap4.js',
    'public/admin/assets/libs/datatables/dataTables.bootstrap4.js')

.scripts('resources/views/admin/assets/libs/datatables/dataTables.responsive.min.js',
    'public/admin/assets/libs/datatables/dataTables.responsive.min.js')

.scripts('resources/views/admin/assets/libs/datatables/responsive.bootstrap4.min.js',
    'public/admin/assets/libs/datatables/responsive.bootstrap4.min.js')

.scripts('resources/views/admin/assets/libs/datatables/dataTables.buttons.min.js',
    'public/admin/assets/libs/datatables/dataTables.buttons.min.js')

.scripts('resources/views/admin/assets/libs/datatables/buttons.bootstrap4.min.js',
    'public/admin/assets/libs/datatables/buttons.bootstrap4.min.js')

.scripts('resources/views/admin/assets/libs/datatables/buttons.html5.min.js',
    'public/admin/assets/libs/datatables/buttons.html5.min.js')

.scripts('resources/views/admin/assets/libs/datatables/buttons.flash.min.js',
    'public/admin/assets/libs/datatables/buttons.flash.min.js')

.scripts('resources/views/admin/assets/libs/datatables/buttons.print.min.js',
    'public/admin/assets/libs/datatables/buttons.print.min.js')

.scripts('resources/views/admin/assets/libs/datatables/dataTables.keyTable.min.js',
    'public/admin/assets/libs/datatables/dataTables.keyTable.min.js')

.scripts('resources/views/admin/assets/libs/datatables/dataTables.select.min.js',
    'public/admin/assets/libs/datatables/dataTables.select.min.js')

.scripts('resources/views/admin/assets/libs/pdfmake/pdfmake.min.js',
    'public/admin/assets/libs/pdfmake/pdfmake.min.js')

.scripts('resources/views/admin/assets/libs/pdfmake/vfs_fonts.js',
    'public/admin/assets/libs/pdfmake/vfs_fonts.js')

.scripts('resources/views/admin/assets/libs/sweetalert2/sweetalert2.min.js',
    'public/admin/assets/libs/sweetalert2/sweetalert2.min.js')

.scripts('resources/views/admin/assets/libs/flot-charts/jquery.flot.crosshair.js',
    'public/admin/assets/libs/flot-charts/jquery.flot.crosshair.js')

.scripts('resources/views/admin/assets/js/pages/sweet-alerts.init.js',
    'public/admin/assets/js/pages/sweet-alerts.init.js')

.scripts('resources/views/admin/assets/js/pages/datatables.init.js',
    'public/admin/assets/js/pages/datatables.init.js')

.scripts('resources/views/admin/assets/libs/jquery-toast/jquery.toast.min.js',
    'public/admin/assets/libs/jquery-toast/jquery.toast.min.js')

.scripts('resources/views/admin/assets/js/pages/toastr.init.js',
    'public/admin/assets/js/pages/toastr.init.js')

.scripts('resources/views/admin/assets/js/app.min.js',
    'public/admin/assets/js/app.min.js')

.scripts('resources/views/admin/assets/js/main.js',
    'public/admin/assets/js/main.js')

.scripts('resources/views/admin/assets/js/vendor.min.js',
    'public/admin/assets/js/vendor.min.js')

.scripts('resources/views/admin/assets/js/jquery.mask.min.js',
    'public/admin/assets/js/jquery.mask.min.js')

.scripts('resources/views/admin/assets/libs/flot-charts/jquery.flot.selection.js',
    'public/admin/assets/libs/flot-charts/jquery.flot.selection.js')

.scripts('resources/views/admin/assets/libs/bootstrap-table/bootstrap-table.min.js',
    'public/admin/assets/libs/bootstrap-table/bootstrap-table.min.js')

.scripts('resources/views/admin/assets/js/pages/bootstrap-tables.init.js',
    'public/admin/assets/js/pages/bootstrap-tables.init.js')

.scripts('resources/views/admin/assets/js/pages/dashboard-1.init.js',
    'public/admin/assets/js/pages/dashboard-1.init.js')

.scripts('resources/views/admin/assets/libs/cropper/cropper.min.js',
    'public/admin/assets/libs/cropper/cropper.min.js')

.scripts('resources/views/admin/assets/js/pages/form-imagecrop.init.js',
    'public/admin/assets/js/pages/form-imagecrop.init.js')

.scripts('resources/views/admin/assets/js/pages/form-fileuploads.init.js',
    'public/admin/assets/js/pages/form-fileuploads.init.js')

.scripts('resources/views/admin/assets/libs/dropify/dropify.min.js',
    'public/admin/assets/libs/dropify/dropify.min.js')

.scripts('resources/views/admin/assets/libs/dropzone/dropzone.min.js',
    'public/admin/assets/libs/dropzone/dropzone.min.js')

.scripts('resources/views/admin/assets/libs/parsleyjs/parsley.min.js',
    'public/admin/assets/libs/parsleyjs/parsley.min.js')

.scripts('resources/views/admin/assets/js/pages/form-validation.init.js',
    'public/admin/assets/js/pages/form-validation.init.js')

.scripts('resources/views/admin/assets/libs/katex/katex.min.js',
    'public/admin/assets/libs/katex/katex.min.js')

.scripts('resources/views/admin/assets/libs/quill/quill.min.js',
    'public/admin/assets/libs/quill/quill.min.js')

.scripts('resources/views/admin/assets/js/pages/form-quilljs.init.js',
    'public/admin/assets/js/pages/form-quilljs.init.js')

.scripts('resources/views/admin/assets/js/pages/form-pickers.init.js',
    'public/admin/assets/js/pages/form-pickers.init.js')

.scripts('resources/views/admin/assets/js/pages/add-product.init.js',
    'public/admin/assets/js/pages/add-product.init.js')

.scripts('resources/views/admin/assets/libs/summernote/summernote-bs4.min.js',
    'public/admin/assets/libs/summernote/summernote-bs4.min.js')

.scripts('resources/views/admin/assets/libs/select2/select2.min.js',
    'public/admin/assets/libs/select2/select2.min.js')

.scripts('resources/views/admin/assets/libs/sweetalert2/sweetalert2.min.js',
    'public/site/assets/libs/sweetalert2/sweetalert2.min.js')

.scripts('resources/views/admin/assets/js/pages/sweet-alerts.init.js',
    'public/site/assets/js/pages/sweet-alerts.init.js')

.scripts('resources/views/admin/assets/libs/flatpickr/flatpickr.min.js',
    'public/admin/assets/libs/flatpickr/flatpickr.min.js')

.scripts('resources/views/admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js',
    'public/admin/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')

.scripts('resources/views/admin/assets/libs/clockpicker/bootstrap-clockpicker.min.js',
    'public/admin/assets/libs/clockpicker/bootstrap-clockpicker.min.js')

// ASSETS SITE
// CSS
.styles('resources/views/site/assets/css/padrao/default.css',
    'public/site/assets/css/padrao/default.css')

.styles('resources/views/site/assets/css/plugins/jquery.fancybox.min.css',
    'public/site/assets/css/plugins/jquery.fancybox.min.css')

.styles('resources/views/site/assets/css/plugins/jquery.sweet-dropdown.css',
    'public/site/assets/css/plugins/jquery.sweet-dropdown.css')

.styles('resources/views/site/assets/css/plugins/animate.css',
    'public/site/assets/css/plugins/animate.css')

.styles('resources/views/site/assets/css/plugins/owl.carousel.css',
    'public/site/assets/css/plugins/owl.carousel.css')

.styles('resources/views/site/assets/css/padrao/linkFontes.css',
    'public/site/assets/css/padrao/linkFontes.css')

.styles('resources/views/site/assets/css/main.css',
    'public/site/assets/css/main.css')

.styles('resources/views/admin/assets/libs/sweetalert2/sweetalert2.min.css',
    'public/site/assets/libs/sweetalert2/sweetalert2.min.css')

.styles('resources/views/site/assets/css/icons.min.css',
    'public/site/assets/css/icons.min.css')

.styles('resources/views/site/assets/css/app.min.css',
    'public/site/assets/css/app.min.css')

// SCRIPTS
.scripts('resources/views/site/assets/funcoes/biblioteca/jquery-3.3.1.min.js',
    'public/site/assets/funcoes/biblioteca/jquery-3.3.1.min.js')

.scripts('resources/views/site/assets/funcoes/plugins/jquery.fancybox.min.js',
    'public/site/assets/funcoes/plugins/jquery.fancybox.min.js')

.scripts('resources/views/site/assets/funcoes/plugins/owl.carousel.min.js',
    'public/site/assets/funcoes/plugins/owl.carousel.min.js')

.scripts('resources/views/site/assets/funcoes/plugins/instagramLite.js',
    'public/site/assets/funcoes/plugins/instagramLite.js')

.scripts('resources/views/site/assets/funcoes/plugins/jquery.menusidebar.js',
    'public/site/assets/funcoes/plugins/jquery.menusidebar.js')

.scripts('resources/views/site/assets/funcoes/plugins/jquery.banner.js',
    'public/site/assets/funcoes/plugins/jquery.banner.js')

.scripts('resources/views/site/assets/funcoes/plugins/jquery.sweet-dropdown.js',
    'public/site/assets/funcoes/plugins/jquery.sweet-dropdown.js')

.scripts('resources/views/site/assets/funcoes/plugins/jquery.zoom.min.js',
    'public/site/assets/funcoes/plugins/jquery.zoom.min.js')

.scripts('resources/views/site/assets/funcoes/pagseguro_error.js',
    'public/site/assets/funcoes/pagseguro_error.js')

.scripts('resources/views/site/assets/funcoes/default.js',
    'public/site/assets/funcoes/default.js')

.scripts('resources/views/site/assets/funcoes/main.js',
    'public/site/assets/funcoes/main.js')

.scripts('resources/views/site/assets/funcoes/paymentPagseguro.js',
    'public/site/assets/funcoes/paymentPagseguro.js')

.scripts('resources/views/site/assets/funcoes/validates.js',
    'public/site/assets/funcoes/validates.js')

.scripts('resources/views/site/assets/funcoes/theme.js',
    'public/site/assets/funcoes/theme.js')




.version();