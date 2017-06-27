/**
 * Created by Concurso18 on 22/06/2017.
 */
$(function(){
    var table =  $('#tbReview').DataTable({
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
                    str +="<button id='btnEditar' class='btn btn-warning'><i class=\"glyphicon glyphicon-download-alt\"></i> Descargar</button>";
                    str +="&nbsp;<button id='btnEditar' class='btn btn-success'><i class=\"glyphicon glyphicon-check\"></i> Revisar</button>";
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
                    str +="<button id='btnEditar' class='btn btn-warning'><i class=\"glyphicon glyphicon-download-alt\"></i> Descargar</button>";
                    str +="&nbsp;<button id='btnEditar' class='btn btn-success'><i class=\"glyphicon glyphicon-check\"></i> Asignar Revisor</button>";
                    str += "</div>"
                    return str;
                }

            }
        ]

    });
});