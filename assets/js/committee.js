/**
 * Created by Armando_Navarro on 24/07/2017.
 */

$(function () {

    $('#frmCommittee').validate({
        rules:{

            ec_name:{
                required: true
            },
            ec_position:{
                required: true,
            },
            ec_photo:{
                required: true
            }
        },
        messages:{

            ec_name: {
                minlength: "Introduzca al menos tres caracteres",
                maxlength: "Introduzca máximo 20 caracteres",
                required: "Capture el nombre del nuevo miembro"
            },
            ec_position: {
                minlength: "Introduzca al menos tres caracteres",
                maxlength: "Introduzca máximo 20 caracteres",
                required: "Capture el puesto del nuevo miembro"
            },

            ec_photo:{
                required: "Necesita seleccionar una foto de perfil"
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
            newMember();
            return false;
        }
    });
});


function newMember(){
    var form = $('form#frmCommittee')[0];
    var data = new FormData(form);
    $.ajax({
        url: "/Yuritec_Educare/committee/newMember",
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
                $('#ec_name').val('');
                $('#ec_position').val('');
                $('#ec_bio').val('');
                $('#ec_photo').val('');
                $('#ec_fbaccount').val('');
                $('#ec_twaccount').val('');

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

