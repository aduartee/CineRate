$(document).ready(function () {
    $('#register-button').click(function () {
        if ($('#password').val().length < 10 || $('#confirmpassoword').val().length < 10) {
            alert('A senha não pode conter menos de 10 dígitos');
        }
    });

    $('#password').on('input', function () {
        var password = $(this).val();
        var bar = $('#password-bar');
        if (password.length < 10) {
            bar.css('background-color', 'red');
        } else {
            bar.css('background-color', 'blue');
        }
    });
});
