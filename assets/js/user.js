/**
 * Created by Armando_Navarro on 11/04/2017.
 */
$(function () {

    $('#roleid').trigger('click');

    $.ajax({
        url: '/Yuritec_Educare/settings/getRoles',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){
        console.log("Codigo json: "+json.code);
        if(json.code===200)
            $.each(json.msg, function(i,row){
                console.log(row.rolename);
                $('<option></option>', {text: row.rolename}).attr('value',row.roleid).appendTo('#roleid');
            });
    });


    $('#frmUser').validate({
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



    $('#tbUsers').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/user/getUsers",
            dataSrc:function(json){

                return json['msg'];
            }
        },
        columns:[
            {
                data:"userid"
            },
            {
                data:"username"
            },
            {
                data: function (row) {
                    str = "<div align = 'left'>"+ row['lastname']+" "+row['maternalsurname'];
                    //  str += accounting.formatMoney(row['roleid']);
                    str += "</div>";
                    return str;
                }
            },
            {
                data:"gender"
            },
            {
                data: function (row) {
                    str = "<div align = 'left'>"+ row['address']+" #"+row['streetnumber']+", "+row['neighborhood'];
                    //  str += accounting.formatMoney(row['roleid']);
                    str += "</div>";
                    return str;
                }
            },
            {
                data:"zipcode"
            },
            {
                data: function (row) {
                    str = "<div align = 'left'>"+row['city']+", "+row['state'];
                    //  str += accounting.formatMoney(row['roleid']);
                    str += "</div>";
                    return str;
                }
            },
            {
                data:"country"
            },
            {
                data:"email"
            }, {
                data:"password"
            },
            {
                data:"sign"
            },
            {
                data:"position"
            },
            {
                data:"institute"
            },
            {
                data:"roleid"
            },
            {
                data: function (row) {
                    str = "<div align='center'>";
                    str +="<button id='btnEditar' class='btn btn-success' onClick='showUser(" + row['userid'] + ",\"" + row['username'] + "\")'><i class=\"glyphicon glyphicon-edit\"></i></button>";
                    str += "&nbsp;<button id='btnBorrar' class='btn btn-danger' onClick='deleteUser(" + row['userid'] + ")'><i class=\"glyphicon glyphicon-trash\"></i> </button>";//trash
                    str += "</div>"
                    return str;
                }

            }

        ]
    });

});









function newUser(){
    $.ajax({
        url: "/Yuritec_Educare/user/newUser",
        type: "post",
        data: $('#frmUser').serialize()
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
                $('#initials').val('');
                $('#sign').val('');
                $('#photo').val('');
                $('#address').val('');
                $('#neighborhood').val('');
                $('#state').val('');
                $('#city').val('');
                $('#streetnumber').val('');
                $('#zipcode').val('');
                $('#roleid').index(0);
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

function showUser(userid, username) {
    $('#userid').val(userid);
    $('#username2').val(username);
    $('#modalUser').modal("show");

}



function deleteUser(userid) {

    swal(
        {
            title: "¿Estas seguro que deseas eliminar este registro?", text: "",
            type: "warning", showCancelButton: true,
            confirmButtonColor: "#DD6B55", confirmButtonText: "Aceptar!",
            cancelButtonText: "Cancelar", closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {

                var para = {
                    "userid": userid
                };
                ///Comienza a Borrar
                $.ajax(
                    {
                        url: "/Yuritec_Educare/user/deleteUser",
                        type: "post",
                        data: {userid: userid}
                    }
                ).done(
                    function (data) {
                        //alert("Se realizó correctamente "+data.code);
                        if (data.code == 200) {
                            //$.growl.notice({message: data.msg});
                            $.growl.notice({message: data.msg + " " + data.details});
                            swal("Eliminado!", "El registro se elimino correctamente", "success");
                            $('#tbUsers').dataTable().api().ajax.reload();
                            $('#userid').val('');
                        } else {
                            $.growl.error({message: data.msg});
                        }
                    }
                ).fail(
                    function () {
                        $.growl.error({message: "El servidor no está disponible :("});
                    }
                );
            } else {
                swal("Cancelado", "Accion Cancelada", "error");
            }
        });

}