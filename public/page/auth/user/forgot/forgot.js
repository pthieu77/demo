$(document).ready(function() {
    // event click button login
    $("#btn_send_mail").on('click', function() {
        var isCheck = true;
        var $el_form = $("#frm_send_mail");
        $el_form.parsley().validate();
        isCheck = $el_form.parsley().isValid();

        if (isCheck) {
            postForgotPassword();
        }
    });
});

var postForgotPassword = function() {
    run_waitMe('.container');
    var url = base_ajax + '/user/forgot-password';
    $.ajax({
        url: url,
        type: "POST",
        data: $("#frm_send_mail").serialize(),
        success: function(response) {
            if (response.code === 201) {
                Swal.fire({
                    type: 'success',
                    title: response.msg
                });

                location.href = location.origin + '/login';
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


