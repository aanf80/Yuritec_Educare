<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 07:42 PM
 */
?>
<script>
    tinymce.init({selector: 'textarea'}
    );</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/article.js'); ?>"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Área de Edición</h3>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/user/profile', 'Mi Perfil', 'class="link-class"') ?>
                </li>
                <li>
                    <?php echo anchor('/article', 'Mis Artículos', 'class="link-class"') ?>
                </li>
                <li class="active">Área de Edición</li>
                <?php

                if($this->session->userdata('id') == 1){
                    ?>
                    <li>
                        <?php echo anchor('/article/edit_area', 'Área de Revisión', 'class="link-class"') ?>
                    </li>
                    <?php
                }
                ?>
            </ol>
        </div>
    </div>

    <h3>Título</h3>
    <input type="text" class="form-control" id="txtTitle" required>
    <div class="row">&nbsp;</div>
    <h3>Apartado Temático</h3>
    <select name="cbCategory" id="cbCategory" class="form-control"></select>
    <div class="row">&nbsp;</div>
    <h3>Resumen</h3>
    <textarea></textarea>
    <div class="row">&nbsp;</div>
    <h3>Palabras Clave</h3>
    <input type="text" class="form-control" id="txtClave" required>
    <div class="row">&nbsp;</div>
    <h3>Abstract</h3>
    <textarea></textarea>
    <div class="row">&nbsp;</div>
    <h3>Keywords</h3>
    <input type="text" class="form-control" id="txtKey" required>
    <div class="row">&nbsp;</div>
    <h3>Contenido</h3>
    <textarea></textarea>
    <div class="row">&nbsp;</div>

    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-open-file"></span> Enviar para revisión</button>
    <div class="row">&nbsp;</div>



    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>



