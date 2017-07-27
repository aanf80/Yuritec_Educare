<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 25/07/2017
 * Time: 07:51 PM
 */

?>

<script type="text/javascript" src="<?php echo base_url('assets/js/committee.js'); ?>"></script>

<div class="container">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Miembros del comité <small>Comité Editorial</small></h1>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/committee/new_member', 'Nuevo Miembro', 'class="link-class"') ?>
                </li>
                <li class="active">Miembros del comité</li>
            </ol>
        </div>
    </div>

    <div id="modalMembers" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Modificar Miembros</h3>
                </div>
                <div class="modal-body">
                    <form id="frmEditMember">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!-- Datos Personales-->
                            <input  type="hidden" class="form-control" id="ec_memberid" name="ec_memberid">

                            <label class="control-label">Nombre</label>
                            <input type="text" class="form-control" id="ec_name2" name="ec_name">
                            <div class="help-block"></div>

                            <label class="control-label">Puesto</label>
                            <input type="text" class="form-control" id="ec_position2" name="ec_position">
                            <div class="help-block"></div>

                            <label for="resumen">Resumen biográfico</label>
                            <textarea name="ec_bio" id="ec_bio2" rows="6" class="form-control" placeholder="Ej. Departamento y Rango"></textarea>
                            <div class="help-block"></div>

                            <label class="control-label">Cuenta de Facebook</label>
                            <input type="text" class="form-control" id="ec_fbaccount2" name="ec_fbaccount">
                            <div class="help-block"></div>

                            <label class="control-label">Cuenta de Twitter</label>
                            <input type="text" class="form-control" id="ec_twaccount2" name="ec_twaccount">
                            <div class="help-block"></div>


                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button id="btnModificarMiembro" type="button" class="btn btn-sm btn-warning ">Guardar</button>
                </div>
            </div>
        </div>
    </div> <!-- Fin modal editar miembro-->

    <div id="modalImageMember" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h3>Cambiar Fotografía</h3>
                </div>
                <div class="modal-body">
                    <form id="frmChangeMemberPhoto" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label" for="ec_photo2">Seleccione fotografía</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-picture"></i>
                                </span>
                                <input type="file" id="ec_photo2"  name="ec_photo">
                            </div>

                            <input type="hidden" id="ec_memberid2" name="ec_memberid">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button id="btnCambiarFotoMiembro" type="button" class="btn btn-sm btn-warning ">Guardar</button>
                </div>
            </div>
        </div>
    </div>





    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="tbMembers" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Clave</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Descripción</th>
                    <th>Cuenta de Facebook</th>
                    <th>Cuenta de Twitter</th>
                    <th>Operaciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
