<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 02:19 PM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/user.js'); ?>"></script>
<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h3>Consulta de usuarios</h3>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/user/users_new', 'Consulta de usuarios', 'class="link-class"') ?>
                </li>
                <li class="active">Consulta de usuarios</li>

            </ol>
        </div>
    </div>
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
    <div class="col-md-8">
    </div>
    <div class="row">&nbsp;</div>
    <div class ="row"><hr></div>
    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="tbUsers" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Género</th>
                    <th>Domicilio</th>
                    <th>Código Postal</th>
                    <th>Ciudad</th>
                    <th>País</th>
                    <th>Correo electrónico</th>
                    <th>Contraseña
                    </th>
                    <th>Firma</th>
                    <th>Posición</th>
                    <th>Instituto</th>
                    <th>Rol de usuario</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

