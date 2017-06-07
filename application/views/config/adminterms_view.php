
<script>  tinymce.init({
        selector: "textarea",
        language : "es_MX",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
        ],
        save_enablewhendirty: true
    }); </script>
<script type="text/javascript" src="<?php echo base_url('assets/js/category.js'); ?>"></script>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Políticas de Operación</h3>
        </div>

    </div>

    <textarea name="bio" id="bio" rows="6" class="form-control"></textarea>
    <button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i>Guardar</button>