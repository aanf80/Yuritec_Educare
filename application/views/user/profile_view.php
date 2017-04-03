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
                <li><a href="index.php">Inicio</a>
                </li>
                <li class="active">Perfil</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <img src="<?php echo base_url('assets/img/Android.png'); ?>" class="img-responsive"  alt=""/>
            <br>
            <br>
            <a href = "editarPerfil.html" class="btn btn-warning btn-block">Editar perfil</a>
        </div>

        <div class="col-lg-9">
            <h1 class="text-center" id="nombre"><strong>Jorge González Hernández</strong></h1>
            <hr>

            <div class="col-lg-12">
                <div class="col-lg-4">
                    <h4><strong>Institución</strong></h4>
                    <hr>
                </div>
                <div class="col-lg-8">
                    <h4 id="institucion">Instituto tecnológico de Tepic</h4>
                    <hr>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="col-lg-4">
                    <h4><strong>E-mail</strong></h4>
                    <hr>
                </div>
                <div class="col-lg-8">
                    <h4 id="email">jorge@ittepic.edu.mx</h4>
                    <hr>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <h4><strong>Firma</strong></h4>
                    <hr>
                </div>
                <div class="col-lg-8">
                    <h4 id="firma">Jorge Glez.</h4>
                    <hr>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <h4><strong>País</strong></h4>
                    <hr>
                </div>
                <div class="col-lg-8">
                    <h4 id="pais">México</h4>
                    <hr>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <h4><strong>Resumen<br>biográfico</strong></h4>
                </div>
                <div class="col-lg-8">
                    <h4>Dr. en Educación por Nova Southeastern University.
                        Actualmente, profesor de la Universidad Autónoma de Nayarit y de Nova Southeastern University, y Director de Educación a Distancia de la Universidad Autónoma de Nayarit.</h4>
                </div>
            </div>
        </div>
    </div>

    <hr>
