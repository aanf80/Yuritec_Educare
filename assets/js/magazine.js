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

                $('<option></option>', {text: "Volumen "+row.volume+"  Número "+row.number+"   "+row.period+" "+row.year}).attr('value',row.categoryid).appendTo('#magazineid');
            });
    });//fin de combobox


    var table =  $('#tbArticles').DataTable({
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
                    str +="<button id='btnEditar' class='btn btn-warning'><i class=\"glyphicon glyphicon-plus-sign\"></i> Agregar</button>";
                    str += "</div>"
                    return str;
                }

            }
        ]
    });//fin de datatable
});
