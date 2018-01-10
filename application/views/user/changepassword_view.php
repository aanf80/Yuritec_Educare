<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 08/08/2017
 * Time: 12:06 AM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/user.js'); ?>"></script>
<div class="container">
<br/>
<div class="business">
<h3 class="page-header">Cambiar Contraseña</h3>
        <form id="frmChangepassword">
        <div class="form-group">
            <div class="col-lg-6">
                <!-- Datos Personales-->
                <label class="control-label">Ingrese nueva contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="help-block"></div>
                <label class="control-label">Confirme nueva contraseña</label>
                <input type="password" class="form-control" id="confpassword" name="confpassword">
                <div class="help-block"></div>
                <input  type="hidden" class="form-control" id="key" name="key" value="<?php echo $key ?>" >

            </div> <!-- tamaño de pantalla-->

        </div> <!-- form group-->

        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>

        <button type="submit"  class="btn btn-warning"><i class="glyphicon glyphicon-check"></i>Guardar</button>
    </div>
        </form>
   
<br/>
   



