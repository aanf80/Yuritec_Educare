<div class="container">
<br/>
    <!-- Intro Content -->
    <div class="business">
    <h3 class="page-header"><?php echo $about_title; ?></h3>
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><?php echo anchor('/about', $about_title, 'class="link-class"') ?></li>
                    <li role="presentation"><?php echo anchor('/about/objectives', $about_obj, 'class="link-class"') ?></li>
                    <li role="presentation"><?php echo anchor('/about/policies', $about_op, 'class="link-class"') ?></li>
                    <li role="presentation"><?php echo anchor('/about/policies', $about_ep, 'class="link-class"') ?></li>
                </ul>

            </div>
        <br/>
       
        <div class="row">
            <div class="col-md-6">
                <img src="<?php echo base_url('assets/img/logo_naranja.png'); ?>" class="img-responsive" width="750" height=450" alt=""/>

            </div>
            <div class="col-md-6">
                <h2>Yurítec Educare</h2>
                <p>En dialecto wixarika el nombre de la revista significa "La verdad en tecnología, a través de la educación”.</p>
            </div>
        </div>
    </div>

    <!-- /.row -->

    <hr>

