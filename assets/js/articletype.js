/**
 * Created by Armando_Navarro on 06/12/2016.
 */

$(function() {

    $('#frmTipo_Articulo').validate({
        rules: {

            nombreTipo_Articulo: {
                minlength: 3,
                required: true
            }
        },
        messages: {

            nombreTipo_Articulo: {
                required: "Capture el nombre de la categoria"
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
            newArticle_Type();
            return false;
        }
    });


    $('#frmEditArticle_Type').validate({
        rules: {
            nombreTipo_Articulo2: {
                minlength: 3,

                required: true
            }
        },
        messages: {
            nombreTipo_Articulo2: {
                minlength: "Introduzca al menos 3 caracteres",

                required: "Capture el nombre de la categoria"
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
            updateArticle_Type();
            return false;
        }
    });


    $('#btnModificar').on('click', function () {

        $('#frmEditArticle_Type').submit();

    });


    $('#tbTipo_Articulo').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/settings/getArticleTypes",
            dataSrc:function(json){

                return json['msg'];
            }
        },
        columns:[
            {
                data:"article_typeid"
            },
            {
                data:"article_typename"
            },
            {
                data: function (row) {
                    str = "<div align='center' >";
                    str +="<button id='btnEditar' class='btn btn-success' onClick='showArticle_Type(" + row['article_typeid'] + ",\"" + row['article_typename'] + "\")'><i class=\"glyphicon glyphicon-edit\"></i> Editar</button>";
                    str += "&nbsp;<button id='btnBorrar' class='btn btn-danger' onClick='deleteArticle_Type(" + row['article_typeid'] + ")'><i class=\"glyphicon glyphicon-trash\"></i> Eliminar</button>";//trash
                    str += "</div>"
                    return str;
                }

            }

        ]
    });


});

function showArticle_Type(article_typeid, nombrearticle_type) {
    $('#article_typeid').val(article_typeid);
    $('#nombreTipo_Articulo2').val(nombrearticle_type);
    $('#modalArticle_Type').modal("show");

}
function updateArticle_Type() {

    $.ajax(
        {
            url:"/Yuritec_Educare/settings/updateArticle_Type" ,
            type: "post",
            data: {
                article_typeid: $('#article_typeid').val(),
                article_typename: $('#nombreTipo_Articulo2').val()
            }
        }
    ).done(
        function (data) {

            if (data.code == 200) {
                $.growl.notice({message: data.msg});
                $('#tbTipo_Articulo').dataTable().api().ajax.reload();
                $('#modalArticle_Type').modal("toggle");
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
function newArticle_Type(){

    $.ajax({
        url: "/Yuritec_Educare/settings/newArticleType",
        type: "post",
        data: {
            article_typename: $('#nombreTipo_Articulo').val()
        }
    }).done(
        function(data){
            if(data.code === 200){
                $.growl.notice({ message: data.msg });
                $('#tbTipo_Articulo').dataTable().api().ajax.reload();
                $('#nombreTipo_Articulo').val('');
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

function deleteArticle_Type(article_typeid) {

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
                    "article_typeid": article_typeid
                };
                ///Comienza a Borrar
                $.ajax(
                    {
                        url: "/Yuritec_Educare/settings/deleteArticle_Type",
                        type: "post",
                        data: {article_typeid: article_typeid}
                    }
                ).done(
                    function (data) {
                        //alert("Se realizó correctamente "+data.code);
                        if (data.code == 200) {
                            //$.growl.notice({message: data.msg});
                            $.growl.notice({message: data.msg + " " + data.details});
                            swal("Eliminado!", "El registro se elimino correctamente", "success");
                            $('#tbTipo_Articulo').dataTable().api().ajax.reload();
                            $('#article_typeid').val('');
                            $('#modalArticle_Type').modal("toggle");
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





