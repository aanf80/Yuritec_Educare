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
                maxlength: "Introduzca menos de 20 caracteres",
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
    var form = $('form#frmRegister')[0];
    var data = new FormData(form);
    $.ajax({
        url: "/Yuritec_Educare/user/register",
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
                $('#photo').val('');
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
            $.growl.error({ message: "Verifique que haya llenado correctamente los campos" });
        }
    );
}
