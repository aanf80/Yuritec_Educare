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
            <h1 class="page-header">Asignar Revisor</h1>
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


                <li class="active">Área de Revisión</li>

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

    <div id="modalAssign" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Asignar Revisor</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditAssign">
                        <div class="form-group">
                            <label class="control-label" for="reviserid">Revisor</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <select name="reviserid" id="reviserid" class="form-control"></select>
                                <input type="hidden" id="articleid" name="articleid">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary btn-warning" id="btnModificar">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="tbAssign" class="table table-striped table-bordered">
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
