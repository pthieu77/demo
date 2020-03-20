$(document).ready(function() {
    // event click button login
    $("#btn_change_password").on('click', function() {
        var isCheck = true;
        var $el_form = $("#frm_change_password");
        $el_form.parsley().validate();
        isCheck = $el_form.parsley().isValid();

        if (isCheck) {
            postResetPassword();
        }
    });
});

var getUrlParameter = function(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

var postResetPassword = function() {
    run_waitMe('.container');
    var url = base_ajax + '/user/reset-password';
    var token = getUrlParameter('token');

    $.ajax({
        url: url,
        type: "POST",
        data: $("#frm_change_password").serialize() + "&token=" + token,
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


