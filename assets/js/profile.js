/**
 * Created by Concurso18 on 16/05/2017.
 */
var $roleid, $userid, $registerdate;
$(function () {

    $('#frmEditProfile').validate({
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
            updateProfile();
            return false;
        }
    });

    $('#btnModificarProfile').on('click', function () {

        $('#frmEditProfile').submit();

    });




    $('#btnEditarProfile').on('click', function () {
        $.ajax({
            url: '/Yuritec_Educare/user/getUserById',
            type: 'GET',
            dataType: 'json'
        }).done(function (json){

            if(json.code===200)
                $.each(json.msg, function(i,row){
                    showProfile(row['userid'],row['username'],row['lastname'],row['maternalsurname'],row['gender'],row['address'],row['streetnumber'],
                        row['neighborhood'],row['zipcode'],row['city'],row['state'],row['country'],row['email'],row['password'],row['sign'],row['position'],
                        row['institute'],row['initials'],row['photo'],row['roleid'],row['bio'])

                });
        });

    });


});


function showProfile(userid, username, lastname, maternalsurname,gender,address,streetnumber,neighborhood,zipcode,
                     city,state,country,email,password,sign,position,institute,initials,photo,roleid,bio) {
    console.log("bio "+bio);


    $userid = userid;
    $('#username2').val(username);
    $('#lastname2').val(lastname);
    $('#gender2').val(gender);
    $('#maternalsurname2').val(maternalsurname);
    $('#streetnumber2').val(streetnumber);
    $('#zipcode2').val(zipcode);
    $('#city2').val(city);
    $('#state2').val(state);
    $('#country2').val(country);
    $('#photo2').val(photo);
    $('#bio2').val(bio);
    $('#email2').val(email);
    $('#password2').val(password);
    $('#sign2').val(sign);
    $('#position2').val(position);
    $('#institute2').val(institute);
    $('#initials2').val(initials);
    $('#address2').val(address);
    $('#neighborhood2').val(neighborhood);
    $roleid = roleid;

    $('#modalProfile').modal("show");
}
function updateProfile() {

    $.ajax(
        {
            url:"/Yuritec_Educare/user/updateUser" ,
            type: "post",
            data: /*$('#frmEditProfile').serialize()*/
                {
                    userid: $userid,
                    username : $('#username2').val(),
                    lastname: $('#lastname2').val(),
                    maternalsurname: $('#maternalsurname2').val(),
                    gender: $('#gender2').val(),
                    email: $('#email2').val(),
                    password: $('#password2').val(),
                    sign: $('#sign2').val(),
                    position: $('#position2').val(),
                    institute: $('#institute2').val(),
                    initials: $('#initials2').val(),
                    bio: $('#bio2').val(),
                    photo: $('#photo2').val(),
                    address: $('#address2').val(),
                    streetnumber: $('#streetnumber2').val(),
                    neighborhood: $('#neighborhood2').val(),
                    zipcode: $('#zipcode2').val(),
                    city: $('#city2').val(),
                    state: $('#state2').val(),
                    country: $('#country2').val(),
                    roleid: $roleid
                }
        }
    ).done(
        function (data) {

            if (data.code == 200) {

                var url = "/Yuritec_Educare/home";
                $(location).attr('href',url);

                $.growl.notice({message: data.msg});

                $('#modalProfile').modal("toggle");


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