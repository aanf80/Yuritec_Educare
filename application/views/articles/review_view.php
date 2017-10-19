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



    <div id="modalCheck" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Evaluación de artículo</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditCheck">
                        <div class="form-group">
<!--                            <label class="control-label">Estado</label>
                            <select name="status" id="status" class="form-control">
                                <option>Aprobado</option>
                                <option >Aprobado con observaciones</option>
                                <option >No Aprobado</option>
                            </select>-->
                            <label>Seleccionar la evaluación del artículo</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-file"></i>
                                </span>
                                <input type="file" id="photo2"  name="photo">
                            </div>
                            <input type="hidden" id="articleid" name="articleid">
                            <br/>
                            <label class="control-label" for="observations">Obervaciones</label>
                            <div class="input-group">
                                <textarea id="observations" name = "observations" rows="2" cols="100" class="form-control"></textarea>
                            </div>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary btn-warning" id="btnModificarEstado">Enviar Evaluación</button>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-12">
        <div class="business">
            <h2 class="page-header">Área de Revisión</h2>


            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">

                    <li>
                        <?php echo anchor('/user/profile', 'Mi Perfil', 'class="link-class"') ?>
                    </li>
                    <?php
                    if($this->session->userdata('roleid') == 2){
                        ?>
                        <li role="presentation"  > <?php echo anchor('/user/my_articles', 'Mis Artículos', 'class="link-class"') ?></li>
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
                        <li role="presentation" class="active">
                            <?php echo anchor('/article/review_area', 'Área de Revisión', 'class="link-class"') ?>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <br/>
            <h3>¿Cómo realizar la evaluación del artículo?</h3>
            <ol>
                <li>Descargar Formato de evaluación dando clic al botón "Descargar Formato"</li>
                <li>Llenar formato (a mano o a computadora)</li>
                <li>Firmar formato</li>
                <li>Digitalizar el formato lleno</li>
                <li>Subir el formato firmado al sistema dando clic al botón "Subir Evaluación"</li>
                <li>Dar clic a "Enviar Evaluación"</li>
            </ol>
            <p>*En ¨caso de haber observaciones, escribirlas en el campo de texto</p>
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
                            <th>Operaciones</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>



        </div>
    </div>
