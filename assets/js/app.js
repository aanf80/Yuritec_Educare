/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {


    $('#nav a').on('click',function(e){

        e.preventDefault(); //CUANDO LE DE CLIC AL LINK HAGA LA ACCION DE IRSE A OTRA PAG.
        var page = $(this).attr('href');
        if (page === "#") {

        }else{
            $('#content').load(page);
            $('#nav li').removeClass('active');
            $(this).parent().addClass('active');
        }
    });

    $('#link a').on('click',function(e){

        e.preventDefault(); //CUANDO LE DE CLIC AL LINK HAGA LA ACCION DE IRSE A OTRA PAG.
        var page = $(this).attr('href');
        if (page === "#") {

        }else{
            $('#content').load(page);
           // $('#nav li').removeClass('active');
            //$(this).parent().addClass('active');
        }
    });



    $('#cerrar').on('click', function (e) {

        e.preventDefault();

                window.location="index.php";

        });
});
