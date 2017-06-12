<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 07:42 PM
 */
?>
<script>  tinymce.init({
        selector: "textarea",
        language : "es_MX",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
        ],
        save_enablewhendirty: true
    }); </script>
<script type="text/javascript" src="<?php echo base_url('assets/js/article.js'); ?>"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Área de Edición</h1>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/user/profile', 'Mi Perfil', 'class="link-class"') ?>
                </li>
                <li>
                    <?php echo anchor('/user/my_articles', 'Mis Artículos', 'class="link-class"') ?>
                </li>
                <li class="active">Área de Edición</li>
                <?php

                if($this->session->userdata('roleid') == 1){
                    ?>
                    <li>
                        <?php echo anchor('/article/review_area', 'Área de Revisión', 'class="link-class"') ?>
                    </li>
                    <?php
                }
                ?>
            </ol>
        </div>
    </div>
    <form id="frmArticle">
        <div class="form-group">
            <h3>Título</h3>
            <input type="text" class="form-control" name="title" id="title">
            <div class="row">&nbsp;</div>

            <h3>Apartado Temático</h3>
            <select name="categoryid" id="categoryid" class="form-control"></select>
            <div class="row">&nbsp;</div>

            <h3>Resumen</h3>
            <textarea name="resumen" id="resumen"></textarea>
            <div class="row">&nbsp;</div>

            <h3>Palabras Clave</h3>
            <input type="text" class="form-control" name="palabrasclave" id="palabrasclave">
            <div class="row">&nbsp;</div>

            <h3>Abstract</h3>
            <textarea name="abstract" id="abstract"></textarea>
            <div class="row">&nbsp;</div>

            <h3>Keywords</h3>
            <input type="text" class="form-control" name="keywords" id="keywords">
            <div class="row">&nbsp;</div>

            <h3>Contenido</h3>
            <textarea name="content" id="content"></textarea>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <button type="submit" class="btn btn-warning" id="btnGuardar"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
        </div>
    </form>


    <button type="submit" class="btn btn-warning" id="btnEnviar" ><span class="glyphicon glyphicon-open-file"></span> Enviar para revisión</button>




