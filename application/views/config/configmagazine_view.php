<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 12/06/2017
 * Time: 01:46 PM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/magazine.js'); ?>"></script>


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nueva Revista</h1>
            <ol class="breadcrumb">
                <li class="active">Nueva Revista</li>
                <li>
                    <?php echo anchor('/settings/select_articles', 'Seleccionar articulos', 'class="link-class"') ?>
                </li>

            </ol>
        </div>
    </div>

    <form id="frmUser">
        <div class="form-group">
            <div class="col-lg-6">

                <!-- Datos Personales-->
                <label class="control-label">Volumen</label>
                <input type="text" class="form-control" id="email" name="email">
                <div class="help-block"></div>

                <label class="control-label">Número</label>
                <input type="text" class="form-control" id="password" name="password">
                <div class="help-block"></div>

                <label class="control-label">Año</label>
                <input type="text" class="form-control" id="confpassword" name="confpassword">
                <div class="help-block"></div>


                <label class="control-label">Periodo</label>
                <select name="country" id="country" class="form-control">
                    <option>Enero - Junio</option>
                    <option>Agosto - Diciembre</option>
                </select>
                <div class="help-block"></div>

                <div class="form-group">
                    <label for="photo">Seleccionar foto de portada</label>
                    <input type="file" id="photo"  name="photo">
                </div>
                <div class="help-block"></div>


            </div> <!-- tamaño de pantalla-->

        </div> <!-- form group-->

        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>

        <button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
    </form>



