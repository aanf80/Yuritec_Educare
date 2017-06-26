/**
 * Created by Concurso18 on 23/06/2017.
 */


$(function(){

    $.ajax({
        url: '/Yuritec_Educare/magazine/getMagazines',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){

                $('<option></option>', {text: "Volumen "+row.volume+",  Número "+row.number+"   "+row.period+" "+row.year}).attr('value',row.magazineid).appendTo('#magazineid');
            });
    });//fin de combobox


    var table =  $('#tbArticles').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/article/getApprovedArticles",
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
                    str +="<button id='btnEditar' class='btn btn-warning' onClick='setMagazine(" + row['articleid'] + ",\"" + $('#magazineid').val() + "\")'><i class=\"glyphicon glyphicon-plus-sign\"></i> Agregar</button>";
                    str += "</div>"
                    return str;
                }

            }
        ]
    });//fin de datatable
});


function setMagazine(articleid,magazineid) {
    var revista = $('#magazineid option:selected').html();
    var status;
    if(magazineid == 0){
        status = "Aprobado"
    }
    else{
        status = "Publicar"
    }

    swal(
        {
            title: "Advertencia", text: "¿Estás seguro que deseas agregar este artículo a la revista "+revista+"?",
            type: "warning", showCancelButton: true,
            confirmButtonColor: "#F5B041", confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar", closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {

                $.ajax(
                    {
                        url: "/Yuritec_Educare/article/setMagazine",
                        type: "post",
                        data: {articleid: articleid, magazineid: magazineid, status: status}
                    }
                ).done(
                    function (data) {

                        if (data.code == 200) {

                            $.growl.notice({message: data.msg + " " + data.details});
                            swal("Agregado", "El registro se agregó correctamente", "success");
                            $('#tbArticles').dataTable().api().ajax.reload();

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