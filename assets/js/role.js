/**
 * Created by Armando_Navarro on 06/12/2016.
 */

$(function() {

    $('#frmRole').validate({
        rules: {

            rolename: {
                minlength: 3,
                required: true
            }
        },
        messages: {

            rolename: {
                required: "Capture el nombre del rol"
            }
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            newRole();
            return false;
        }
    });


    $('#frmEditRole').validate({
        rules: {
            rolename2: {
                minlength: 3,

                required: true
            }
        },
        messages: {
            rolename2: {
                minlength: "Introduzca al menos 3 caracteres",

                required: "Capture el nombre del rol"
            }
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            updateRole();
            return false;
        }
    });


    $('#btnModificar').on('click', function () {

        $('#frmEditRole').submit();

    });


    $('#tbRole').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/settings/getRoles",
            dataSrc:function(json){

                return json['msg'];
            }
        },
        columns:[
            {
                data:"roleid"
            },
            {
                data:"rolename"
            },
            {
                data: function (row) {
                    str = "<div >";
                    str +="<button id='btnEditar' class='btn btn-warning' onClick='showRole(" + row['roleid'] + ",\"" + row['rolename'] + "\")'><i class=\"glyphicon glyphicon-edit\"></i> Editar</button>";
                    str += "&nbsp;<button id='btnBorrar' class='btn btn-danger' onClick='deleteRole(" + row['roleid'] + ")'><i class=\"glyphicon glyphicon-trash\"></i> Eliminar</button>";//trash
                    str += "</div>"
                    return str;
                }

            }

        ]
    });


});

function showRole(roleid, nombrerole) {
    $('#roleid').val(roleid);
    $('#rolename2').val(nombrerole);
    $('#modalRole').modal("show");

}
function updateRole() {

    $.ajax(
        {
            url:"/Yuritec_Educare/settings/updateRole" ,
            type: "post",
            data: {
                roleid: $('#roleid').val(),
                rolename: $('#rolename2').val()
            }
        }
    ).done(
        function (data) {

            if (data.code == 200) {
                $.growl.notice({message: data.msg});
                $('#tbRole').dataTable().api().ajax.reload();
                $('#modalRole').modal("toggle");
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
function newRole(){

    $.ajax({
        url: "/Yuritec_Educare/settings/insertRole",
        type: "post",
        data: {
            rolename: $('#rolename').val()
        }
    }).done(
        function(data){
            if(data.code === 200){
                $.growl.notice({ message: data.msg });
                $('#tbRole').dataTable().api().ajax.reload();
                $('#rolename').val('');
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

function deleteRole(roleid) {

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
                    "roleid": roleid
                };
                ///Comienza a Borrar
                $.ajax(
                    {
                        url: "/Yuritec_Educare/settings/deleteRole",
                        type: "post",
                        data: {roleid: roleid}
                    }
                ).done(
                    function (data) {
                        //alert("Se realizó correctamente "+data.code);
                        if (data.code == 200) {
                            //$.growl.notice({message: data.msg});
                            $.growl.notice({message: data.msg + " " + data.details});
                            swal("Eliminado!", "El registro se elimino correctamente", "success");
                            $('#tbRole').dataTable().api().ajax.reload();
                            $('#roleid').val('');
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




