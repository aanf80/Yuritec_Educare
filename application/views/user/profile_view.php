<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 03/04/2017
 * Time: 10:30 AM
 */
?>
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Perfil</h3>
            <ol class="breadcrumb">
                <li class="active">Perfil</li>
                <li>
                    <?php echo anchor('/article', 'Mis Artículos', 'class="link-class"') ?>
                </li>
                <li>
                    <?php echo anchor('/article/edit_area', 'Área de Edición', 'class="link-class"') ?>
                </li>

                <?php

                if($this->session->userdata('id') == 1){
                ?>
                    <li>
                        <?php echo anchor('/article/edit_area', 'Área de Revisión', 'class="link-class"') ?>
                    </li>
                <?php
                }
                ?>
            </ol>
        </div>
    </div>

    <div class="row">
        <?php foreach($user as $userdata) { ?>
            <div class="col-lg-3">

                <img src="<?php echo $userdata->photo;  ?>" class="img-responsive" width="1600" height="1600"/>
                <br>
                <br>
                <a href="editarPerfil.html" class="btn btn-warning btn-block">Editar perfil</a>
            </div>

            <div class="col-lg-9">
                <h1 class="text-center" id="nombre"><strong><?php echo $userdata->username." ".$userdata->lastname." ".$userdata->maternalsurname;?></strong></h1>
                <hr>

                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>Institución</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <h4 id="institucion"><?php echo $userdata->institute;?></h4>
                        <hr>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>E-mail</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <h4 id="email"><?php echo $userdata->email;?></h4>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>Firma</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <h4 id="firma"><?php echo $userdata->sign;?></h4>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>País</strong></h4>
                        <hr>
                    </div>
                    <div class="col-lg-8">
                        <h4 id="firma"><?php echo $userdata->country;?></h4>
                        <hr>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <h4><strong>Resumen<br>biográfico</strong></h4>
                    </div>
                    <div class="col-lg-8">
                        <h4>Dr. en Educación por Nova Southeastern University.
                            Actualmente, profesor de la Universidad Autónoma de Nayarit y de Nova Southeastern
                            University, y Director de Educación a Distancia de la Universidad Autónoma de Nayarit.</h4>
                    </div>
                </div>
            </div>

            <?php
        }
        ?>
    </div>

    <hr>
