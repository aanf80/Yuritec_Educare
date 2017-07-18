<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 11/07/2017
 * Time: 08:13 PM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/contact.js'); ?>"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Contacto</h1>
        </div>

    </div>

    <form id="frmAdminContact">
        <div class="form-group">
            <div class="col-lg-6">

                <!-- Datos Personales-->
                <label class="control-label">Dirección</label>
                <textarea id="adminAddress" name = "adminAddress" rows="2" cols="100" class="form-control"></textarea>
                <div class="help-block"></div>

                <label class="control-label">Teléfono</label>
                <input type="text" class="form-control" id="adminPhone" name="adminPhone">
                <div class="help-block"></div>

                <label class="control-label">Extensión</label>
                <input type="text" class="form-control" id="adminExtension" name="adminExtension">
                <div class="help-block"></div>

                <label class="control-label">Correo Electrónico</label>
                <input type="text" class="form-control" id="adminEmail" name="adminEmail">
                <div class="help-block"></div>

                <label class="control-label">Horario de atención</label>
                <textarea id="adminSchedule" name = "adminSchedule" rows="2" cols="100" class="form-control"></textarea>
                <div class="help-block"></div>

            </div> <!-- tamaño de pantalla-->

        </div> <!-- form group-->

        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>


    </form>

    <button id="btnGuardarContacto" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>

