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

                <li>
                <li class="active">Área de Revisión</li>
                </li>
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
                    <th>Descargar archivo</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
