<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 28/06/2017
 * Time: 09:31 PM
 */
?>
<script>  tinymce.init({
        selector: "textarea",
        language : "es_MX",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
        ],
        toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | sizeselect | fontselect |  fontsizeselect | forecolor backcolor',
        //toolbar2: " | bold italic | ",
        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
        save_enablewhendirty: true
    }); </script>
<script type="text/javascript" src="<?php echo base_url('assets/js/magazine.js'); ?>"></script>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mostrar artículo en línea</h1>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/settings/magazine', 'Nueva revista', 'class="link-class"') ?>
                </li>
                <li>
                    <?php echo anchor('/settings/select_articles', 'Seleccionar articulos', 'class="link-class"') ?>
                </li>
                <li>
                    <?php echo anchor('/settings/magazines', 'Ver Revistas', 'class="link-class"') ?>
                </li>
                <li class="active">Mostrar artículo en línea</li>

            </ol>
        </div>
    </div>





                <label class="control-label">Revista</label>
                <select name="period" id="period" class="form-control">
                    <option>Seleccione una revista</option>
                    <option>Volumen 0, número 1 Enero - Junio 2017</option>
                    <option>Volumen 1, número 1Agosto - Diciembre 2017</option>
                </select>

                <label class="control-label">Artículo</label>
                <select name="period" id="period" class="form-control">
                    <option>Seleccione un artículo</option>
                    <option>Volumen 0, número 1 Enero - Junio 2017</option>
                    <option>Volumen 1, número 1Agosto - Diciembre 2017</option>
                </select>

                <h3>Contenido</h3>
                <textarea name="content" id="content"></textarea>
                <div class="row">&nbsp;</div>
                <div class="row">&nbsp;</div>
                <button type="submit" class="btn btn-warning" id="btnGuardar"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>


        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>











