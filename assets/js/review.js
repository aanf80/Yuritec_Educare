/**
 * Created by Concurso18 on 22/06/2017.
 */
$(function(){

    $.ajax({
        url: '/Yuritec_Educare/user/getUsersByRole/3',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){

                $('<option></option>', {text: row.username+" "+row.lastname}).attr('value',row.userid).appendTo('#reviserid');
            });
    });//fin de combobox



    var table =  $('#tbReview').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/article/getArticlesByStatus/2",
            dataSrc:function(json){

                return json['msg'];
            }
        },
        columns:[
            {
                data:"articleid"
            },
            {
                data:"title"
            },
            {
                data:"articledate"
            }, {
                data:"status"
            },
            {
                data:"cover"
            },
            {
                data: function (row) {
                    str = "<div align='center'>";
                    str +="<button class='btn btn-warning btn-block'><i class=\"glyphicon glyphicon-download-alt\"></i> Descargar Artículo</button>";
                    str +="<button class='btn btn-info btn-block'><i class=\"glyphicon glyphicon-download-alt\"></i> Descargar Formato</button>";
                    str +="<button id='btnCheck' class='btn btn-primary btn-block' onClick='showReview()'><i class=\"glyphicon glyphicon-cloud-upload\"></i> Subir Evaluación</button>";
                    str += "</div>"
                    return str;
                }

            }
        ]
    });// fin datatable de REVISOR

    $('#tbReview tbody').on( 'click','.btn-warning',  function () {
        if (table.row(this).child.isShown()) {
            var data = table.row(this).data();
        } else {
            var data = table.row($(this).closest('tr')).data();
        }
        window.location.href = '/Yuritec_Educare/upload/articles/'+data[Object.keys(data)[13]];

    });

    $('#btnModificarEstado').on('click', function () {
        setReview();
    });

//-----------------------------------REVISION DE ARTICULO--------------------------------------------------------------------

    var table2 =  $('#tbAssign').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/article/getArticlesByStatus/1",
            dataSrc:function(json){

                return json['msg'];
            }
        },
        columns:[
            {
                data:"articleid"
            },
            {
                data:"title"
            },
            {
                data:"articledate"
            }, {
                data:"status"
            },
            {
                data: function (row) {
                    str = "<div align='center'>";
                    str +="<button id='btnDescargar' class='btn btn-warning btn-block'><i class=\"glyphicon glyphicon-download-alt\"></i> Descargar</button>";
                    str +="<button id='btnAsignar' class='btn btn-primary btn-block' onClick='showReviser(" + row['articleid'] + ")'><i class=\"glyphicon glyphicon-check\"></i> Asignar Revisor</button>";//trash

                    str += "</div>"
                    return str;
                }

            }
        ]

    }); // fin de datatable ASIGNAR REVISOR

    $('#tbAssign tbody').on('click', '.btn-warning', function () {
        if (table2.row(this).child.isShown()) {
            var data = table2.row(this).data();
        } else {
            var data = table2.row($(this).closest('tr')).data();
        }
        window.location.href = '/Yuritec_Educare/upload/articles/'+data[Object.keys(data)[13]];
    });// DESCARGAR ARCHIVO TABLA ASIGNAR REVISOR

    $('#btnAsignarRev').on('click', function () {
        //setReview();
    });

    //---------------------------------------------------------ASIGNAR REVISOR----------------------------------------
    var tblEval =  $('#tbEvaluatedArticles').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/article/getArticlesByStatus/4",
            dataSrc:function(json){

                return json['msg'];
            }
        },
        columns:[
            {
                data:"articleid"
            },
            {
                data:"title"
            },
            {
                data:"articledate"
            }, {
                data:"status"
            },
            {
                data: function (row) {
                    str = "<div align='center'>";
                    str +="<button class='btn btn-warning btn-block'><i class=\"glyphicon glyphicon-download-alt\"></i> Descargar Evaluación</button>";
                    str +="<button id='btnCheck' class='btn btn-primary btn-block' onClick='showModalChangeStatus()'><i class=\"glyphicon glyphicon-check\"></i> Cambiar de estado</button>";
                    str += "</div>"
                    return str;
                }

            }
        ]
    });// fin datatable de REVISOR

    $('#tbReview tbody').on( 'click','.btn-warning',  function () {
        if (tblEval.row(this).child.isShown()) {
            var data = tblEval.row(this).data();
        } else {
            var data = tblEval.row($(this).closest('tr')).data();
        }
        window.location.href = '/Yuritec_Educare/upload/articles/'+data[Object.keys(data)[13]];

    });


});

function showReviser(articleid) {
    $('#articleid').val(articleid);
    $('#modalAssign').modal("show");
}
function showModalChangeStatus() {
    $('#modalChangeState').modal("show");
}





//-------------------------------------------------  ASIGNAR REVISOR-------------------------------------------------

function showReview() {
    $('#modalCheck').modal("show");
}

function setReview() {

   console.log("articleid: "+$('#articleid').val());
   console.log("status: "+$('#status').val());
   console.log("observations: "+$('#observations').val());

   var status = $('#status').val();
   var msgStatus;
    switch (status){
       case "Aprobado":
           msgStatus="aprobar"
           break;
       case "Aprobado con observaciones":
           msgStatus="aprobar con observaciones";
           break;
       case "No Aprobado":
           msgStatus ="no aprobar";
           break;
   }

    swal(
        {
            title: "Advertencia", text: "¿Estás seguro de "+msgStatus+" este artículo?",
            type: "warning", showCancelButton: true,
            confirmButtonColor: "#F5B041", confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar", closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {

                $.ajax(
                    {
                        url: "/Yuritec_Educare/article/setReview",
                        type: "post",
                        data: {
                            articleid: $('#articleid').val(),
                            status: $('#status').val(),
                            observations:$('#observations').val()}
                    }
                ).done(
                    function (data) {

                        if (data.code == 200) {

                            $.growl.notice({message: data.msg + " " + data.details});
                            swal("Agregado", "El artículo ha sido revisado correctamente", "success");
                            $('#tbReview').dataTable().api().ajax.reload();

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
                swal("Cancelado", "Acción Cancelada", "error");
            }
        });
}