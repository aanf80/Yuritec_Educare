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
