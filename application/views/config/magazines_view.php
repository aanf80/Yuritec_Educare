<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 28/06/2017
 * Time: 09:31 PM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/magazine.js'); ?>"></script>

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

    <form id="frmMagazine" enctype="multipart/form-data">

        <div class="form-group">
            <div class="col-lg-6">

                <label class="control-label">Revista</label>
                <select name="magazineid" id="magazineid2" class="form-control">
                    <option value="0">Seleccione una revista</option>
                </select>

                <br/>

                <!-- Datos Personales-->
                <label class="control-label">Volumen</label>
                <input type="text" class="form-control" id="volume2" name="volume">
                <div class="help-block"></div>

                <label class="control-label">Número</label>
                <input type="text" class="form-control" id="number2" name="number">
                <div class="help-block"></div>

                <label class="control-label">Año</label>
                <input type="text" class="form-control" id="year2" name="year">
                <div class="help-block"></div>


                <label class="control-label">Periodo</label>
                <select name="period" id="period2" class="form-control">
                    <option>Enero - Junio</option>
                    <option>Agosto - Diciembre</option>
                </select>
                <div class="help-block"></div>

                <div class="form-group">
                    <label for="photo">Seleccionar foto de portada</label>
                    <input type="file" id="cover"  name="cover">
                </div>

                <div class="form-group">
                    <label for="photo">Seleccionar archivo PDF</label>
                    <input type="file" id="file"  name="file">
                </div>
                <div class="help-block"></div>

                <label>Artículos Seleccionados</label>
            </div> <!-- tamaño de pantalla-->

        </div> <!-- form group-->


        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table id="tbArticles2" class="table table-striped table-bordered">
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



        <button id="btnPublicarRevista" class="btn btn-warning"><i class="glyphicon glyphicon-globe"></i> Publicar</button>
        <button id="btnEditararRevista" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</button>
        <button id="btnEliminarRevista" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
    </form>

    <hr>





