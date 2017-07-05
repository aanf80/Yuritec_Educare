<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 02:19 PM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/articletype.js'); ?>"></script>
<div class="container">
    <h2>Tipo de Artículos</h2>

    <div id="modalArticle_Type" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Modificar Tipo de artículo</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditArticle_Type">
                        <div class="form-group">
                            <label class="control-label" for="nombreTipo_Articulo2">Tipo de Articulo</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-th-list"></i>
                                </span>
                                <input class="form-control" id="nombreTipo_Articulo2" name="nombreTipo_Articulo2" placeholder="Nombre de la Tipo_Articulo">
                                <input type="hidden" id="article_typeid" name="article_typeid">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary btn-warning" id="btnModificar">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Aqui inicia el formulario-->
    <div class="col-md-8">
        <form id="frmTipo_Articulo">
            <label>Nombre</label>

            <input type="text" class="form-control" id="nombreTipo_Articulo" name="nombreTipo_Articulo"
                   placeholder="Nombre del apartado temático">
            <div class="row">&nbsp;</div>
            <button type="submit" class="btn btn btn-warning"><span
                    class="glyphicon glyphicon-floppy-save"></span>
                Guardar
            </button>
        </form>
    </div>


    <br/><br/>
    <br/><br/>

    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="tbTipo_Articulo" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Clave</th>
                    <th>Apartado Temático</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

