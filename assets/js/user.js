/**
 * Created by Armando_Navarro on 11/04/2017.
 */
$sitio = "/Yuritec_Educare"
var info = [];
$(function () {

    $('#roleid').trigger('click');

    $.ajax({
        url: $sitio+"/settings/getRoles",
        type: 'GET',
        dataType: 'json'
    }).done(function (json) {

        if (json.code === 200)
            $.each(json.msg, function (i, row) {

                $('<option></option>', {text: row.rolename}).attr('value', row.roleid).appendTo('#roleid');
            });
    });

    $.ajax({
        url: $sitio+"/settings/getRoles",
        type: 'GET',
        dataType: 'json'
    }).done(function (json) {

        if (json.code === 200)
            $.each(json.msg, function (i, row) {

                $('<option></option>', {text: row.rolename}).attr('value', row.roleid).appendTo('#roleid2');
            });
    });

// FIN SECCION DE SELECTS

    $('#frmUser').validate({
        rules:{

            username:{
                required: true
            },
            email:{
                required: true,
                email:true
            },
            lastname:{
                required: true
            },
            institute:{
                required: true
            },
            password:{
                required: true,
                minlength: 5
            },
            confpassword:{
                required: true,
                minlength: 5,
                equalTo: '#password'
            },
            streetnumber:{
                digits: true
            },
            zipcode:{
                digits: true
            },
            photo:{
                required: true
            }
        },
        messages:{

            username: {
                minlength: "Introduzca al menos tres caracteres",
                maxlength: "Introduzca máximo 20 caracteres",
                required: "Capture su nombre"
            },
            lastname: {
                minlength: "Introduzca al menos tres caracteres",
                maxlength: "Introduzca máximo 20 caracteres",
                required: "Capture su apellido paterno"
            },
            email:{
                required: "Capture su correo electrónico",
                email: "Formato de correo electrónico incorrecto"
            },
            password:{
                required: "Capture su contraseña",
                minlength: "Introduzca mínimo 5 caracteres"
            },
            institute:{
                required: "Capture su institución de procedencia"
            },
            confpassword:{
                required: "Confirme su contraseña",
                minlength: "Introduzca mínimo 5 caracteres",
                equalTo: "Las contraseñas no coinciden"
            },
            streetnumber:{
                digits: "Introduzca sólo números"
            },
            zipcode:{
                digits: "Introduzca sólo números"
            },
            photo:{
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
        submitHandler: function (form) {
            newUser();
            return false;
        }
    });

    // FIN SECCION DE FORMULARIO

    $('#frmEditUser').validate({
        rules:{

            username:{
                required: true
            },
            email:{
                required: true,
                email:true
            },
            lastname:{
                required: true
            },
            institute:{
                required: true
            },
            password:{
                required: true,
                minlength: 5
            },
            confpassword:{
                required: true,
                minlength: 5,
                equalTo: '#password2'
            },
            streetnumber:{
                digits: true
            },
            zipcode:{
                digits: true
            },
            photo:{
                required: true
            }
        },
        messages:{

            username: {
                minlength: "Introduzca al menos tres caracteres",
                maxlength: "Introduzca máximo 20 caracteres",
                required: "Capture su nombre"
            },
            lastname: {
                minlength: "Introduzca al menos tres caracteres",
                maxlength: "Introduzca máximo 20 caracteres",
                required: "Capture su apellido paterno"
            },
            email:{
                required: "Capture su correo electrónico",
                email: "Formato de correo electrónico incorrecto"
            },
            password:{
                required: "Capture su contraseña",
                minlength: "Introduzca mínimo 5 caracteres"
            },
            institute:{
                required: "Capture su institución de procedencia"
            },
            confpassword:{
                required: "Confirme su contraseña",
                minlength: "Introduzca mínimo 5 caracteres",
                equalTo: "Las contraseñas no coinciden"
            },
            streetnumber:{
                digits: "Introduzca sólo números"
            },
            zipcode:{
                digits: "Introduzca sólo números"
            },
            photo:{
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
        submitHandler: function (form) {
           updateUser();
           return false;
        }
    });


    $('#frmChangepassword').validate({
        rules:{
            password:{
                required: true,
                minlength: 5
            },
            confpassword:{
                required: true,
                minlength: 5,
                equalTo: '#password'
            }
        },
        messages:{

            password:{
                required: "Capture su contraseña",
                minlength: "Introduzca mínimo 5 caracteres"
            },
            confpassword:{
                required: "Confirme su contraseña",
                minlength: "Introduzca mínimo 5 caracteres",
                equalTo: "Las contraseñas no coinciden"
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
        submitHandler: function (form) {
            changepassword();
            return false;
        }
    });

    $('#btnModificarUser').on('click', function () {

        $('#frmEditUser').submit();

    });

    $('#btnCambiarFotoUsuario').on('click', function () {

        $('#frmChangeUserPhoto').submit();

    });

    $('#btnForPass').on('click', function () {
                forgottenPassword();
    });

    $('#frmChangeUserPhoto').validate({
        rules:{
            photo:{
                required: true
            }
        },
        messages:{
            photo:{
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
    });//FIN DE FORMULARIO DE NUEVO MIEMBRO





// FIN SECCION FORMULARIO MODAL

    var table = $('#tbUsers').DataTable({
        responsive: true,
        language: {
            url: "http://cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        },
        ajax: {
            url: $sitio+"/user/getUsers",
            dataSrc: function (json) {

                return json['msg'];
            }
        },
        columns: [
            {
                data: "userid"
            },
            {
                data: "username"
            },
            {
                data: function (row) {
                    str = "<div align = 'left'>" + row['lastname'] + " " + row['maternalsurname'];
                    str += "</div>";
                    return str;
                }
            },
            {
                data: "gender"
            },
            {
                data: function (row) {
                    str = "<div align = 'left'>" + row['address'] + " #" + row['streetnumber'] + ", " + row['neighborhood'];
                    //  str += accounting.formatMoney(row['roleid']);
                    str += "</div>";
                    return str;
                }
            },
            {
                data: "zipcode"
            },
            {
                data: function (row) {
                    str = "<div align = 'left'>" + row['city'] + ", " + row['state'];
                    str += "</div>";
                    return str;
                }
            },
            {
                data: "country"
            },
            {
                data: "email"
            }, {
                data: "password"
            },
            {
                data: "sign"
            },
            {
                data: "institute"
            },
            {
                data: "roleid"
            },
            {
                data: function (row) {
                    $info = row;
                    str = "<div align='left'>";
                    str += "<button id='btnEditar' class='btn btn-success'><i class=\"glyphicon glyphicon-edit\"></i></button>";
                    str += "&nbsp;<button id='btnBorrar' class='btn btn-danger' onClick='deleteUser(" + row['userid'] + ")'><i class=\"glyphicon glyphicon-trash\"></i> </button>";//trash
                    str += "&nbsp;<button  class='btn btn-warning' onClick='showEditPhoto(" + row['userid'] + ")'><i class=\"glyphicon glyphicon-camera\"></i> </button>";//trash
                    str += "</div>"
                    return str;
                }

            }

        ]
    });


    $('#tbUsers tbody').on('click', '.btn-success', function () {
        if (table.row(this).child.isShown()) {
            var data = table.row(this).data();
        } else {
            var data = table.row($(this).closest('tr')).data();
        }

        showUser(data[Object.keys(data)[0]], data[Object.keys(data)[1]], data[Object.keys(data)[2]], data[Object.keys(data)[3]], data[Object.keys(data)[8]], data[Object.keys(data)[15]], data[Object.keys(data)[20]],
            data[Object.keys(data)[17]], data[Object.keys(data)[21]], data[Object.keys(data)[19]], data[Object.keys(data)[18]], data[Object.keys(data)[16]], data[Object.keys(data)[5]], data[Object.keys(data)[4]], data[Object.keys(data)[10]], data[Object.keys(data)[6]],
            data[Object.keys(data)[7]], data[Object.keys(data)[9]], data[Object.keys(data)[12]], data[Object.keys(data)[11]], data[Object.keys(data)[22]],data[Object.keys(data)[13]],data[Object.keys(data)[14]])

    });


// FIN SECCION DATATABLE


});

function newUser() {
    $.ajax({
        url: $sitio+"/user/newUser",
        type: "post",
        data: $('#frmUser').serialize()
    }).done(
        function (data) {

            if (data.code === 200) {
                $.growl.notice({message: data.msg});
                $('#username').val('');
                $('#lastname').val('');
                $('#maternalsurname').val('');
                $('#password').val('');
                $('#confpassword').val('');
                $('#email').val('');
                $('#position').val('');
                $('#institute').val('');
                $('#initials').val('');
                $('#sign').val('');
                $('#bio').val('');
                $('#address').val('');
                $('#neighborhood').val('');
                $('#state').val('');
                $('#city').val('');
                $('#streetnumber').val('');
                $('#zipcode').val('');
                $('#roleid').index(0);
                $('#country').index(0);

            }
            else {
                $.growl.error({message: data.msg});

            }

        }
    ).fail(
        function () {
            $.growl.error({message: "No se pudo conectar al servidor"});
        }
    );
}

function showEditPhoto(userid) {
    $('#userid2').val(userid);
    $('#modalImageUser').modal("show");
}

function showUser(userid, username, lastname, maternalsurname, gender, address, streetnumber, neighborhood, zipcode,
                  city, state, country, email, password, sign, position, institute, initials, roleid, photo, bio, status, date) {
    $('#userid').val(userid);
    $('#status').val(status);
    $('#registerdate').val(date);
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
    $('#confpassword2').val(password);
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

function forgottenPassword() {
    
        $.ajax(
            {
                url: $sitio+"/user/password_request",
                type: "post",
                data: {
                    email : $('#email').val()
                }
            }
        ).done(
            function (data) {
    
                if (data.code == 200) {
                    //title: 'Solicitud Exitosa',
                    //text: "Se ha enviado por correo el enlace para realizar el restablecimiento de contraseña",
                    swal(
                        {
                            title: 'Solicitud Exitosa',
                            text: "Se ha enviado por correo el enlace para restablecer contraseña",
                            type: "success",
                            confirmButtonColor: "#f58220", confirmButtonText: "Aceptar",                           
                        }, function (isConfirm) {
                            if (isConfirm) {
                                var url = "/login";
                                $(location).attr('href',url);                        
                            } 
                        });
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

    function changepassword(){
      
        $.ajax(
            {
                url: $sitio+"/user/changePassword",
                type: "post",
                data: {
                    password : $('#password').val(),
                    key: $('#key').val()
               }
            }
        ).done(
            function (data) {
    
                if (data.code == 200) {
                    var url = "/home";
                    $(location).attr('href',url);

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

function updateUser() {

    $.ajax(
        {
            url: $sitio+"/user/updateUser",
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

function changePhoto() {

    var form = $('form#frmChangeUserPhoto')[0];
    var data = new FormData(form);

    $.ajax({
        url: $sitio+"/user/changeUserPhoto",
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
                $('#tbUsers').dataTable().api().ajax.reload();
                $('#modalImageUser').modal("toggle");

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

                $.ajax(
                    {
                        url: $sitio+"/user/deleteUser",
                        type: "post",
                        data: {userid: userid}
                    }
                ).done(
                    function (data) {
                        //alert("Se realizó correctamente "+data.code);
                        if (data.code == 200) {
                            //$.growl.notice({message: data.msg});
                            $.growl.notice({message: data.msg + " " + data.details});
                            swal("Eliminado!", "El registro se eliminó correctamente", "success");
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