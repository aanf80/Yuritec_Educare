<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 03/04/2017
 * Time: 10:30 AM
 */
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/profile.js'); ?>"></script>
<div class="container" xmlns="http://www.w3.org/1999/html">


    <div id="modalProfile" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Modificar Usuario</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditProfile" enctype="multipart/form-data">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="password2">Contraseña</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                    <input class="form-control" type="password" id="password2" name="password">
                                </div>
                            </div>

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="confpassword2">Confirmar contraseña</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                    <input class="form-control" type="password" id="confpassword2" name="confpassword">
                                </div>
                            </div>

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="username2">Nombre</label>
                                <div class="input-group" >
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                    <input  type="hidden" class="form-control" id="userid" name="userid" >
                                    <input  type="hidden" class="form-control" id="status" name="status" >

                                    <input class="form-control" id="username2" name="username" >
                                </div>
                            </div>
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="lastname2">Apellido Paterno</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                    <input class="form-control" id="lastname2" name="lastname">
                                </div>
                            </div>
                            <!-- Primer fila-->

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="maternalsurname2">Apellido Materno</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span>
                                    <input class="form-control" id="maternalsurname2" name="maternalsurname">
                                </div>
                            </div>

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="initials2">Iniciales</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span>
                                    <input class="form-control" id="initials2" name="initials" >
                                </div>
                            </div>
                            <!-- Segunda fila-->
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="sign2">Firma</label>
                                <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </span>
                                    <input class="form-control" id="sign2" name="sign">
                                </div>
                            </div>
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="gender2">Género</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                    <select name="gender" id="gender2" class="form-control">
                                        <option value="F">Femenino</option>
                                        <option value="M">Masculino</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tercera fila-->
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="position2">Posición</label>
                                <div class="input-group">
                              <span class="input-group-addon">
                                <i class="glyphicon glyphicon-star"></i>
                              </span>
                                    <input class="form-control" id="position2" name="position" >
                                </div>
                            </div>

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="institute2">Institución</label>
                                <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-education"></i>
                            </span>
                                    <input class="form-control" id="institute2" name="institute" >
                                </div>
                            </div>


                            <!-- Tercera fila-->
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="address2">Calle</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-pushpin"></i>
                                </span>
                                    <input class="form-control" id="address2" name="address">
                                </div>
                            </div>

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="neighborhood2">Colonia</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                    <input class="form-control" id="neighborhood2" name="neighborhood">
                                </div>
                            </div>
                            <!-- Cuarta fila-->

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="streetnumber2">Numero de Casa</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                    <input class="form-control" id="streetnumber2" name="streetnumber" >
                                </div>
                            </div>
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="zipcode2">Codigo Postal</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                </span>
                                    <input class="form-control" id="zipcode2" name="zipcode">
                                </div>
                            </div>

                            <!-- Quinta fila-->
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="city2">Ciudad</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-flag"></i>
                                </span>
                                    <input class="form-control" id="city2" name="city">
                                </div>
                            </div>
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="state2">Estado</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-flag"></i>
                                </span>
                                    <input class="form-control" id="state2" name="state" >
                                </div>
                            </div>

                            <!-- Sexta fila-->
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="country2">País</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-flag"></i>
                                </span>
                                    <input class="form-control" id="country2" name="country" >
                                </div>
                            </div>

                            <!-- Novena fila-->
                            <div class="form-group col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label class="control-label" for="bio2">Resumen biográfico</label>
                                <div class="input-group">
                                    <textarea id="bio2" name = "bio" rows="2" cols="100" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button id="btnModificarProfile" type="button" class="btn btn-sm btn-warning ">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Fin de modal Editar Usuario-->

    <div id="modalImageProfile" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Cambiar Fotografía</h3>
                </div>
                <div class="modal-body">
                    <form id="frmChangeProfilePhoto" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label" for="photo2">Seleccione fotografía</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-picture"></i>
                                </span>
                                <input type="file" id="photo2"  name="photo">
                            </div>

                            <input type="hidden" id="userid2" name="userid">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button id="btnCambiarFotoPerfil" type="button" class="btn btn-sm btn-warning ">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de modal de cambiar foto-->

<div class="business">

    <h2 class="page-header">Perfil</h2>

    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs" role="tablist">

            <li role="presentation" class="active" >
                <?php echo anchor('/user/profile', 'Mi Perfil', 'class="link-class"') ?>
            </li>
            <?php
            if($this->session->userdata('roleid') == 2){//2
                ?>
                <li role="presentation"  > <?php echo anchor('/user/my_articles', 'Mis Artículos', 'class="link-class"') ?></li>
                <li role="presentation" >
                    <?php echo anchor('/article/new_article', 'Nuevo Artículo', 'class="link-class"') ?>
                </li>
                <?php
            }
            ?>
            <?php
            if($this->session->userdata('roleid') == 1){
                ?>
                <li role="presentation" >
                    <?php echo anchor('/article/assign_reviewer', 'Asignar Revisor', 'class="link-class"') ?>
                </li>
                <li role="presentation"  ><?php echo anchor('/article/evaluated_articles', 'Artículos evaluados', 'class="link-class"') ?> </li>
                <?php
            }
            ?>
            <?php
            if($this->session->userdata('roleid') == 3){//3
                ?>
                <li role="presentation">
                    <?php echo anchor('/article/review_area', 'Área de Revisión', 'class="link-class"') ?>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="row">
        <?php foreach($user as $userdata) { ?>

            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <?php
                if($userdata->photo == null || !file_exists(base_url('assets/images/').$userdata->photo)){ ?>
                    <img src="<?php echo base_url('assets/images/profile_default.png');  ?>" class="img-responsive" width="300" height="300"/>
                    <?php
                }
                else{
                    ?>
                    <img src="<?php echo base_url('assets/images/').$userdata->photo;  ?>" class="img-responsive" width="300" height="300"/>
                    <?php
                }
                ?>
                <br>
                <br>
                <button id="btnEditarProfile" class="btn btn-warning btn-block"><span class="glyphicon glyphicon-edit"></span> Editar perfil</button>
                <button id="btnEditarFotoPerfil" class="btn btn-warning btn-block"><span class="glyphicon glyphicon-camera"></span> Cambiar foto de perfil</button>
            </div>

            <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
                <h1 class="text-center" id="nombre"><strong><?php echo $userdata->username." ".$userdata->lastname." ".$userdata->maternalsurname;?></strong></h1>
                <hr>

                <div class="col-lg-12 ">
                    <div class="col-lg-4">
                        <h4><strong>Institución</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <label id="institucion"><?php echo $userdata->institute;?></label>
                        <hr>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>E-mail</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <label id="email"><?php echo $userdata->email;?></label>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>Firma</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <label id="firma"><?php echo $userdata->sign;?></label>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>País</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <label id="country"><?php echo $userdata->country;?></h4>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>Resumen<br>biográfico</strong></h4>
                    </div>
                    <div class="col-lg-8">
                        <label><?php echo $userdata->bio;?></label>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </div>

    <hr>

</div>
