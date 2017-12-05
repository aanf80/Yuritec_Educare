/**
 * Created by Armando_Navarro on 04/07/2017.
 */
$sitio = "Yuritec_Educare"
var $termid, $content;
$(function () {
    tinymce.init({
        selector: "#content",
        language : "es_MX",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
        ],
        toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | sizeselect | fontselect |  fontsizeselect | forecolor backcolor',
        //toolbar2: " | bold italic | ",
        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
        save_enablewhendirty: true
    });

    $.ajax({
        url: "/"+$sitio+"/settings/getTermsByID/2",
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){
                showTerms(row['termsid'],row['content']);
            });
    });

    $('#btnGuardarPoliticas').on('click', function () {
        updateTerms();
    });
});



function showTerms(termsid,content){
    $termid = termsid;
    tinyMCE.activeEditor.setContent(content);
}


function updateTerms() {
    $content = tinyMCE.activeEditor.getContent();
    $.ajax(
        {
            url: "/"+$sitio+"/settings/updateTerms" ,
            type: "post",
            data: {
                termsid: $termid,
                content: $content
            }
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