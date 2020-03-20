$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#login_group").slideUp();
        $("#recover_group").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recover_group").hide();
        $("#login_group").fadeIn();
    });

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
    run_waitMe('#main-wrapper');
    var url = base_ajax + '/admin/login';
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
            run_waitMe('#main-wrapper', true);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            Swal.fire({
                type: 'warning',
                title: 'Oops',
                text: 'There was an error during processing'
            });
            run_waitMe('#main-wrapper', true);
        }
    });
}


