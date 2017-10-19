<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 06/03/2017
 * Time: 11:35 AM
 */
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/user.js'); ?>"></script>
<div class="container">


    <div class="business">
        <h2 class="page-header">Nuevo Usuario</h2>

        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">  <?php echo anchor('/user/users_new', 'Nuevo Usuario', 'class="link-class"') ?></li>
                <li role="presentation"  > <?php echo anchor('/user/users', 'Consulta de usuarios', 'class="link-class"') ?></li></li>
            </ul>
        </div>


        <form id="frmUser">
            <div class="form-group">
                <div class="col-lg-6">

                    <!-- Datos Personales-->
                    <label class="control-label">Correo Electrónico *</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Ejemplo: jorge@ittepic.edu.mx">
                    <div class="help-block"></div>

                    <label class="control-label">Contraseña *</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="help-block"></div>

                    <label class="control-label">Confirmar contraseña *</label>
                    <input type="password" class="form-control" id="confpassword" name="confpassword">
                    <div class="help-block"></div>

                    <label class="control-label" for="roleid">Tipo de usuario:</label>
                    <select name="roleid" id="roleid" class="form-control"></select>
                    <div class="help-block"></div>

                    <!--<div class="form-group">
                        <label for="photo">Seleccionar foto de perfil</label>
                        <input type="file" id="photo"  name="photo">
                    </div>
                    <div class="help-block"></div>-->

                    <label class="control-label">Nombre: *</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Nombre(s)">
                    <div class="help-block"></div>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellido Paterno">
                    <div class="help-block"></div>
                    <input type="text" class="form-control" id="maternalsurname" name="maternalsurname" placeholder="Apellido Materno">
                    <div class="help-block"></div>
                    <label class="control-label">Iniciales</label>
                    <input type="text" class="form-control" id="initials" name="initials">
                    <div class="help-block"></div>

                    <label class="control-label">Firma</label>
                    <input type="text" class="form-control" id="sign" name="sign">
                    <div class="help-block"></div>

                    <div id="gender">
                        <div><label>Género</label></div>
                        <label class="radio-inline">
                            <input type="radio" value="F" name="gender" id="r1" checked> Femenino
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="M" name="gender" id="r2"> Masculino
                        </label>
                    </div>
                    <div class="help-block"></div>

                    <label class="control-label">Posición</label>
                    <input type="text" class="form-control" id="position" name="position" placeholder="Ejemplo: Maestro">
                    <div class="help-block"></div>

                    <label class="control-label">Institución *</label>
                    <input type="text" class="form-control" id="institute" name="institute" placeholder="Ejemplo: Instituto Tecnológico de Tepic">
                    <div class="help-block"></div>



                    <h2><strong>Domicilio</strong></h2>


                    <label class="control-label">Calle</label>
                    <input type="text" class="form-control" id="address" name="address">
                    <div class="help-block"></div>


                    <label class="control-label">Colonia</label>
                    <input type="text" class="form-control" id="neighborhood" name="neighborhood">
                    <div class="help-block"></div>


                    <label class="control-label">Número</label>
                    <input type="text" class="form-control" id="streetnumber" name="streetnumber">
                    <div class="help-block"></div>

                    <label class="control-label">Código Postal</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode">
                    <div class="help-block"></div>

                    <label class="control-label">Ciudad</label>
                    <input type="text" class="form-control" id="city" name="city">
                    <div class="help-block"></div>

                    <label class="control-label">Estado</label>
                    <input type="text" class="form-control" id="state" name="state">
                    <div class="help-block"></div>

                    <label class="control-label">País</label>
                    <select name="country" id="country" class="form-control">
                        <option>México</option>
                        <option>Estados Unidos</option>
                        <option>España</option>
                        <option>Argentina</option>
                    </select>
                    <div class="help-block"></div>



                </div> <!-- tamaño de pantalla-->

            </div> <!-- form group-->

            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>

            <button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i>Guardar</button>
        </form>

    </div>



