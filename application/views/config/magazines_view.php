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

    <div id="modalSelectedArticles" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Artículos Seleccionados</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditSelectedArticles">
                        <div class="form-group">
                            <label class="control-label" for="articleid2">Artículos Seleccionados</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-file"></i>
                                </span>
                                <select name="articleid" id="articleid2" class="form-control"></select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary btn-danger" id="btnQuitarArticulos">
                        <i class="glyphicon glyphicon-minus-sign"></i> Quitar</button>
                </div>
            </div>
        </div>
    </div>


    <form id="frmMagazine" enctype="multipart/form-data">

        <div class="form-group">
            <div class="col-lg-6">
                <label class="control-label">Revista</label>
                <select name="magazineid" id="magazineid2" class="form-control">
                    <option value="0">Seleccione una revista</option>
                </select>
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
                    <option value="0">Seleccione un periodo</option>
                    <option>Enero - Junio</option>
                    <option>Agosto - Diciembre</option>
                </select>
                <div class="help-block"></div>

                <div class="form-group">
                    <label for="photo">Seleccionar foto de portada</label>
                    <input type="file" id="cover2"  name="cover">
                </div>
                <div class="help-block"></div>

                <div class="form-group">
                    <label for="photo">Seleccionar revista PDF de la revista</label>
                    <input type="file" id="file2"  name="file">
                </div>
                <div class="help-block"></div>


            </div> <!-- tamaño de pantalla-->

        </div> <!-- form group-->

        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>

    </form>

    <button id="btnPublicarRevista" class="btn btn-warning"><i class="glyphicon glyphicon-globe"></i> Publicar</button>
    <button id="btnEditararRevista" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Editar</button>
    <button id="btnEliminarRevista" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Eliminar</button>
    <button id="btnVerArticulos" class="btn btn-primary"><i class="glyphicon glyphicon-file"></i> Ver artículos</button>








