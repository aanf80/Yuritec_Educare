
$(function(){

    $.ajax({
        url: '/Yuritec_Educare/settings/getCategories',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){

                $('<option></option>', {text: row.categoryname}).attr('value',row.categoryid).appendTo('#cbCategory');
            });
    });

});
