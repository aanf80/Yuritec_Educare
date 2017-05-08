/**
 * Created by Armando_Navarro on 11/04/2017.
 */
$(function () {

    $('#frmRegister').validate({
        rules:{

            username:{
                required: true
            }
        },
        messages:{

            username: {
                minlength: "Introduzca al menos tres caracteres",
                maxlength: "Introdusca menos de 20 caracteres",
                required: "Capture el nombre de usuario"
            }
        },
        highlight: function (element){
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element){
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
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
    $.ajax({
        url: "/Yuritec_Educare/user/register",
        type: "post",
        data: $('#frmRegister').serialize()
    }).done(
        function(data){
            console.log(data.code);
            if(data.code === 200){
                $.growl.notice({ message: data.msg });
                $('#username').val('');
                $('#lastname').val('');
                $('#maternalsurname').val('');
                $('#password').val('');
                $('#email').val('');
                $('#position').val('');
                $('#institute').val('');
                $('#inititals').val('');
                $('#sign').val('');
                $('#photo').val('');
                $('#address').val('');
                $('#country').val('');
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
            $.growl.error({ message: "No hay mensaje que mostrar" });
        }
    );
}
