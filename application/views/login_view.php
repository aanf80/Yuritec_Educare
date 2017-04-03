<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 31/03/2017
 * Time: 11:03 AM
 */
?>
<div class="container">
    <h3 class="page-header">Iniciar sesión</h3>

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 well" style="padding-bottom: 40px">
            <h1 class="text-center" style="color: #555; font-size: 20px; font-weight: 400">Inicie sesión para continuar</h1>
            <div class="">
                <img class="center-block img-responsive img-rounded"
                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120">
                <div class="help-block"></div>
                <form id="formLogin" name="">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Correo electrónico" required="" autofocus="">
                        <div class="help-block"></div>
                        <input type="password" class="form-control" placeholder="Contraseña" required="">
                        <div class="help-block"></div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-lg btn-warning btn-block" type="submit">Iniciar sesión</button>
                        <div class="help-block"></div>
                    </div>


                    <div class="form-group">
                        <label class="checkbox pull-left" style="margin-left: 25px"><input type="checkbox" value="remember-me">Recordarme</label>

                        <div id="link">
                            <a href="#" class="pull-right clearfix" style="margin-top: 10px; margin-right: 5px">¿Olvidaste tú contraseña?</a>
                            <a href="<?php echo site_url('/user/sign_up') ?>" class="text-center center-block col-lg-12">Registrarse </a>
                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>
    <hr>

