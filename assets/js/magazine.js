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

    $('#frmMagazine').validate({
        rules: {

            volume: {
                required: true
            },
            number: {
                required: true
            }
        },
        messages: {

            volume: {
                required: "Capture el volumen"
            },
            number: {
                required: "Capture el número"
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
            newMagazine();
            return false;
        }
    });







    var table =  $('#tbArticles').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/article/getArticlesByStatus/3",
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
                    str +="<button id='btnEditar' class='btn btn-warning' onClick='setMagazine(" + row['articleid']  + ")'><i class=\"glyphicon glyphicon-plus-sign\"></i> Agregar</button>";
                    str += "</div>"
                    return str;
                }

            }
        ]
    });//fin de datatable
});

function newMagazine(){
    var form = $('form#frmMagazine')[0];
    var data = new FormData(form);

    $.ajax({
        url: "/Yuritec_Educare/magazine/newMagazine",
        type: "post",
        data: data,
        cache: false,
        contentType: false,
        processData: false

    }).done(
        function(data){


            if(data.code === 200){
                $.growl.notice({ message: "Guardado Exitosamente" });
                $('#volume').val('');
                $('#number').val('');
                $('#year').val('');

            }
            else{
                $.growl.error({ message: data.msg });

            }

        }
    ).fail(
        function(){
            $.growl.error({ message: msg });
        }
    );
}

function setMagazine(articleid) {

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
                        data: {articleid: articleid, magazineid: $('#magazineid').val(), status: status}
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