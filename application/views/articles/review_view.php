<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 12/06/2017
 * Time: 01:14 PM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/review.js'); ?>"></script>
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Área de Revisión</h1>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/user/profile', 'Mi Perfil', 'class="link-class"') ?>
                </li>
                <li>
                    <?php echo anchor('/user/my_articles', 'Mis Artículos', 'class="link-class"') ?>
                </li>
                <li>
                    <?php echo anchor('/article/new_article', 'Nuevo Artículo', 'class="link-class"') ?>
                </li>

                <li>
                    <?php echo anchor('/article/assign_reviewer', 'Asignar Revisor', 'class="link-class"') ?>
                </li>
                <?php

                if($this->session->userdata('roleid') == 1){
                    ?><li class="active">Área de Revisión</li>

                    <?php
                }
                ?>
            </ol>
        </div>
    </div>

    <div id="modalCheck" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Revisión de artículo</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditCheck">
                        <div class="form-group">
                                <div id="status">
                                    <div><label>Estado</label></div>
                                    <label class="radio-inline">
                                        <input type="radio" value="Aprobado" name="status" id="r1" checked> Aprobado
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="Aprobado con observaciones" name="status" id="r2"> Aprobado con observaciones
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" value="No Aprobado" name="status" id="r3"> No Aprobado
                                    </label>
                                </div>
                                <input type="hidden" id="articleid" name="articleid">
                        </div>
             <label class="control-label" for="bio2">Obervaciones</label>
                            <div class="input-group">
                                <textarea id="observations" name = "observations" rows="2" cols="100" class="form-control"></textarea>
                            </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary btn-warning" id="btnModificarEstado">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="tbReview" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Clave</th>
                    <th>Titulo</th>
                    <th>Fecha de Creación</th>
                    <th>Estado</th>
                    <th>Portada</th>
                    <th>Descargar archivo</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
