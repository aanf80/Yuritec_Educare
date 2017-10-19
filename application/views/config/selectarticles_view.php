<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 23/06/2017
 * Time: 10:14 AM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/magazine.js'); ?>"></script>
<div class="container">

        <div class="col-lg-12">
            <div class="business">
                <h2 class="page-header">Seleccionar Artículos</h2>
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation"  > <?php echo anchor('/settings/magazine', 'Nueva revista', 'class="link-class"') ?></li></li>
                        <li role="presentation" class="active"> <?php echo anchor('/settings/select_articles', 'Seleccionar articulos', 'class="link-class"') ?></li>
                        <li role="presentation"  > <?php echo anchor('/settings/magazines', 'Ver Revistas', 'class="link-class"') ?></li>
                        <li role="presentation" ><?php echo anchor('/magazine/article_editor', 'Artículo en línea', 'class="link-class"') ?></li>
                    </ul>
                </div>

                <!-- Datos Personales-->
                <label class="control-label">Seleccione una revista</label>
                <select name="magazineid" id="magazineid" class="form-control"></select>
                <div class="help-block"></div>

                <!--<button id="btnSelectMagazine" class="btn btn-warning"><i class="glyphicon glyphicon-check"></i> Aceptar</button>-->
                <br/>
                <br/>




                <table id="tbArticles" class="table table-striped table-bordered">
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

