/**
 * Created by Concurso18 on 23/06/2017.
 */

$ID=0;
$ID2=0;
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
                        showMagazine(row['volume'],row['number'],row['period'],row['year'],row['cover'],row['status']);
                    });
            });
        }
    }); // EDITAR REVISTA


    $('#magazineid5').on('change', function() {
        $ID2 = this.value;
        if($ID2 == 0){
            $('#articleid3').html('<option value = 0 >Seleccione un artículo</option>');
            cleanContent();
        }
        else{
            $('#articleid3').html('<option value = 0>Seleccione un artículo</option>');
            $.ajax({
                url: '/Yuritec_Educare/article/getArticlesByVolume/'+$ID2,
                type: 'GET',
                dataType: 'json'
            }).done(function (json){

                if(json.code===200)
                    $.each(json.msg, function(i,row){
                        $('<option></option>', {text: row.title}).attr('value',row.articleid).appendTo('#articleid3');
                    });
            });//fin de combobox




        }
    }); // EDITAR REVISTA

    $('#articleid3').on('change', function() {
        cleanContent();
        $.ajax({
            url: '/Yuritec_Educare/article/getArticlesByID/'+this.value,
            type: 'GET',
            dataType: 'json'
        }).done(function (json){

            if(json.code===200)
                $.each(json.msg, function(i,row){

                    showContent(row['articleid'],row['content']);

                });
        });//fin de combobox
    });

    $.ajax({
        url: '/Yuritec_Educare/magazine/getMagazines',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){
                $('<option></option>', {text: "Volumen "+row.volume+",  Número "+row.number+"   "+row.period+" "+row.year}).attr('value',row.magazineid).appendTo('#magazineid5');
            });
    });//fin de combobox nueva revista

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

    $('#frmChangeCoverPhoto').validate({
        rules:{
            cover:{
                required: true
            }
        },
        messages:{
            cover:{
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
            changePhoto();
            return false;
        }
    });//FIN DE FORMULARIO DE NUEVO MIEMBRO$

    $('#frmChangePDF').validate({
        rules:{
            file:{
                required: true,
                extension: "pdf"
            }
        },
        messages:{
            file:{
                required: "Necesita seleccionar un archivo PDF",
                extension: "Sólo se aceptan archivos PDF"
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
            changePDF();

            return false;
        }
    });//FIN DE FORMULARIO DE NUEVO MIEMBRO

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
            url: '/Yuritec_Educare/article/getArticlesByVolume/'+$ID,
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
            $('#magazineid2').focus();
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
    $('#btnChangeCoverPhoto').on('click', function () {
        showCoverPhoto($('#magazineid2').val());
    });
    $('#btnChangePDF').on('click', function () {
        showPDFFILE($('#magazineid2').val());
    });
    $('#btnUploadCover').on('click', function () {
        $('#frmChangeCoverPhoto').submit();
    });
    $('#btnGuardarContenido').on('click', function () {
   updateContent(tinymce.activeEditor.getContent(),$('#articleid3').val());
    });

    $('#btnUploadPDF').on('click', function () {
        $('#frmChangePDF').submit();
    });
});
function showContent(articlesid,content){
    $objectiveid = articlesid;
    tinyMCE.activeEditor.setContent(content);
}

function showMagazine(volume,number,period,year,cover,status) {
    $('#volume2').val(volume);
    $('#number2').val(number);
    $('#period2').val(period);
    $('#year2').val(year);
    $('#status2').val(status);
    $('#imgCover').attr("src","/Yuritec_Educare/assets/images/"+cover);
}

function showCoverPhoto(magazineid){
    var idmagazine = $('#magazineid2').val();

    if( idmagazine == 0){
        $.growl.error({message: "No ha seleccionado alguna revista"});
        $('#magazineid2').focus();
    }
    else{
        $('#magazineid3').val(magazineid);
        $('#modalImageCover').modal("show");
        $('#magazineid2').focus();
    }

}

function showPDFFILE(magazineid){
    var idmagazine = $('#magazineid2').val();

    if( idmagazine == 0){
        $.growl.error({message: "No ha seleccionado alguna revista"});
        $('#magazineid2').focus();
    }
    else {
        $('#magazineid4').val(magazineid);
        $('#modalUploadPDF').modal("show");
    }
}

function cleanEditMagazine() {
    $('#volume2').val('');
    $('#number2').val('');
    $('#period2').val(0);
    $('#year2').val('');
    $('#imgCover').attr("src","");
}

function cleanContent() {
    tinyMCE.activeEditor.setContent("");
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
function updateContent(content,articleid){

    $.ajax(
        {
            url: "/Yuritec_Educare/article/updateContent",
            type: "post",
            data: {
                articleid: articleid,
                content: content
            }
        }
    ).done(
        function (data) {

            if (data.code == 200) {
                $.growl.notice({message: data.msg});
                cleanContent();
                $('#magazineid5').val(0);
                $('#articleid3').val(0);
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
function updateMagazine(){
    var idmagazine = $('#magazineid2').val();

    if( idmagazine == 0){
        $.growl.error({message: "No ha seleccionado alguna revista"});
        $('#magazineid2').focus();
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
                    location.reload();
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


function changePhoto() {

    var form = $('form#frmChangeCoverPhoto')[0];
    var data = new FormData(form);

    $.ajax({
        url: "/Yuritec_Educare/magazine/changeCoverPhoto",
        type: "post",
        data: data,
        cache: false,
        contentType: false,
        processData: false

    }).done(
        function(data){
            console.log(data.code);
            if(data.code === 200){
                $.growl.notice({message: data.msg});
                $('#modalImageCover').modal("toggle");
                location.reload();

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
function changePDF() {

    var form = $('form#frmChangePDF')[0];
    var data = new FormData(form);

    $.ajax({
        url: "/Yuritec_Educare/magazine/changePDF",
        type: "post",
        data: data,
        cache: false,
        contentType: false,
        processData: false

    }).done(
        function(data){
            console.log(data.code);
            if(data.code === 200){
                $('#modalUploadPDF').modal("toggle");
                $.growl.notice({message: data.msg});
                location.reload();

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

function deleteMagazine(magazineid){
    if(magazineid == 0){
        $.growl.error({message: "No ha seleccionado alguna revista"});
        $('#magazineid2').focus();
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

                            if (data.code == 200) {
                                //    $.growl.notice({message: data.msg});
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