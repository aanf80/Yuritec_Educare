/**
 * Created by Jessica Lizbeth on 14/06/2017.
 */

var $contactid;
$(function () {

    //VISTA DE ADMIN
    $.ajax({
        url: '/settings/getContact',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){
                showContactInfo(row['contactid'],row['address'],row['phone'],row['extension'],row['email'],row['schedule']);
            });
    });

    $('#btnGuardarContacto').on('click', function () {
        updateContact();
    });


    //VISTA DE USUARIO GENERAL
    $('#frmContact').validate({
        rules:{

            name:{
                required: true
            },
            email: {
                required: true
            },
            message: {
                required: true
            }
        },
        messages:{

            name: {
                required: "Capture el nombre de contacto"
            },
            email: {
                required: "Capture un email de contacto"
            },
            message: {
                required: "Capture un mansaje"
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
            sendMessage();
            return false;
        }
    });
});


function showContactInfo(contactid,address,phone,extension,email,schedule){
    $contactid = contactid;
$('#adminAddress').val(address);
$('#adminPhone').val(phone);
$('#adminExtension').val(extension);
$('#adminEmail').val(email);
$('#adminSchedule').val(schedule);
}

function sendMessage(){
    $.ajax({
        url: "/Contact/sendContactEmail",
        type: "post",
        data: $('#frmContact').serialize()
    }).done(
        function(data){
            console.log(data.code);
            if(data.code === 200){

                $.growl.notice({ message: data.msg });
                $('#name').val('');
                $('#phone').val('');
                $('#email').val('');
                $('#message').val('');

                console.log("Mensaje enviadooo");
            }
            else{
                $.growl.error({ message: data.msg });

            }

        }
    ).fail(
        function(){
            $.growl.error({ message: "Ocurrió un error interno" });
        }
    );
}

function updateContact(){
    $.ajax(
        {
            url:"/settings/updateContact" ,
            type: "post",
            data: {
                contactid: $contactid,
                extension: $('#adminExtension').val(),
                email: $('#adminEmail').val(),
                phone: $('#adminPhone').val(),
                schedule: $('#adminSchedule').val(),
                address: $('#adminAddress').val()
            }
        }
    ).done(
        function (data) {
console.log("Codigo "+data.code);
            if (data.code == 200) {
                $.growl.notice({message: data.msg});

            } else {
                $.growl.error({message: data.msg});
            }
        }
    ).fail(
        function () {
            $.growl.error({message: "El servidor no está disponible"});
        }
    );
}