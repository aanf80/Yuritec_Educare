<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 26/03/2017
 * Time: 07:42 PM
 */
?>
<script>
    tinymce.init({selector: 'textarea'}
    );</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/article.js'); ?>"></script>
<div class="container">

    <h3>Título</h3>
    <input type="text" class="form-control" id="txtTitle" required>
    <div class="row">&nbsp;</div>
    <h3>Apartado Temático</h3>
    <select name="cbCategory" id="cbCategory" class="form-control"></select>
    <div class="row">&nbsp;</div>
    <h3>Resumen</h3>
    <textarea></textarea>
    <div class="row">&nbsp;</div>
    <h3>Palabras Clave</h3>
    <input type="text" class="form-control" id="txtClave" required>
    <div class="row">&nbsp;</div>
    <h3>Abstract</h3>
    <textarea></textarea>
    <div class="row">&nbsp;</div>
    <h3>Keywords</h3>
    <input type="text" class="form-control" id="txtKey" required>
    <div class="row">&nbsp;</div>
    <h3>Contenido</h3>
    <textarea></textarea>
    <div class="row">&nbsp;</div>

    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-open-file"></span> Enviar para revisión</button>
    <div class="row">&nbsp;</div>



    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>



