
$(function(){

    tinymce.init({
        selector: "textarea",
        file_browser_callback : "fileBrowserCallBack",
        language : "es_MX",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste FMathEditor "
        ],
        toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | sizeselect | fontselect |  fontsizeselect | FMathEditor',
        //toolbar2: " | bold italic | ",
        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
        save_enablewhendirty: true
    });
    $.ajax({
        url: '/Yuritec_Educare/settings/getCategories',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){

                $('<option></option>', {text: row.categoryname}).attr('value',row.categoryid).appendTo('#categoryid');
            });
    });

    $('#frmArticle').validate({
        rules:{

            title:{
                required: true
            }
        },
        messages:{

            title: {

                required: "Capture el nombre de usuario"
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
    });

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
            }, {
                data:"status"
            },
            {
                data:"cover"
            },
            {
                data: function (row) {
                    $status = row;
                    str = "<div >";
                    switch (row['status']) {
                        case  "En edición":
                            str +="<button id='btnEditar' class='btn btn-success'><i class=\"glyphicon glyphicon-edit\"></i></button>";
                            str += "&nbsp;<button id='btnBorrar' class='btn btn-danger' onClick='deleteCategory(" + row['categoryid'] + ")'><i class=\"glyphicon glyphicon-trash\"></i></button>";//trash
                            break;
                        case "Aprobado con observaciones":
                            str +="<button id='btnEditar' class='btn btn-success'><i class=\"glyphicon glyphicon-edit\"></i></button>";
                            str += "&nbsp;<button id='btnBorrar' class='btn btn-danger' disabled='true'><i class=\"glyphicon glyphicon-trash\"></i></button>";//trash
                            break;
                        default:
                            str += "<button id='btnEditar' class='btn btn-success' disabled='true'><i class=\"glyphicon glyphicon-edit\"></i></button>";
                            str += "&nbsp;<button id='btnBorrar' class='btn btn-danger' disabled='true'><i class=\"glyphicon glyphicon-trash\"></i></button>";//trash
                    }
                    str += "</div>"
                    return str;

                }
            }

        ]
    });

    $('#tbArticle tbody').on( 'click','.btn-success',  function () {
        if(table.row(this).child.isShown()){
            var data = table.row(this).data();
        }else{
            var data = table.row($(this).closest('tr')).data();
        }

        alert(data[Object.keys(data)[0]]+' s phone: '+data[Object.keys(data)[1]]);

    } );



});



function newArticle(){
    $.ajax({
        url: "/Yuritec_Educare/article/newArticle",
        type: "post",
        data: $('#frmArticle').serialize()
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
            $.growl.error({ message: "No hay mensaje que mostrar" });
        }
    );
}
