<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 02:19 PM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/category.js'); ?>"></script>

<div class="container">

    <div id="modalCategory" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Modificar Categoria</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditCategory">
                        <div class="form-group">
                            <label class="control-label" for="nombreCategoria2">Categoria</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-th-list"></i>
                                </span>
                                <input class="form-control" id="nombreCategoria2" name="nombreCategoria2" placeholder="Nombre de la Categoria">
                                <input type="hidden" id="categoryid" name="categoryid">
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
    <div class="col-md-10">
        <div class="business">
        <form id="frmCategoria">
            <h2>Nuevo Apartado Temático</h2>
            <label>Nombre</label>
            <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria"
                   placeholder="Nombre del apartado temático">
            <div class="row">&nbsp;</div>
            <button type="submit" class="btn btn btn-warning"><span
                    class="glyphicon glyphicon-floppy-save"></span>
                Guardar
            </button>
        </form>
    </div>


    <br/>
    <br/>



        <div class="business">
            <h3>Ver Apartados Temáticos</h3>
            <table id="tbCategoria" class="table table-striped table-bordered">
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
