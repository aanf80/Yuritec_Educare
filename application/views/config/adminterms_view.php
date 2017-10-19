
<script type="text/javascript" src="<?php echo base_url('assets/js/terms.js'); ?>"></script>
<div class="container">



    <div class="col-lg-12">
        <div class="business">
            <h2 class="page-header">Políticas</h2>
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                     <li role="presentation" class="active">  <?php echo anchor('/settings/terms', 'Políticas de Operación', 'class="link-class"') ?></li>
                    <li role="presentation"> <?php echo anchor('/settings/evaluation_terms', 'Políticas de Evaluación', 'class="link-class"') ?></li>
                </ul>

            </div>
            <h3 class="page-header">Políticas de Operación</h3>

            <textarea name="content" id="content" rows="6" class="form-control"></textarea>
            <div class="row">&nbsp;</div>
            <button id="btnGuardarPoliticas" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar</button>
        </div>
    </div>


