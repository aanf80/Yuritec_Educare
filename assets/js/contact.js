/**
 * Created by Jessica Lizbeth on 14/06/2017.
 */
$(function () {

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

            username: {
                required: "Capture el nombre de usuario"
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



function sendMessage(){
    $.ajax({
        url: "/Yuritec_Educare/Contact/sendContactEmail",
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
