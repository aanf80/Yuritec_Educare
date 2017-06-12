<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 12/06/2017
 * Time: 01:14 PM
 */
?>

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
                <?php echo anchor('/article/edit_area', 'Área de Edición', 'class="link-class"') ?>
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