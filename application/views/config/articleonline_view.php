<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 28/06/2017
 * Time: 09:31 PM
 */
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/magazine.js'); ?>"></script>

<div class="container">
<div class="business">

    <h2 class="page-header">Artículo en línea</h2>
    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs" role="tablist">
            <li role="presentation"  > <?php echo anchor('/settings/magazine', 'Nueva revista', 'class="link-class"') ?></li></li>
            <li role="presentation" > <?php echo anchor('/settings/select_articles', 'Seleccionar articulos', 'class="link-class"') ?></li>
            <li role="presentation"  > <?php echo anchor('/settings/magazines', 'Ver Revistas', 'class="link-class"') ?></li>
            <li role="presentation" class="active"><?php echo anchor('/magazine/article_editor', 'Artículo en línea', 'class="link-class"') ?></li>
        </ul>
    </div>


    <label class="control-label">Revista</label>
    <select name="magazineid" id="magazineid5" class="form-control">
        <option value=0>Seleccione una revista</option>
    </select>

    <label class="control-label">Artículo</label>
    <select name="articleid" id="articleid3" class="form-control">
        <option>Seleccione un artículo</option>
    </select>
<br/>
    <h3>Contenido</h3>
    <textarea name="content" id="contentAO"></textarea>
    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
    <button id="btnGuardarContenido" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>


</div>











