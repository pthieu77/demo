$(document).ready(function() {
    var path_name = location.pathname;

    if (path_name == "/" || path_name == "") {
        $("#btn_home").addClass('d-none');
        $("#btn_account").removeClass('d-none');

        $("#btn_none_home").addClass('d-none');
        $("#btn_none_login").removeClass('d-none');
    } else {
        $("#btn_home").removeClass('d-none');
        $("#btn_account").addClass('d-none');

        $("#btn_none_home").removeClass('d-none');
        $("#btn_none_login").addClass('d-none');
    }

    $("#btn_logout").on('click', function() {
        $("#header").addClass('hide');
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
    run_waitMe('#header');
    var url = base_ajax + '/user/logout';
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

                location.href = location.origin;
            } else {
                Swal.fire({
                    type: 'warning',
                    title: 'Oops',
                    text: response.msg
                });
            }
            run_waitMe('#header', true);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                text: 'There was an error during processing'
            });
            run_waitMe('#header', true);
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