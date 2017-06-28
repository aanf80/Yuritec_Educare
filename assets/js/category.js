/**
 * Created by Armando_Navarro on 06/12/2016.
 */

$(function() {

    $('#frmCategoria').validate({
        rules: {

            nombreCategoria: {
                minlength: 3,
                required: true
            }
        },
        messages: {

            nombreCategoria: {
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
            newCategory();
            return false;
        }
    });


    $('#frmEditCategory').validate({
        rules: {
            nombreCategoria2: {
                minlength: 3,

                required: true
            }
        },
        messages: {
            nombreCategoria2: {
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
            updateCategory();
            return false;
        }
    });


    $('#btnModificar').on('click', function () {

        $('#frmEditCategory').submit();

    });


    $('#tbCategoria').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/settings/getCategories",
            dataSrc:function(json){

                return json['msg'];
            }
        },
        columns:[
            {
                data:"categoryid"
            },
            {
                data:"categoryname"
            },
            {
                data: function (row) {
                    str = "<div align='center' >";
                    str +="<button id='btnEditar' class='btn btn-success' onClick='showCategory(" + row['categoryid'] + ",\"" + row['categoryname'] + "\")'><i class=\"glyphicon glyphicon-edit\"></i> Editar</button>";
                    str += "&nbsp;<button id='btnBorrar' class='btn btn-danger' onClick='deleteCategory(" + row['categoryid'] + ")'><i class=\"glyphicon glyphicon-trash\"></i> Eliminar</button>";//trash
                    str += "</div>"
                    return str;
                }

            }

        ]
    });


});

function showCategory(categoryid, nombrecategory) {
    $('#categoryid').val(categoryid);
    $('#nombreCategoria2').val(nombrecategory);
    $('#modalCategory').modal("show");

}
function updateCategory() {

    $.ajax(
        {
            url:"/Yuritec_Educare/settings/updateCategory" ,
            type: "post",
            data: {
                categoryid: $('#categoryid').val(),
                categoryname: $('#nombreCategoria2').val()
            }
        }
    ).done(
        function (data) {

            if (data.code == 200) {
                $.growl.notice({message: data.msg});
                $('#tbCategoria').dataTable().api().ajax.reload();
                $('#modalCategory').modal("toggle");
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
function newCategory(){

    $.ajax({
        url: "/Yuritec_Educare/settings/insertCategory",
        type: "post",
        data: {
            categoryname: $('#nombreCategoria').val()
        }
    }).done(
        function(data){
            if(data.code === 200){
                $.growl.notice({ message: data.msg });
                $('#tbCategoria').dataTable().api().ajax.reload();
                $('#nombreCategoria').val('');
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

function deleteCategory(categoryid) {

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
                    "categoryid": categoryid
                };
                ///Comienza a Borrar
                $.ajax(
                    {
                        url: "/Yuritec_Educare/settings/deleteCategory",
                        type: "post",
                        data: {categoryid: categoryid}
                    }
                ).done(
                    function (data) {
                        //alert("Se realizó correctamente "+data.code);
                        if (data.code == 200) {
                            //$.growl.notice({message: data.msg});
                            $.growl.notice({message: data.msg + " " + data.details});
                            swal("Eliminado!", "El registro se elimino correctamente", "success");
                            $('#tbCategoria').dataTable().api().ajax.reload();
                            $('#categoryid').val('');
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





