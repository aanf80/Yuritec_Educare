$(function(){
    $('#frmLogin').validate({

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
            login();
            return false;
        }
    });
    function login(){
        $.ajax({
            url: "/Yuritec_Educare/login/validaLogin",
            type: "post",
            data: {username : $('#username').val(),

                password : $('#password').val()}
        }).done(
            function(data){
                if(data.code === 200){
                    var url = "index.php";
                    $(location).attr('href',url);
                    $.growl.notice({ message: data.msg });
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


});

