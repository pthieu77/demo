$(document).ready(function() {
    // event click button login
    $("#btn_sign_up").on('click', function() {
        var isCheck = true;
        var $el_form = $("#frm_register");
        $el_form.parsley().validate();
        isCheck = $el_form.parsley().isValid();

        if (isCheck) {
            postRegister();
        }
    });
});

var postRegister = function() {
    run_waitMe('.container');
    var url = base_ajax + '/user/register';
    $.ajax({
        url: url,
        type: "POST",
        data: $("#frm_register").serialize(),
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


