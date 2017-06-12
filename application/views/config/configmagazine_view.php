<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 12/06/2017
 * Time: 01:46 PM
 */
?>

<div class="container">

    <h4>Portada</h4>
    <input class="form-control" id="rolename2" name="rolename2" placeholder="Nombre del rol">
    <h4>Periodo de recepción</h4>

    <label>Fecha de inicio:</label>

        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker1').datetimepicker();
                });
            </script>
        </div>

    <label>Fecha final:</label>

        <div class="row">
            <div class='col-sm-6'>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker2'>
                        <input type='text' class="form-control" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker2').datetimepicker();
                });
            </script>
        </div>

    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-disk"></span> Publicar</button>

