<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 06/03/2017
 * Time: 11:35 AM
 */


if ($this->session->userdata('site_lang')=="spanish" ||$this->session->userdata('site_lang')==null ){
        $example_email = "Ejemplo: jorge@ittepic.edu.mx";
        $example_institution = "Ejemplo: Instituto Tecnológico de Tepic";
        $example_bio = "Contacto";       
}else{
    $example_email = "Example: jorge@ittepic.edu.mx";
    $example_institution = "Example: Oxford University";
    $example_bio = "Contacto";
}
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/register.js'); ?>"></script>
<div class="container">
<div class="business">
    <h3 class="page-header"><?php echo $login_signUp; ?></h3>

    <form id="frmRegister" enctype="multipart/form-data">
        <div class="form-group">
            <div class="col-lg-6">

                <!-- Datos Personales-->
                <label class="control-label"><?php echo $profile_email."*"; ?></label>
                <input type="email" class="form-control" id="email" name="email" placeholder=<?php echo $example_email;?>>
                <div class="help-block" id="invalidemail"></div>

                <label class="control-label"><?php echo $profile_pwd."*"; ?></label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="help-block"></div>

                <label class="control-label"><?php echo $profile_cpwd."*"; ?></label>
                <input type="password" class="form-control" id="confpassword" name="confpassword">
                <div class="help-block" id="equalpasswd"></div>

                <label class="control-label"><?php echo $profile_name."*"; ?></label>
                <input type="text" class="form-control" id="username" name="username">
                <div class="help-block"></div>
                <label for="resumen"><?php echo $profile_lname."*"; ?></label>
                <input type="text" class="form-control" id="lastname" name="lastname">
                <div class="help-block"></div>
                <label for="resumen"><?php echo $profile_mname; ?></label>
                <input type="text" class="form-control" id="maternalsurname" name="maternalsurname">
                <div class="help-block"></div>

                <label class="control-label"><?php echo $profile_ini; ?></label>
                <input type="text" class="form-control" id="initials" name="initials">
                <div class="help-block"></div>

                <label class="control-label"><?php echo $profile_sign; ?></label>
                <input type="text" class="form-control" id="sign" name="sign">
                <div class="help-block"></div>

                <div id="gender">
                    <div><label><?php echo $profile_gender; ?></label></div>
                    <label class="radio-inline">
                        <input type="radio" value="F" name="gender" id="r1" checked> <?php echo $profile_female; ?>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="M" name="gender" id="r2"><?php echo $profile_male; ?>
                    </label>
                </div>
                <div class="help-block"></div>

                <label class="control-label"><?php echo $profile_institution."*"; ?></label>
                <input type="text" class="form-control" id="institute" name="institute" placeholder=<?php echo $example_institution;?>>
                <div class="help-block"></div>

                <label for="resumen"><?php echo $profile_bio; ?></label>
                <textarea id="bio" name = "bio" rows="6" class="form-control"></textarea>
                <div class="help-block"></div>

                <h3><strong><?php echo $profile_address; ?></strong></h3>


                <label class="control-label"><?php echo $profile_street; ?></label>
                <input type="text" class="form-control" id="address" name="address">
                <div class="help-block"></div>


                <label class="control-label"><?php echo $profile_neighborhood; ?></label>
                <input type="text" class="form-control" id="neighborhood" name="neighborhood">
                <div class="help-block"></div>


                <label class="control-label"><?php echo $profile_streetnumber; ?></label>
                <input type="text" class="form-control" id="streetnumber" name="streetnumber">
                <div class="help-block"></div>

                <label class="control-label"><?php echo $profile_zipcode; ?></label>
                <input type="text" class="form-control" id="zipcode" name="zipcode">
                <div class="help-block"></div>

                <label class="control-label"><?php echo $profile_city; ?></label>
                <input type="text" class="form-control" id="city" name="city">
                <div class="help-block"></div>

                <label class="control-label"><?php echo $profile_state; ?></label>
                <input type="text" class="form-control" id="state" name="state">
                <div class="help-block"></div>

                <label class="control-label"><?php echo $profile_country; ?></label>
                <select name="country" id="country" class="form-control">
                    <option><?php echo $profile_mex; ?></option>
                    <option><?php echo $profile_usa; ?></option>
                    <option><?php echo $profile_spa; ?></option>
                    <option><?php echo $profile_arg; ?></option>
                    <option><?php echo $profile_uk; ?></option>
                </select>
                <div class="help-block"></div>



            </div> <!-- tamaño de pantalla-->

        </div> <!-- form group-->

        <div class="row">&nbsp;</div>
        <div class="row">&nbsp;</div>

        <button type="submit" class="btn btn-warning"><i class="glyphicon glyphicon-floppy-disk"></i>Guardar</button>
    </form>



</div>

