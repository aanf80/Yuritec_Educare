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

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Perfil</h3>
            <ol class="breadcrumb">
                <li class="active">Perfil</li>
                <li>
                    <?php echo anchor('/user/my_articles', 'Mis Artículos', 'class="link-class"') ?>
                </li>
                <li>
                    <?php echo anchor('/article/edit_area', 'Área de Edición', 'class="link-class"') ?>
                </li>

                <?php

                if($this->session->userdata('roleid') == 1){
                    ?>
                    <li>
                        <?php echo anchor('/article/edit_area', 'Área de Revisión', 'class="link-class"') ?>
                    </li>
                    <?php
                }
                ?>
            </ol>
        </div>
    </div>


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
                                <label class="control-label" for="email2">Correo</label>
                                <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                                    <input class="form-control" id="email2" name="email" >
                                </div>
                            </div>



                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="password2">Contraseña</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                    <input class="form-control" id="password2" name="password">
                                </div>
                            </div>

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="username2">Nombre del Usuario</label>
                                <div class="input-group" >
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                    <input  type="hidden" class="form-control" id="userid" name="userid" >

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
                            <div class="col-xs-6 col-md-6 col-lg-6">

                                <label class="control-label" for="photo2">Enlace de fotografía:</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-picture"></i>
                                </span>
                                    <!--    <input id="file2" name="file" type="file"  /> -->
                                    <input class="form-control" id="photo2" name="photo" ">
                                </div>
                            </div>
                            <!-- Séptima fila-->
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

    <div class="row">
        <?php foreach($user as $userdata) { ?>

            <div class="col-lg-3">

                <img src="<?php echo $userdata->photo;  ?>" class="img-responsive" width="1600" height="1600"/>
                <br>
                <br>
                <button id="btnEditarProfile" class="btn btn-warning btn-block">Editar perfil</button>
            </div>

            <div class="col-lg-9">
                <h1 class="text-center" id="nombre"><strong><?php echo $userdata->username." ".$userdata->lastname." ".$userdata->maternalsurname;?></strong></h1>
                <hr>

                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>Institución</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <h4 id="institucion"><?php echo $userdata->institute;?></h4>
                        <hr>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>E-mail</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <h4 id="email"><?php echo $userdata->email;?></h4>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>Firma</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <h4 id="firma"><?php echo $userdata->sign;?></h4>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>País</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <h4 id="country"><?php echo $userdata->country;?></h4>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>Resumen<br>biográfico</strong></h4>
                    </div>
                    <div class="col-lg-8">
                        <h4><?php echo $userdata->bio;?></h4>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </div>

    <hr>
