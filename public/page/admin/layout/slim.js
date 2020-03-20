$(document).ready(function() {
    $("#logout_account").on('click', function() {
        postLogout();
    });
});

var run_waitMe = function(el, stop) {
    if (stop) {
        $(el).waitMe('hide');
    } else {
        $(el).waitMe({
            effect: 'bounce',
            text: 'Please wait...',
            bg: 'rgba(255,255,255,0.7)',
            color: '#000',
            maxSize: '',
            waitTime: -1,
            textPos: 'vertical',
            fontSize: '',
            source: "{{asset('/assets/images/loading_heineken.gif')}}",
            onClose: function(el) {}
        });
    }
};

var checkErrorResponse = function(jqXHR) {
    if (jqXHR.status == 419) {
        var param = window.location.pathname.split('/');
        var redirect_host = window.location.origin;
        var redirect_path = '/login';

        if (param && param.length > 1) {
            if (param[1] == 'admin') {
                redirect_path = '/admin/login';
            }
        }
        window.location = redirect_host + redirect_path;
    }
}

var postLogout = function() {
    run_waitMe('#main-wrapper');
    var url = base_ajax + '/admin/logout';
    $.ajax({
        url: url,
        type: "POST",
        data: [],
        success: function(response) {
            if (response.code === 200) {
                Swal.fire({
                    type: 'success',
                    title: response.msg
                });

                $('#username').val('');
                $('#password').val('');

                location.reload();
            } else {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: response.msg
                });
            }
            run_waitMe('#main-wrapper', true);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                text: 'There was an error during processing'
            });
            run_waitMe('#main-wrapper', true);
            checkErrorResponse(jqXHR);
        }
    });
}

var getAPI = function(url, call_back) {
    $.ajax({
        url: url,
        type: "GET",
        success: function(response) {
            if (response.code == 200) {
                if (call_back) {
                    call_back(response.data);
                }
            } else {
                if (call_back) {
                    call_back();
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                text: 'There was an error during processing'
            });
            checkErrorResponse(jqXHR);
        }
    });
}

var deleteAPI = function(url, call_back) {
    $.ajax({
        url: url,
        type: "DELETE",
        success: function(response) {
            if (response.code == 200) {
                if (call_back) {
                    call_back(response.data);
                }
            } else {
                if (call_back) {
                    call_back();
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                text: 'There was an error during processing'
            });
            checkErrorResponse(jqXHR);
        }
    });
}

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}