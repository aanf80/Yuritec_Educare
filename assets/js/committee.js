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

    $('#tbMembers').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/committee/getMembers",
            dataSrc:function(json){

                return json['msg'];
            }
        },
        columns:[
            {
                data:"ec_memberid"
            },
            {
                data:"ec_name"
            },
            {
                data:"ec_position"
            },
            {
                data:"ec_bio"
            },
            {
                data:"ec_fbaccount"
            },
            {
                data:"ec_twaccount"
            },
            {
                data: function (row) {
                    str = "<div align='center' >";
                    str +="<button class='btn btn-success' onClick='showCategory(" + row['categoryid'] + ",\"" + row['categoryname'] + "\")'><i class=\"glyphicon glyphicon-edit\"></i></button>";
                    str += "&nbsp;<button class='btn btn-danger' onClick='deleteMember(" + row['ec_memberid'] + ")'><i class=\"glyphicon glyphicon-trash\"></i> </button>";//trash
                    str += "&nbsp;<button class='btn btn-warning' onClick='deleteCategory(" + row['categoryid'] + ")'><i class=\"glyphicon glyphicon-camera\"></i></button>";//trash
                    str += "</div>"
                    return str;
                }

            }

        ]
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



function deleteMember(ec_memberid) {

    swal(
        {
            title: "¿Estás seguro que deseas eliminar este registro?", text: "",
            type: "warning", showCancelButton: true,
            confirmButtonColor: "#DD6B55", confirmButtonText: "Aceptar!",
            cancelButtonText: "Cancelar", closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {

                var para = {
                    "ec_memberid": ec_memberid
                };
                ///Comienza a Borrar
                $.ajax(
                    {
                        url: "/Yuritec_Educare/committee/deleteMember",
                        type: "post",
                        data: {ec_memberid: ec_memberid}
                    }
                ).done(
                    function (data) {
                        //alert("Se realizó correctamente "+data.code);
                        if (data.code == 200) {
                            //$.growl.notice({message: data.msg});
                            $.growl.notice({message: data.msg + " " + data.details});
                            swal("Eliminado!", "El registro se elimino correctamente", "success");
                            $('#tbMembers').dataTable().api().ajax.reload();
                            //$('#ec_memberid').val('');

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