<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 28/06/2017
 * Time: 09:31 PM
 */
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ver revistas</h1>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/settings/magazine', 'Nueva revista', 'class="link-class"') ?>
                </li>
                <li>
                    <?php echo anchor('/settings/select_articles', 'Seleccionar articulos', 'class="link-class"') ?>
                </li>
                <li class="active">Ver Revistas</li>
            </ol>
        </div>
    </div>


    <div class="row">

        <select>
            <option>Seleccione una revista</option>
        </select>
        <br/>
        <button class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Aceptar</button>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">



            <img src="" class="img-responsive" width="100" height="100"/>
            <br>
            <br>
            <button class="btn btn-success btn-block"><span class="glyphicon glyphicon-edit"></span> Editar</button>
            <br/>
            <button class="btn btn-danger btn-block"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
            <br/>
            <button class="btn btn-warning btn-block"><span class="glyphicon glyphicon-check"></span> Publicar</button>

        </div>

        <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12">
            <h1 class="text-center" id="nombre"><strong></strong></h1>
            <hr>

            <div class="col-lg-12 ">
                <div class="col-lg-4">
                    <h4><strong>Institución</strong></h4>
                    <hr>
                </div>
                <div class="col-lg-8">
                    <h4 id="institucion"></h4>
                    <hr>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="col-lg-4">
                    <h4><strong>E-mail</strong></h4>
                    <hr>
                </div>
                <div class="col-lg-8">
                    <h4 id="email"></h4>
                    <hr>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <h4><strong>Firma</strong></h4>
                    <hr>
                </div>
                <div class="col-lg-8">
                    <h4 id="firma"></h4>
                    <hr>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <h4><strong>País</strong></h4>
                    <hr>
                </div>
                <div class="col-lg-8">
                    <h4 id="country"></h4>
                    <hr>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <h4><strong>Resumen<br>biográfico</strong></h4>
                </div>
                <div class="col-lg-8">
                    <h4></h4>
                </div>
            </div>
            <br/>

        </div>



    </div>

    <hr>