
$(function(){

    tinymce.init({
        selector: "textarea",
        file_browser_callback : "fileBrowserCallBack",
        language : "es_MX",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste  "
        ],
        toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | sizeselect | fontselect |  fontsizeselect ',
        //toolbar2: " | bold italic | ",
        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
        save_enablewhendirty: true
    });//fin de editor

    $.ajax({
        url: '/settings/getCategories',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){

                $('<option></option>', {text: row.categoryname}).attr('value',row.categoryid).appendTo('#categoryid');
            });
    });//fin de combobox

    $('#frmArticle').validate({
        rules:{

            title:{
                required: true
            } ,
            file: {
                required: true,
                extension: "doc|docx"
            }
        },
        messages:{

            title: {

                required: "Capture el nombre de usuario"
            },
            file:{
                required: "No ha seleccionado algún archivo",
                extension: "Los tipos válidos son .doc y .docx"
            }
        },
        highlight: function (element){
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element){
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element){
            if(element.parent('.input-group').length){
                error.insertAfter(element.parent());
            }else{
                error.insertAfter(element);
            }
        },
        submitHandler: function(form){
            newArticle();
            return false;
        }
    });//fin de formulario

    var table =  $('#tbMyArticle').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/article/getArticlesByUser",
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
            },
            {
                data:"status"
            },
            {
                data:"observations"
            },
            {
                data: function (row) {
                    str = "<div align='center'>";
                    if(row['status']=="Aprobado con observaciones"){
                        str +="<button id='btnCheck' class='btn btn-warning btn-block' onClick='showModalUploadArt(" + row['articleid']  + ")'><i class=\"glyphicon glyphicon-upload\"></i> Subir Artículo</button>";
                    }else{
                        str = "<p>No hay operaciones que mostrar</p>";
                    }

                    str += "</div>"
                    return str;
                }

            }
        ]
    });//fin de datatable

    $('#btnCoautor').on('click', function () {
        $('#modalCoautor').modal("show");
    });

    $('#btnUploadCorrectedFile').on('click', function () {
        uploadCorrectedFile();
    });


});

function showModalUploadArt(articleid) {
    $('#articleid2').val(articleid);
    $('#modalUploadArt').modal("show");
}

function uploadCorrectedFile() {
    var form = $('form#frmUploadArt')[0];
    var data = new FormData(form);
    $.ajax({
        url: "/article/changeArticle",
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
                $('#modalUploadArt').modal("toggle");
                $('#tbMyArticle').dataTable().api().ajax.reload();
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

function newArticle(){

    var msg;
    var form = $('form#frmArticle')[0];
    var data = new FormData(form);
    $.ajax({
        url: "/article/newArticle",
        type: "post",
        data: data,
        cache: false,
        contentType: false,
        processData: false
    }).done(
        function(data){

            if(data.code === 200){
                $.growl.notice({ message: "Guardado Exitosamente" });

            }
            else{
                $.growl.error({ message: data.msg });

            }

        }
    ).fail(
        function(){
            $.growl.error({ message: "Verifique que haya llenado correctamente los campos"});
        }
    );
}
