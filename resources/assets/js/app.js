window.$ = window.jQuery = require('jquery');

require('jquery-ui');
require('bootstrap');

var Swal = window.Swal = require('sweetalert2');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

