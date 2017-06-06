<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 06/03/2017
 * Time: 11:35 AM
 */
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/register.js'); ?>"></script>
<div class="container">

    <h3 class="page-header">Registrarse</h3>

    <form id="frmRegister">
        <div class="form-group">
            <div class="col-lg-6">

                <!-- Datos Personales-->
                <label class="control-label">Correo Electrónico *</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Ejemplo: jorge@ittepic.edu.mx">
                <div class="help-block">Será su nombre de usuario</div>

                <label class="control-label">Contraseña *</label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="help-block"></div>

                <label class="control-label">Confirmar contraseña *</label>
                <input type="password" class="form-control" id="confpassword" name="confpassword">
                <div class="help-block"></div>

                <label class="control-label">Foto de perfil</label>
                <input type="text" class="form-control" id="photo" name="photo" placeholder="Escriba el enlace de la imagen">
                <div class="help-block"></div>

                <label class="control-label">Nombre:</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre(s)">
                <div class="help-block"></div>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellido Paterno">
                <div class="help-block"></div>
                <input type="text" class="form-control" id="maternalsurname" name="maternalsurname" placeholder="Apellido Materno">

                <label class="control-label">Iniciales</label>
                <input type="text" class="form-control" id="initials" name="initials">
                <div class="help-block"></div>

                <label class="control-label">Firma</label>
                <input type="text" class="form-control" id="sign" name="sign">
                <div class="help-block"></div>

                <div id="gender">
                    <div><label>Género</label></div>
                    <label class="radio-inline">
                        <input type="radio" value="F" name="gender" id="r1"> Femenino
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="M" name="gender" id="r2"> Masculino
                    </label>
                </div>
                <div class="help-block"></div>

                <label class="control-label">Posición</label>
                <input type="text" class="form-control" id="position" name="position" placeholder="Ejemplo: Maestro">
                <div class="help-block"></div>

                <label class="control-label">Institución</label>
                <input type="text" class="form-control" id="institute" name="institute" placeholder="Ejemplo: Instituto Tecnológico de Tepic">
                <div class="help-block"></div>

                <label for="resumen">Resumen biográfico</label>
                <textarea id="bio" name = "bio" rows="6" class="form-control"></textarea>
                <div class="help-block">Ej. Departamento y Rango</div>

                <h4><strong>Domicilio</strong></h4>


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



