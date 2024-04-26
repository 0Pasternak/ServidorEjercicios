$(document).ready(function(){

    $('#loginForm').submit(function(e){
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: {email: email, password: password},
            success: function(response){
                if(response == 'success'){
                    window.location = 'welcome.php';
                } else {
                    $('#message').html(response);
                }
            }
        });
    });

    $('#registroForm').submit(function(e){
        e.preventDefault();
        var email = $('#emailRegistro').val();
        var password = $('#passwordRegistro').val();
        var nombre = $('#nombre').val();
        var sexo = $('#sexo').val();
        var fechaNacimiento = $('#fechaNacimiento').val();
        $.ajax({
            type: 'POST',
            url: 'registro.php',
            data: {email: email, password: password, nombre: nombre, sexo: sexo, fechaNacimiento: fechaNacimiento},
            success: function(response){
                $('#registroMessage').html(response);
            }
        });
    });
});
