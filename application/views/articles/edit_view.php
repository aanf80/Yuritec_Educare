<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 07:42 PM
 */
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/article.js'); ?>"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nuevo Artículo</h1>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/user/profile', 'Mi Perfil', 'class="link-class"') ?>
                </li>
                <?php
                if($this->session->userdata('roleid') == 2){
                    ?>
                    <li>
                        <?php echo anchor('/user/my_articles', 'Mis Artículos', 'class="link-class"') ?>
                    </li>
                    <li class="active">Nuevo Artículo</li>
                    <?php
                }
                ?>
                <?php
                if($this->session->userdata('roleid') == 1){
                ?>
                <li>
                    <?php echo anchor('/article/assign_reviewer', 'Asignar Revisor', 'class="link-class"') ?>
                </li>
                    <li><?php echo anchor('/article/evaluated_articles', 'Artículos evaluados', 'class="link-class"') ?></li>
                    <?php
                }
                ?>
                <?php
                if($this->session->userdata('roleid') == 3){
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
    <div id="modalCoautor" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Agregar coautores</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditCoautor">
                        <div class="form-group">
                            <label class="control-label" for="reviserid">Nombre del primer coautor</label>
                            <input type="text" class="form-control" name="title" id="title">

                            <label class="control-label" for="reviserid">Nombre del segundo coautor</label>
                            <input type="text" class="form-control" name="title" id="title">

                            <label class="control-label" for="reviserid">Nombre del tercer coautor</label>
                            <input type="text" class="form-control" name="title" id="title">
                                <input type="hidden" id="articleid" name="articleid">

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary btn-warning" id="btnAsignarRev">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <form id="frmArticle">
        <div class="form-group" enctype="multipart/form-data">
            <h3>Título</h3>
            <input type="text" class="form-control" name="title" id="title">
            <div class="row">&nbsp;</div>

            <h3>Apartado Temático</h3>
            <select name="categoryid" id="categoryid" class="form-control"></select>
            <div class="row">&nbsp;</div>

            <h3>Tipo de artículo</h3>
            <select name="articletypeid" id="articletypeid" class="form-control"></select>
            <div class="row">&nbsp;</div>

            <h3>Propósito del artículo</h3>
            <textarea name="purpouse" id="purpouse"></textarea>
            <div class="row">&nbsp;</div>

            <h3>Resumen</h3>
            <textarea name="resumen" id="resumen"></textarea>
            <div class="row">&nbsp;</div>

            <h3>Palabras Clave</h3>
            <input type="text" class="form-control" name="palabrasclave" id="palabrasclave">
            <div class="row">&nbsp;</div>

            <h3>Problemas a resolver</h3>
            <textarea name="problems" id="Problems"></textarea>
            <div class="row">&nbsp;</div>

            <h3>Impacto del artículo en la generación del artículo</h3>
            <textarea name="problems" id="Problems"></textarea>
            <div class="row">&nbsp;</div>

            <h3>Resultados alcanzados</h3>
            <textarea name="problems" id="Problems"></textarea>
            <div class="row">&nbsp;</div>

            <hr>
            <h3>Seleccionar archivo</h3>
            <input type="file" id="file"  name="file">
            <br/>
            <br/>

            &nbsp;<button type="submit" class="btn btn-warning" id="btnGuardar"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
        </div>
        <button class="btn btn-warning" id="btnCoautor"><span class="glyphicon glyphicon-plus-sign"></span> Agregar coautores</button>
    </form>





