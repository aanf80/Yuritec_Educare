
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
        url: '/Yuritec_Educare/settings/getCategories',
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

    var table =  $('#tbArticle').DataTable({
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
            },
            {
                data:"status"
            },
            {
                data:"observations"
            }
        ]
    });//fin de datatable
});



function newArticle(){

    var msg;
    var form = $('form#frmArticle')[0];
    var data = new FormData(form);
    $.ajax({
        url: "/Yuritec_Educare/article/newArticle",
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
