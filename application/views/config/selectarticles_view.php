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
<script type="text/javascript" src="<?php echo base_url('assets/js/article.js'); ?>"></script>
<div class="container">

    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="tbArticle" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Clave</th>
                    <th>Titulo</th>
                    <th>Fecha de Creación</th>
                    <th>Estado</th>
                    <th>Portada</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <br/>
    <br/>
    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-disk"></span> Publicar</button>

