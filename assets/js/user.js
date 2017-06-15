/**
 * Created by Armando_Navarro on 11/04/2017.
 */

var info = [];
$(function () {

    $('#roleid').trigger('click');

    $.ajax({
        url: '/Yuritec_Educare/settings/getRoles',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){

                $('<option></option>', {text: row.rolename}).attr('value',row.roleid).appendTo('#roleid');
            });
    });

    $.ajax({
        url: '/Yuritec_Educare/settings/getRoles',
        type: 'GET',
        dataType: 'json'
    }).done(function (json){

        if(json.code===200)
            $.each(json.msg, function(i,row){

                $('<option></option>', {text: row.rolename}).attr('value',row.roleid).appendTo('#roleid2');
            });
    });

// FIN SECCION DE SELECTS

    $('#frmUser').validate({
        rules:{

            username:{
                required: true
            }
        },
        messages:{

            username: {
                minlength: "Introduzca al menos tres caracteres",
                maxlength: "Introdusca menos de 20 caracteres",
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
            newUser();
            return false;
        }
    });

    // FIN SECCION DE FORMULARIO

    $('#frmEditUser').validate({
        rules:{

            username:{
                required: true
            }
        },
        messages:{

            username: {
                minlength: "Introduzca al menos tres caracteres",
                maxlength: "Introdusca menos de 20 caracteres",
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
            updateUser();
            return false;
        }
    });

    $('#btnModificarUser').on('click', function () {

        $('#frmEditUser').submit();

    });

// FIN SECCION FORMULARIO MODAL

    var table = $('#tbUsers').DataTable({
        responsive: true,
        language:{
            url:"http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax:{
            url:"/Yuritec_Educare/user/getUsers",
            dataSrc:function(json){

                return json['msg'];
            }
        },
        columns:[
            {
                data:"userid"
            },
            {
                data:"username"
            },
            {
                data: function (row) {
                    str = "<div align = 'left'>"+ row['lastname']+" "+row['maternalsurname'];
                    str += "</div>";
                    return str;
                }
            },
            {
                data:"gender"
            },
            {
                data: function (row) {
                    str = "<div align = 'left'>"+ row['address']+" #"+row['streetnumber']+", "+row['neighborhood'];
                    //  str += accounting.formatMoney(row['roleid']);
                    str += "</div>";
                    return str;
                }
            },
            {
                data:"zipcode"
            },
            {
                data: function (row) {
                    str = "<div align = 'left'>"+row['city']+", "+row['state'];
                    str += "</div>";
                    return str;
                }
            },
            {
                data:"country"
            },
            {
                data:"email"
            }, {
                data:"password"
            },
            {
                data:"sign"
            },
            {
                data:"position"
            },
            {
                data:"institute"
            },
            {
                data:"roleid"
            },
            {
                data: function (row) {
                    $info = row;
                    str = "<div align='left'>";
                    str +="<button id='btnEditar' class='btn btn-success'><i class=\"glyphicon glyphicon-edit\"></i></button>";
                    str += "&nbsp;<button id='btnBorrar' class='btn btn-danger' onClick='deleteUser(" + row['userid'] + ")'><i class=\"glyphicon glyphicon-trash\"></i> </button>";//trash
                    str += "</div>"
                    return str;
                }

            }

        ]
    });


    $('#tbUsers tbody').on( 'click','.btn-success',  function () {
        if(table.row(this).child.isShown()){
            var data = table.row(this).data();
        }else{
            var data = table.row($(this).closest('tr')).data();
        }

        showUser(data[Object.keys(data)[0]],data[Object.keys(data)[1]],data[Object.keys(data)[2]],data[Object.keys(data)[3]],data[Object.keys(data)[8]],data[Object.keys(data)[15]],data[Object.keys(data)[20]],
            data[Object.keys(data)[17]],data[Object.keys(data)[21]],data[Object.keys(data)[19]],data[Object.keys(data)[18]],data[Object.keys(data)[16]],data[Object.keys(data)[5]],data[Object.keys(data)[4]],data[Object.keys(data)[10]],data[Object.keys(data)[6]],
            data[Object.keys(data)[7]],data[Object.keys(data)[9]],data[Object.keys(data)[12]],data[Object.keys(data)[11]],data[Object.keys(data)[22]])

    } );


// FIN SECCION DATATABLE



});

function newUser(){
    $.ajax({
        url: "/Yuritec_Educare/user/newUser",
        type: "post",
        data: $('#frmUser').serialize()
    }).done(
        function(data){

            if(data.code === 200){
                $.growl.notice({ message: data.msg });
                $('#username').val('');
                $('#lastname').val('');
                $('#maternalsurname').val('');
                $('#password').val('');
                $('#email').val('');
                $('#position').val('');
                $('#institute').val('');
                $('#initials').val('');
                $('#sign').val('');
                $('#bio').val('');
                $('#photo').val('');
                $('#address').val('');
                $('#neighborhood').val('');
                $('#state').val('');
                $('#city').val('');
                $('#streetnumber').val('');
                $('#zipcode').val('');
                $('#roleid').index(0);
                $('#country').index(0);

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

function showUser(userid, username, lastname, maternalsurname,gender,address,streetnumber,neighborhood,zipcode,
                  city,state,country,email,password,sign,position,institute,initials,roleid,photo,bio) {
    console.log("bio "+bio);

    $('#userid').val(userid);
    $('#username2').val(username);
    $('#lastname2').val(lastname);
    $('#maternalsurname2').val(maternalsurname);
    $('#streetnumber2').val(streetnumber);
    $('#zipcode2').val(zipcode);
    $('#city2').val(city);
    $('#state2').val(state);
    $('#country2').val(country);
    $('#photo2').val(photo);
    $('#email2').val(email);
    $('#password2').val(password);
    $('#sign2').val(sign);
    $('#bio2').val(bio);
    $('#position2').val(position);
    $('#institute2').val(institute);
    $('#initials2').val(initials);
    $('#gender2').val(gender);
    $('#roleid2').val(roleid);
    $('#address2').val(address);
    $('#neighborhood2').val(neighborhood);
    $('#modalUser').modal("show");

}

function updateUser() {

    $.ajax(
        {
            url:"/Yuritec_Educare/user/updateUser" ,
            type: "post",
            data: $('#frmEditUser').serialize()
        }
    ).done(
        function (data) {

            if (data.code == 200) {
                $.growl.notice({message: data.msg});
                $('#tbUsers').dataTable().api().ajax.reload();
                $('#modalUser').modal("toggle");
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

function deleteUser(userid) {

    swal(
        {
            title: "¿Estas seguro que deseas eliminar este registro?", text: "",
            type: "warning", showCancelButton: true,
            confirmButtonColor: "#DD6B55", confirmButtonText: "Aceptar!",
            cancelButtonText: "Cancelar", closeOnConfirm: false,
            closeOnCancel: false
        }, function (isConfirm) {
            if (isConfirm) {

                var para = {
                    "userid": userid
                };
                ///Comienza a Borrar
                $.ajax(
                    {
                        url: "/Yuritec_Educare/user/deleteUser",
                        type: "post",
                        data: {userid: userid}
                    }
                ).done(
                    function (data) {
                        //alert("Se realizó correctamente "+data.code);
                        if (data.code == 200) {
                            //$.growl.notice({message: data.msg});
                            $.growl.notice({message: data.msg + " " + data.details});
                            swal("Eliminado!", "El registro se elimino correctamente", "success");
                            $('#tbUsers').dataTable().api().ajax.reload();
                            $('#userid').val('');
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