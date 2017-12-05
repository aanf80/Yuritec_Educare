/**
 * Created by Armando_Navarro on 11/04/2017.
 */

$sitio = "Yuritec_Educare"
$(function () {

    $('#frmRegister').validate({
        rules:{

            username:{
                required: true
            },
            email:{
                required: true,
                email:true
            },
            lastname:{
                required: true
            },
            institute:{
                required: true
            },
            password:{
                required: true,
                minlength: 5
            },
            confpassword:{
                required: true,
                minlength: 5,
                equalTo: '#password'
            },
            streetnumber:{
                digits: true
            },
            zipcode:{
                digits: true
            }
        },
        messages:{

            username: {
                minlength: "Introduzca al menos tres caracteres",
                maxlength: "Introduzca máximo 20 caracteres",
                required: "Capture su nombre"
            },
            lastname: {
                minlength: "Introduzca al menos tres caracteres",
                maxlength: "Introduzca máximo 20 caracteres",
                required: "Capture su apellido paterno"
            },
            email:{
                required: "Capture su correo electrónico",
                email: "Formato de correo electrónico incorrecto"
            },
            password:{
                required: "Capture su contraseña",
                minlength: "Introduzca mínimo 5 caracteres"
            },
            institute:{
                required: "Capture su institución de procedencia"
            },
            confpassword:{
                required: "Confirme su contraseña",
                minlength: "Introduzca mínimo 5 caracteres",
                equalTo: "Las contraseñas no coinciden"
            },
            streetnumber:{
                digits: "Introduzca sólo números"
            },
            zipcode:{
                digits: "Introduzca sólo números"
            }

        },
        highlight: function (element){
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element){
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'alert-danger',
        errorPlacement: function(error, element){
            if(element.parent('.input-group').length){
                error.insertAfter(element.parent());
            }else{
                error.insertAfter(element);
            }
        },
        submitHandler: function(form){
            newUser();
            return false;
        }
    });
});


function newUser(){
    var form = $('form#frmRegister')[0];
    var data = new FormData(form);
    $.ajax({
        url: "/"+$sitio+"/user/register",
        type: "post",
        data: data,
        cache: false,
        contentType: false,
        processData: false

    }).done(
        function(data){
            console.log(data.code);
            if(data.code === 200){
                $.growl.notice({ message: data.msg });
                $('#username').val('');
                $('#lastname').val('');
                $('#maternalsurname').val('');
                $('#password').val('');
                $('#confpassword').val('');
                $('#email').val('');
                $('#bio').val('');
                $('#position').val('');
                $('#institute').val('');
                $('#inititals').val('');
                $('#sign').val('');
                $('#address').val('');
                $('#neighborhood').val('');
                $('#state').val('');
                $('#city').val('');
                $('#streetnumber').val('');
                $('#zipcode').val('');
                $('#country').index(0);

                console.log("usuario insertado!!");
            }
            else{
                $.growl.error({ message: data.msg });

            }

        }
    ).fail(
        function(){
            $.growl.error({ message: "El servidor no se encuentra disponible" });
        }
    );
}
