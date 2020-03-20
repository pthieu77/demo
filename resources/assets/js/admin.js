window.$ = window.jQuery = require('jquery');

require('jquery-ui');
require('bootstrap');
var PerfectScrollbar = require('perfect-scrollbar').default;
require('datatables.net-bs4');
require('datatables.net-responsive-bs4');
require('select2');
require('moment');
var Swal = window.Swal = require('sweetalert2');
require('parsleyjs');

$.fn.perfectScrollbar = function (options) {

    return this.each((k, elm) => new PerfectScrollbar(elm, options || {}));
};

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});