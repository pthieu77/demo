$(document).ready(function() {
    // event click button login
    $("#btn_login").on('click', function() {
        var isCheck = true;
        var $el_form = $("#login_form");
        $el_form.parsley().validate();
        isCheck = $el_form.parsley().isValid();

        if (isCheck) {
            postLogin();
        }
    });
});

var postLogin = function() {
    run_waitMe('.container');
    var url = base_ajax + '/user/login';
    $.ajax({
        url: url,
        type: "POST",
        data: $("#login_form").serialize(),
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
            run_waitMe('.container', true);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                text: 'There was an error during processing'
            });
            run_waitMe('.container', true);
        }
    });
}


