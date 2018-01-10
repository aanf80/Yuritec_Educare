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
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary btn-warning" id="btnAsignarRev">Agregar</button>
                </div>
            </div>
        </div>
    </div>


<div class="business">
    <h2 class="page-header">Nuevo Artículo</h2>

    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs" role="tablist">

            <li>
                <?php echo anchor('/user/profile', 'Mi Perfil', 'class="link-class"') ?>
            </li>
            <?php
            if($this->session->userdata('roleid') == 2){
                ?>
                <li role="presentation"  > <?php echo anchor('/user/my_articles', 'Mis Artículos', 'class="link-class"') ?></li>
                <li role="presentation"class="active" >
                    <?php echo anchor('/article/new_article', 'Nuevo Artículo', 'class="link-class"') ?>
                </li>
                <?php
            }
            ?>
            <?php
            if($this->session->userdata('roleid') == 1){
                ?>
                <li role="presentation" >
                    <?php echo anchor('/article/assign_reviewer', 'Asignar Revisor', 'class="link-class"') ?>
                </li>
                <li role="presentation"  ><?php echo anchor('/article/evaluated_articles', 'Artículos evaluados', 'class="link-class"') ?> </li>
                <?php
            }
            ?>
            <?php
            if($this->session->userdata('roleid') == 3){
                ?>
                <li role="presentation">
                    <?php echo anchor('/article/review_area', 'Área de Revisión', 'class="link-class"') ?>
                </li>
                <?php
            }
            ?>
        </ul>
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
            <select name="articletypeid" id="articletypeid" class="form-control">
                <option>Investigación experimental/empírica</option>
            </select>

            <div class="row">&nbsp;</div>

            <!--<h3>Propósito del artículo</h3>
            <textarea name="purpouse" id="purpouse"></textarea>
            <div class="row">&nbsp;</div>-->

            <h3>Resumen</h3>
            <textarea name="resumen" id="resumen"></textarea>
            <div class="row">&nbsp;</div>

            <h3>Palabras Clave</h3>
            <input type="text" class="form-control" name="palabrasclave" id="palabrasclave">
            <div class="row">&nbsp;</div>

            <h3>Coautores**</h3>

            <input type="text" class="form-control" name="coautors" id="coautors">
            <div class="row">&nbsp;</div>

            <p>**Nota: Este campo se llena únicamente si la elaboración del artículo fue colaborativa</p>
            <p>Ingresar el nombre y apellido de hasta un máximo de 3 coautores separados por coma</p>
            <p>Ej. Juan Pérez, María González, Pedro Jímenez</p>

            <!--<h3>Problemas a resolver</h3>
            <textarea name="problems" id="Problems"></textarea>
            <div class="row">&nbsp;</div> -->

            <!-- <h3>Impacto del artículo en la generación del artículo</h3>
            <textarea name="problems" id="Problems"></textarea>
            <div class="row">&nbsp;</div>

            <h3>Resultados alcanzados</h3>
            <textarea name="problems" id="Problems"></textarea>
            <div class="row">&nbsp;</div>-->

            <hr>
            <h3>Seleccionar archivo</h3>
            <input type="file" id="file"  name="file">
            <br/>
            <br/>

            <button type="submit" class="btn btn-warning" id="btnGuardar"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
        </div>

    </form>
</div>
