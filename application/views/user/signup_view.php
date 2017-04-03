<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 06/03/2017
 * Time: 11:35 AM
 */
?>


<div class="container">

    <h3 class="page-header">Registrarse</h3>

    <div class="row">

        <div class="col-lg-5">
            <form name="" id="formRegistro">
                <div class="form-group">
                    <label for="email">Correo electrónico *</label>
                    <input type="email" placeholder="jorge@ittepic.edu.mx" id="email" required data-validation-required-message="Por favor ingresa tu correo electrónico." class="form-control">
                    <div class="help-block">Será su nombre de usuario</div>
                </div>
                <div class="form-group">
                    <label for="psw">Contraseña *</label>
                    <input type="password" id="psw" required data-validation-required-message="Por favor ingresa tu contraseña."class="form-control">
                    <div class="help-block"></div>
                </div>

                <div class="form-group">
                    <label for="conf-psw">Confirmar contraseña *</label>
                    <input type="password" required data-validation-required-message="Por favor confirma tu contraseña." class="form-control" id="conf-psw">
                    <div class="help-block"></div>
                </div>

                <div class="form-group">
                    <label for="fotoPerfil">Seleccionar foto de perfil</label>
                    <input type="file" id="fotoPerfil">
                </div>

                <div class="form-group">
                    <label>Nombre *</label>
                    <input type="text" placeholder="Nombre(s)" required data-validation-required-message="Por favor ingresa tu nombre." class="form-control">
                    <div class="help-block"></div>
                    <input type="text" placeholder="Apellidos" required data-validation-required-message="Por favor ingresa tus apellidos." class="form-control">
                </div>

                <div class="form-group">
                    <label for="iniciales">Iniciales</label>
                    <input type="text" id="iniciales" class="form-control">
                    <span class="help-block">Ej. Axel García Pérez = AGP</span>
                    <div class="help-block"></div>
                </div>

                <div class="form-group">
                    <label for="firma">Firma</label>
                    <input type="text" id="firma" class="form-control">
                    <div class="help-block"></div>
                </div>

                <div class="form-group">
                    <div><label>Sexo</label></div>
                    <label class="radio-inline">
                        <input type="radio" value="f" name="sexo" id="fem"> Femenino
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="m" name="sexo" id="masc"> Masculino
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="o" name="sexo" id="otro"> Otro
                    </label>
                    <div class="help-block"></div>
                </div>

                <div class="form-group">
                    <label for="institucion">Institución</label>
                    <textarea id="institucion" class="form-control" rows="2"></textarea>
                    <div class="help-block">Ej. Instituto tecnológico de Tepic</div>
                </div>
                <div class="form-group">
                    <div>
                        <label for="resumen">Resumen biográfico</label>
                        <textarea name="" id="resumen" rows="6" class="form-control"></textarea>
                        <div class="help-block">Ej. Departamento y Rango</div>
                    </div>
                </div>
                <h4><strong>Domicilio</strong></h4>
                <div class="form-group row">
                    <div class="col-md-9">
                        <label for="calle">Calle</label>
                        <input type="text" id="calle" class="form-control">
                        <div class="help-block"></div>

                        <label for="colonia">Colonia</label>
                        <input type="text" id="colonia" class="form-control">
                        <div class="help-block"></div>
                    </div>

                    <div class="col-lg-3">
                        <label for="numero">Número</label>
                        <input type="number" id="numero" class="form-control">
                        <div class="help-block"></div>

                        <label for="cp">C. P.</label>
                        <input type="number" id="cp" class="form-control">
                        <div class="help-block"></div>
                    </div>
                    <div class="col-lg-6">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" id="ciudad" class="form-control">
                        <div class="help-block"></div>
                    </div>
                    <div class="col-lg-6">
                        <label for="estado">Estado</label>
                        <input type="text" id="estado" class="form-control">
                        <div class="help-block"></div>
                    </div>
                    <div class="col-lg-12">
                        <label class="col-lg-12" for="pais">País</label>
                        <select class="form-control" id="pais">
                            <option value=""></option>
                            <option value="">México</option>
                            <option value="">Estados Unidos</option>
                            <option value="">Canadá</option>
                            <option value="">Argentina</option>
                        </select>
                        <div class="help-block"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label>* Campo requerido</label>
                    <div class="checkbox">
                        <label for="confirm"><input id="confirm" type="checkbox">Enviar correo electrónico de
                            confirmación con usuario y contraseña</label>
                    </div>
                </div>
                <div id="success"></div>
                <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-save"></span> Registrarse</button>
                <button type="clear" class="btn btn-warning"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</button>
            </form>
        </div>
    </div>
    <!-- /.row -->

    <hr>

