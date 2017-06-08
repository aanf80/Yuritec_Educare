/**
 * Created by Concurso18 on 08/06/2017.
 */
var $termid;
$(function () {
    tinymce.init({
        selector: "#content",
        language : "es_MX",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
        ],
        save_enablewhendirty: true
    });

    $.ajax({
        url: '/Yuritec_Educare/settings/getTerms',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){
                showTerms(row['termsid'],row['content']);
            });
    });

    $('#btnGuardarPoliticas').on('click', function () {
console.log("Politicas acutalizadas");
    });
});



function showTerms(termsid,content){
$termid = termsid;
tinyMCE.activeEditor.setContent(content);
//$('#content').val(content);

}


function updateTerms() {

    $.ajax(
        {
            url:"/Yuritec_Educare/settings/updateTerms" ,
            type: "post",
            data: {
                termsid: $termid,
                content: $('#content').val()
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