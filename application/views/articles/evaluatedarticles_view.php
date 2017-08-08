<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 08/08/2017
 * Time: 01:03 AM
 */
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/review.js'); ?>"></script>
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Artículos evaluados</h1>
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
                    <li>
                        <?php echo anchor('/article/new_article', 'Nuevo Artículo', 'class="link-class"') ?>
                    </li>
                    <?php
                }
                ?>
                <?php
                if($this->session->userdata('roleid') == 1){
                    ?>
                    <li>
                        <?php echo anchor('/article/assign_reviewer', 'Asignar Revisor', 'class="link-class"') ?>
                    </li>
                    <li class="active">Artículos evaluados</li>

                    <?php
                }
                ?>
                <?php

                if($this->session->userdata('roleid') == 3){
                    ?>
                    <?php echo anchor('/article/review_area', 'Área de Revisión', 'class="link-class"') ?>

                    <?php
                }
                ?>
            </ol>
        </div>
    </div>


    <div id="modalChangeState" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Cambiar estado de artículo</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditCheck">
                        <div class="form-group">
                            <label class="control-label">Estado</label>
                            <select name="status" id="status" class="form-control">
                                <option>Aprobado</option>
                                <option >Aprobado con observaciones</option>
                                <option >No Aprobado</option>
                            </select>

                            <input type="hidden" id="articleid" name="articleid">
                            <br/>

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
            <table id="tbEvaluatedArticles" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Clave</th>
                    <th>Titulo</th>
                    <th>Fecha de Creación</th>
                    <th>Estado</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

