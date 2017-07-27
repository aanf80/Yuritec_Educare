<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 12/06/2017
 * Time: 01:46 PM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/committee.js'); ?>"></script>

<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nuevo Miembro <small>Comité Editorial</small></h1>
            <ol class="breadcrumb">
                <li class="active">Nuevo Miembro</li>
                <li>
                    <?php echo anchor('/committee/members', 'Consulta de miembros del comité', 'class="link-class"') ?>
                </li>

            </ol>
        </div>
    </div>

    <form id="frmCommittee" enctype="multipart/form-data">

        <div class="form-group">
            <div class="col-lg-6">

                <!-- Datos Personales-->

                <label class="control-label">Nombre</label>
                <input type="text" class="form-control" id="ec_name" name="ec_name">
                <div class="help-block"></div>

                <label class="control-label">Puesto</label>
                <input type="text" class="form-control" id="ec_position" name="ec_position">
                <div class="help-block"></div>

                <label for="resumen">Resumen biográfico</label>
                <textarea name="ec_bio" id="ec_bio" rows="6" class="form-control" placeholder="Ej. Departamento y Rango"></textarea>
                <div class="help-block"></div>

                <div class="form-group">
                    <label for="ec_photo">Seleccionar fotografía</label>
                    <input type="file" id="ec_photo"  name="ec_photo">
                </div>
                <div class="help-block"></div>

                <label class="control-label">Cuenta de Facebook</label>
                <input type="text" class="form-control" id="ec_fbaccount" name="ec_fbaccount">
                <div class="help-block"></div>

                <label class="control-label">Cuenta de Twitter</label>
                <input type="text" class="form-control" id="ec_twaccount" name="ec_twaccount">
                <div class="help-block"></div>

            </div> <!-- tamaño de pantalla-->

        </div> <!-- form group-->

        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>

        <button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
    </form>




