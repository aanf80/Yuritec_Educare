<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 02:19 PM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/user.js'); ?>"></script>
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h3>Consulta de usuarios</h3>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/user/users_new', 'Consulta de usuarios', 'class="link-class"') ?>
                </li>
                <li class="active">Consulta de usuarios</li>

            </ol>
        </div>
    </div>
    <div id="modalUser" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3>Modificar Usuario</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditUser" enctype="multipart/form-data">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="email2">Correo</label>
                                <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-envelope"></i>
                            </span>
                                    <input class="form-control" id="email2" name="email" placeholder="Email del Usuario">
                                </div>
                            </div>



                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="password2">Contraseña</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                    <input class="form-control" id="password2" name="password" placeholder="Contraseña del Usuario">
                                </div>
                            </div>

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="username2">Nombre del Usuario</label>
                                <div class="input-group" >
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                    <input  type="hidden" class="form-control" id="userid" name="userid">

                                    <input class="form-control" id="username2" name="username" placeholder="Nombre del Usuario">
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
                                    <input class="form-control" id="initials2" name="initials">
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
                                        <option>Femenino</option>
                                        <option>Masculino</option>
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
                                    <input class="form-control" id="position2" name="position">
                                </div>
                            </div>

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="institute2">Institución</label>
                                <div class="input-group">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-education"></i>
                            </span>
                                    <input class="form-control" id="institute2" name="institute">
                                </div>
                            </div>


                            <!-- Tercera fila-->
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="address2">Calle</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-pushpin"></i>
                                </span>
                                    <input class="form-control" id="address2" name="address" placeholder="Calle del domicilio">
                                </div>
                            </div>

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="neighborhood2">Colonia</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                    <input class="form-control" id="neighborhood2" name="neighborhood" placeholder="Colonia del usuario">
                                </div>
                            </div>
                            <!-- Cuarta fila-->

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="streetnumber2">Numero de Casa</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span>
                                    <input class="form-control" id="streetnumber2" name="streetnumber" placeholder="Numero de Casa(Domicilio)">
                                </div>
                            </div>
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="zipcode2">Codigo Postal</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-envelope"></i>
                                </span>
                                    <input class="form-control" id="zipcode2" name="zipcode" placeholder="Codigo Postal del Usuario">
                                </div>
                            </div>

                            <!-- Quinta fila-->
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="city2">Ciudad</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-flag"></i>
                                </span>
                                    <input class="form-control" id="city2" name="city" placeholder="Ciudad">
                                </div>
                            </div>
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="state2">Estado</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-flag"></i>
                                </span>
                                    <input class="form-control" id="state2" name="state" placeholder="Estado">
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
                                    <input class="form-control" id="photo2" name="photo" placeholder="Fotografía">
                                </div>
                            </div>
                            <!-- Séptima fila-->
                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="roleid2">Rol de usuario</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-king"></i>
                                </span>
                                    <select name="roleid" id="roleid2" class="form-control"></select>
                                </div>
                            </div>

                            <div class="form-group col col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label class="control-label" for="country2">País</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-flag"></i>
                                </span>
                                    <input class="form-control" id="country2" name="country" placeholder="Pais">
                                </div>
                            </div>

                            <!-- Novena fila-->




                        </div>

                    </form>
                </div>



                <div class="modal-footer">
                    <button id="btnModificarUser" type="button" class="btn btn-sm btn-warning ">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Aqui inicia el formulario-->
    <div class="col-md-8">
    </div>
    <div class="row">&nbsp;</div>
    <div class ="row"><hr></div>
    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="tbUsers" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Género</th>
                    <th>Domicilio</th>
                    <th>Código Postal</th>
                    <th>Ciudad</th>
                    <th>País</th>
                    <th>Correo electrónico</th>
                    <th>Contraseña
                    </th>
                    <th>Firma</th>
                    <th>Posición</th>
                    <th>Instituto</th>
                    <th>Rol de usuario</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

