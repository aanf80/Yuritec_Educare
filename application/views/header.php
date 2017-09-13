
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Yurítec Educare</title>

    <!-- Bootstrap Core CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.growl.css'); ?>">
    <link href="<?php echo base_url('assets/css/modern-business.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.dataTables.min.css')?>">

    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.validate.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/additional-methods.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/tinymce/tinymce.min.js')?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/dataTables.responsive.min.js')?>"></script>


    <script src="<?php echo base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
    <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script src="<?php echo base_url('assets/js/plugins/jqBootstrapValidation.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/Moment.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/sweetalert.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/bootstrap-datetimepicker.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/plugins/bootstrap-datetimepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.growl.js'); ?>"></script>

</head>
<body>
<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="<?php echo base_url('home'); ?>"><img src="<?php echo base_url('assets/img/header3.jpg'); ?>" alt=""/></a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!--head-bottom-->
    <div class="head-bottom">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>


            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo site_url('/home') ?>"><span class="glyphicon glyphicon-home"></span></a>
                    </li>
                    <li>
                        <?php echo anchor('/about', 'Acerca de', 'class="link-class"') ?>
                    </li>
                    <li>
                        <?php echo anchor('/committee', 'Comité Editorial', 'class="link-class"') ?>
                    </li>
                    <li>
                        <?php echo anchor('/contact', 'Contacto', 'class="link-class"') ?>
                    </li>
                    <?php

                    if($this->session->userdata('roleid') == 1){

                        ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuraciones<b
                                        class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <?php echo anchor('/settings/categories', 'Apartados temáticos', 'class="link-class"') ?>
                                </li>
                                <li>
                                    <?php echo anchor('/committee/new_member', 'Comité editorial', 'class="link-class"') ?>
                                </li>
                                <li>
                                    <?php echo anchor('/settings/contact', 'Contacto', 'class="link-class"') ?>
                                </li>
                                <li>
                                    <?php echo anchor('/settings/objectives', 'Objetivos', 'class="link-class"') ?>
                                </li>
                                <li>
                                    <?php echo anchor('/user/profile', 'Perfil', 'class="link-class"') ?>
                                </li>
                                <li>
                                    <?php echo anchor('/settings/terms', 'Políticas', 'class="link-class"') ?>
                                </li>
                                <li>
                                    <?php echo anchor('/settings/magazine', 'Revista', 'class="link-class"') ?>
                                </li>
                                <li>
                                    <?php echo anchor('/settings/roles', 'Roles de usuario', 'class="link-class"') ?>
                                </li>
                                <li>
                                    <?php echo anchor('/settings/article_type', 'Tipos de artículos', 'class="link-class"') ?>
                                </li>
                                <li>
                                    <?php echo anchor('/user/users_new', 'Usuarios', 'class="link-class"') ?>
                                </li>



                            </ul>
                        </li>
                        <?php
                    }
                    ?>

                    <li>
                        <?php echo anchor('/magazine', 'Ejemplares', 'class="link-class"') ?>
                    </li>
                    <?php
                    //  echo "<li> jejeje".$this->session->userdata('id')."</li>";
                    if($this->session->userdata('roleid') == ""){

                        ?>
                        <li>
                            <a href="<?php echo site_url('/login') ?>"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a>
                        </li>
                        <?php
                    }
                    else {
                        ?>
                        <li>
                            <a href="<?php echo site_url('/login/sign_out') ?>"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
    <!--head-bottom-->
</div> <!-- /header -->





