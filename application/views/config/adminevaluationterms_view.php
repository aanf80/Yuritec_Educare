<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 04/07/2017
 * Time: 09:19 PM
 */

?>


<script type="text/javascript" src="<?php echo base_url('assets/js/evaluation_terms.js'); ?>"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Políticas</h1>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/settings/terms', 'Políticas de Operación', 'class="link-class"') ?>
                </li>
                <li class="active">Políticas de Evaluación</li>
            </ol>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Políticas de Evaluación</h3>
            </div>

        </div>

        <textarea name="content" id="content" rows="6" class="form-control"></textarea>
        <div class="row">&nbsp;</div>
        <button id="btnGuardarPoliticas" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
