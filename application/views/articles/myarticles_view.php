<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 12/06/2017
 * Time: 09:43 AM
 */

?>

<script type="text/javascript" src="<?php echo base_url('assets/js/article.js'); ?>"></script>
<div class="container">

    <div id="modalUploadArt" class="modal">

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Subir artículo</h3>
                </div>
                <div class="modal-body">
                    <form id="frmUploadArt" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label" for="file2">Seleccione archivo</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-picture"></i>
                                </span>
                                <input type="file" id="file2"  name="file">
                            </div>

                            <input type="hidden" id="articleid2" name="articleid">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary btn-warning" id="btnUploadCorrectedFile">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="business">

            <h2 class="page-header">Mis Artículos</h2>

            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">

                    <li>
                        <?php echo anchor('/user/profile', 'Mi Perfil', 'class="link-class"') ?>
                    </li>
                    <?php
                    if($this->session->userdata('roleid') == 2){
                        ?>
                        <li role="presentation" class="active" > <?php echo anchor('/user/my_articles', 'Mis Artículos', 'class="link-class"') ?></li>
                        <li role="presentation" >
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

            <table id="tbMyArticle" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Clave</th>
                    <th>Titulo</th>
                    <th>Fecha de Creación</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
