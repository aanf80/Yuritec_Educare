<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 12/06/2017
 * Time: 01:46 PM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/article.js'); ?>"></script>
<div class="container">

    <label class="control-label">Volumen</label>
    <input type="text" class="form-control" id="volume" name="volume">
    <div class="help-block"></div>

    <label class="control-label">Número</label>
    <input type="text" class="form-control" id="number" name="number">
    <div class="help-block"></div>

    <label class="control-label">Periodo</label>
    <select name="period" id="period" class="form-control">
        <option>Enero - Junio</option>
        <option>Agosto - Diciembre</option>
    </select>
    <div class="help-block"></div>

    <label class="control-label">Año</label>
    <input type="text" class="form-control" id="year" name="year">
    <div class="help-block"></div>
    <div class="form-group">

        <label for="photo">Seleccionar foto de portada</label>
        <input type="file" id="cover"  name="cover">
    </div>

    <label class="control-label">Artículos selecionados</label>
    <br/>
    <br/>



    <div class="row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <table id="tbArticle" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Clave</th>
                    <th>Titulo</th>
                    <th>Fecha de Creación</th>
                    <th>Estado</th>
                    <th>Portada</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <br/>
<br/>
<button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-disk"></span> Publicar</button>

