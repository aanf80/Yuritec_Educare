<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 02:19 PM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/role.js'); ?>"></script>
<div class="container">


    <div id="modalRole" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Modificar Rol</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditRole">


                        <div class="form-group">
                            <label class="control-label" for="rolename2">Nombre del rol</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input class="form-control" id="rolename2" name="rolename2" placeholder="Nombre del rol">
                                <input type="hidden" id="roleid" name="roleid">
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
                <h2>Roles de usuario</h2>
                <form id="frmRole">
                <label>Nombre</label>

                <input type="text" class="form-control" id="rolename" name="rolename"
                       placeholder="Nombre del rol de usuario">
                <div class="row">&nbsp;</div>
                <button type="submit" class="btn btn btn-warning"><span
                            class="glyphicon glyphicon-floppy-save"></span>
                    Guardar
                </button>
        </form>
            </div>



    <br/><br/>

        <div class="business">
            <table id="tbRole" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre del Rol</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

