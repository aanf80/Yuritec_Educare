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

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mis Artículos</h1>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/user/profile', 'Mi Perfil', 'class="link-class"') ?>
                </li>
                <?php
                if($this->session->userdata('roleid') == 2){
                ?>
                <li class="active">Mis Artículos</li>
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

    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="tbArticle" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Clave</th>
                    <th>Titulo</th>
                    <th>Fecha de Creación</th>
                    <th>Estado</th>
                    <th>Observaciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
