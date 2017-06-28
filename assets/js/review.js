/**
 * Created by Concurso18 on 22/06/2017.
 */
$(function(){

    $.ajax({
        url: '/Yuritec_Educare/user/getUsers',
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
            url:"/Yuritec_Educare/article/getSendedArticles",
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
                    str +="<button id='btnEditar' class='btn btn-warning'><i class=\"glyphicon glyphicon-download-alt\"></i> Descargar</button>";
                    str +="&nbsp;<button id='btnCheck' class='btn btn-success' onClick='showReviewArea(" + row['articleid'] + ")'><i class=\"glyphicon glyphicon-check\"></i> Revisar Artículo</button>";//trash
                    str += "</div>"
                    return str;
                }

            }
        ]
    });// fin datatable

    $('#tbReview tbody').on( 'click','.btn-warning',  function () {
        if(table.row(this).child.isShown()){
            var data = table.row(this).data();
        }else{
            var data = table.row($(this).closest('tr')).data();
        }

        alert(data[Object.keys(data)[0]]+' s phone: '+data[Object.keys(data)[1]]);

    } );



    var table2 =  $('#tbAssign').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/article/getArticlesByID",
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
                    str +="<button id='btnAsignar' class='btn btn-success' onClick='showReviser(" + row['articleid'] + ")'><i class=\"glyphicon glyphicon-check\"></i> Asignar Revisor</button>";//trash
                    str +="&nbsp;<button id='btnDescargar' class='btn btn-warning'><i class=\"glyphicon glyphicon-download-alt\"></i> Descargar</button>";
                    str += "</div>"
                    return str;
                }

            }
        ]

    });
});

function showReviser(articleid) {
    $('#articleid').val(articleid);
    $('#modalAssign').modal("show");

}

function showReviewArea(articleid) {
    console.log("ID articulo: "+articleid);
    $('#articleid').val(articleid);
    $('#modalCheck').modal("show");

}