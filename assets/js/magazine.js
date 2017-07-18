/**
 * Created by Concurso18 on 23/06/2017.
 */

$cover = "";
$ID=0;
$articleid = 0;
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
    });//fin de combobox nueva revista



    $.ajax({
        url: '/Yuritec_Educare/magazine/getMagazines',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){
                $('<option></option>', {text: "Volumen "+row.volume+",  Número "+row.number+"   "+row.period+" "+row.year}).attr('value',row.magazineid).appendTo('#magazineid2');
            });
    });//fin de combobox editar revista

    $('#magazineid2').on('change', function() {
        $ID = this.value;
        if($ID == 0){
            cleanEditMagazine();
            $('#articleid2').html('');
        }
        else{
            $('#articleid2').html('');

            $.ajax({
                url: '/Yuritec_Educare/magazine/getMagazineByID/'+$ID,
                type: 'GET',
                dataType: 'json'
            }).done(function (json){

                if(json.code===200)
                    $.each(json.msg, function(i,row){
                        showMagazine(row['volume'],row['number'],row['period'],row['year'],row['cover']);
                    });
            });
        }
    });

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
    });//fin de datatable articulos para agregar

    $('#btnVerArticulos').on('click', function () {
        $.ajax({
            url: '/Yuritec_Educare/article/getArticlesByVolume/'+$('#magazineid2').val(),
            type: 'GET',
            dataType: 'json'
        }).done(function (json){

            if(json.code===200)
                $.each(json.msg, function(i,row){

                    $('<option></option>', {text: row.title}).attr('value',row.articleid).appendTo('#articleid2');

                });
        });//fin de combobox

        var idmagazine = $('#magazineid2').val();

        if( idmagazine == 0){
            $.growl.error({message: "No ha seleccionado alguna revista"});
        }
        else{
            $('#modalSelectedArticles').modal("show");
        }
    });

    $('#btnQuitarArticulos').on('click', function () {
        unsetMagazine();
    });

    $('#btnEliminarRevista').on('click', function () {
        deleteMagazine($('#magazineid2').val());
    });

    $('#btnEditarRevista').on('click', function () {
        updateMagazine();
    });




});

function showMagazine(volume,number,period,year,cover) {
    $('#volume2').val(volume);
    $('#number2').val(number);
    $('#period2').val(period);
    $('#year2').val(year);
    $cover = cover;
}


function cleanEditMagazine() {
    $('#volume2').val('');
    $('#number2').val('');
    $('#period2').val(0);
    $('#year2').val('');


}


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

function updateMagazine(){
    var idmagazine = $('#magazineid2').val();

    if( idmagazine == 0){
        $.growl.error({message: "No ha seleccionado alguna revista"});
    }
    else{
        $.ajax(
            {
                url: "/Yuritec_Educare/magazine/updateMagazine",
                type: "post",
                data: $('#frmEditMagazine').serialize()
            }
        ).done(
            function (data) {

                if (data.code == 200) {
                    $.growl.notice({message: data.msg});
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
}


function deleteMagazine(magazineid){
    if(magazineid == 0){
        $.growl.error({message: "No ha seleccionado alguna revista"});
    }
    else{
        swal(
            {
                title: "¿Estas seguro que deseas eliminar esta revista?", text: "",
                type: "warning", showCancelButton: true,
                confirmButtonColor: "#DD6B55", confirmButtonText: "Aceptar!",
                cancelButtonText: "Cancelar", closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {

                    $.ajax(
                        {
                            url: "/Yuritec_Educare/magazine/deleteMagazine",
                            type: "post",
                            data: {magazineid: magazineid}
                        }
                    ).done(
                        function (data) {
                            //alert("Se realizó correctamente "+data.code);
                            if (data.code == 200) {
                                //$.growl.notice({message: data.msg});
                                $.growl.notice({message: data.msg + " " + data.details});
                                swal("Eliminado!", "La revista se eliminó correctamente", "success");
                                location.reload();
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



}


//Operaiones de los artículos con las revistas

function setMagazine(articleid) {

    var revista = $('#magazineid option:selected').html();
    var status;

    status = "Publicar"

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

function unsetMagazine() {

        var revista = $('#magazineid2 option:selected').html();
        var status = "Aprobado";


        swal(
            {
                title: "Advertencia", text: "¿Estás seguro que deseas quitar este artículo a la revista "+revista+"?",
                type: "warning", showCancelButton: true,
                confirmButtonColor: "#FF0000", confirmButtonText: "Aceptar",
                cancelButtonText: "Cancelar", closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {

                    $.ajax(
                        {
                            url: "/Yuritec_Educare/article/unsetMagazine",
                            type: "post",
                            data: {articleid: $('#articleid2').val() , status: status}
                        }
                    ).done(
                        function (data) {

                            if (data.code == 200) {

                                $.growl.notice({message: data.msg + " " + data.details});
                                swal("Agregado", "Se ha quitado el artículo correctamente", "success");
                                $('#modalSelectedArticles').modal("toggle");
                                $('#articleid2').html('');

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