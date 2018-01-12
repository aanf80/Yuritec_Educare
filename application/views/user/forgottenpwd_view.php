<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 08/08/2017
 * Time: 12:06 AM
 */
?>
<script type="text/javascript" src="<?php echo base_url('assets/js/user.js'); ?>"></script>
<div class="container">
<br/>
<div class="business">
<h3 class="page-header"><?php echo $login_forgot; ?></h3>

        <div class="form-group">
            <div class="col-lg-6">

                <!-- Datos Personales-->
                <label class="control-label"><?php echo $login_forgotMsg; ?></label>
                <input type="text" class="form-control" id="email" name="email">
                <div class="help-block"></div>



            </div> <!-- tamaño de pantalla-->

        </div> <!-- form group-->

        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>

        <button type="button" id="btnForPass" class="btn btn-warning"><?php echo $login_send; ?></button>
</div>
<br/>
   



