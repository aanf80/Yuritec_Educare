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
<div class="container">

    <h3>Título</h3>
    <input type="text" class="form-control" id="txtTitle" required>
    <div class="row">&nbsp;</div>
    <h3>Apartado Temático</h3>
    <select name="tipoAct" id="tipoAct" class="form-control">
        <option>Ciencias de la Tierra</option>
        <option>Arquitectura, Urbanismo y Diseño de Edificaciones</option>
        <option>Tecnologías de la Información y Comunicación</option>
        <option>Ingeniería Eléctrica y Electrónica</option>
        <option>Administración de Recursos Humanos y empresas</option>
        <option>Ingenierían Química y Bioquímica</option>
    </select>
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



