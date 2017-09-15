<script type="text/javascript" src="<?php echo base_url('assets/js/contact.js'); ?>"></script>
<div class="container">

    <br>
    <!-- Content Row -->
    <div class="business">
        <h3>Contacto</h3>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Map Column -->
        <div class="col-md-8">
            <!-- Embedded Google Map -->
            <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3712.691934808465!2d-104.86708748592687!3d21.480601077577123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842737499a6b4f7d%3A0x35752706336de29a!2sInstituto+Tecnologico+de+Tepic!5e0!3m2!1sen!2smx!4v1488425951200"></iframe>
        </div>
        <!-- Contact Details Column -->

        <?php
        //if($magazines != false){
        foreach ($contact as $con) { ?>
            <div class="col-md-4">
                <h3>Detalles de contacto</h3>
                <p>
                    <?php echo $con->address ?>
                </p>
                <p><i class="fa fa-phone"></i>
                    <abbr title="Telefono">P</abbr>:<?php echo $con->phone ?>  Ext. <?php echo $con->extension ?>  </p>
                <p><i class="fa fa-envelope-o"></i>
                    <abbr title="Correo electrónico">E</abbr>: <a href="mailto:comunicacion@ittepic.edu.mx">comunicacion@ittepic.edu.mx</a>
                </p>
                <p><i class="fa fa-clock-o"></i>
                    <abbr title="Horario de atención">H</abbr>: <?php echo $con->schedule ?></p>
                <div class="soci">
                    <ul>
                        <li><a href="https://www.facebook.com/Tecnol%C3%B3gico-de-Tepic-Comunicaci%C3%B3n-1637242433180942/?fref=ts" class="facebook-1 chrome"> </a></li>
                    </ul>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
    <!-- /.row -->
<br/>
    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <div class="row">
        <div class="col-md-8">
            <h3>Envíanos un mensaje</h3>
            <form id="frmContact" id="contactForm" novalidate>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Nombre completo:</label>
                        <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Por favor ingresa tu nombre.">
                        <p class="help-block"></p>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Número de teléfono:</label>
                        <input type="tel" class="form-control" name="phone" id="phone" ">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Correo electrónico:</label>
                        <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Por favor ingresa tu correo electrónico.">
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Mensaje:</label>
                        <textarea rows="10" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Por favor ingresa tu mensaje." maxlength="999" style="resize:none"></textarea>
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-warning">Enviar mensaje</button>
            </form>
        </div>

    </div>
    <!-- /.row -->
    </div>
    <br/>