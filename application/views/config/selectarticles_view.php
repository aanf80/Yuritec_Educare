<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 23/06/2017
 * Time: 10:14 AM
 */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Seleccionar Artículos</h1>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/settings/magazine', 'Nueva revista', 'class="link-class"') ?>
                </li>
                <li class="active">Seleccionar artículos</li>

            </ol>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/js/magazine.js'); ?>"></script>
    <div class="container">

        <div class="col-lg-6">

            <!-- Datos Personales-->
            <label class="control-label">Seleccione una revista</label>
            <select name="magazineid" id="magazineid" class="form-control"></select>
            <div class="help-block"></div>

            <button id="btnAceptar" class="btn btn-warning"><i class="glyphicon glyphicon-check"></i> Aceptar</button>
            <br/>
            <br/>
            <br/>
            <br/>


        </div> <!-- tamaño de pantalla-->


        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table id="tbArticles" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Titulo</th>
                        <th>Fecha de Creación</th>
                        <th>Estado</th>
                        <th>Portada</th>
                        <th>Operaciones</th>

                    </tr>
                    </thead>
                </table>
            </div>
        </div>

        <br/>
        <br/>
        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-disk"></span> Publicar</button>

