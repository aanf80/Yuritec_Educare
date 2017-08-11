/**
 * Created by Concurso18 on 08/06/2017.
 */


var $objectiveid, $content;
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
        url: '/Yuritec_Educare/settings/getObjectives',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){
                showObjectives(row['objectiveid'],row['objectivecontent']);

            });
    });

    $('#btnGuardarObj').on('click', function () {
        updateObjectives();
    });
});



function showObjectives(objectivesid,content){
    $objectiveid = objectivesid;
    tinyMCE.activeEditor.setContent(content);
}


function updateObjectives() {
    $content = tinyMCE.activeEditor.getContent();
    $.ajax(
        {
            url:"/Yuritec_Educare/settings/updateObjectives" ,
            type: "post",
            data: {
                objectiveid: $objectiveid,
                objectivecontent: $content
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