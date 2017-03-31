<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Revista Científica ITTepic</title>

    <!-- Bootstrap Core CSS -->

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.growl.css'); ?>">
    <link href="<?php echo base_url('assets/css/modern-business.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-datetimepicker.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.dataTables.min.css')?>">

    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.validate.js'); ?>"></script>
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
<div align="center">
    <!-- <img src="http://www.ittepic.edu.mx/images/header2.jpg" class="img-responsive" alt=""/> -->
    <img src="<?php echo base_url('assets/img/banner.jpg'); ?>" class="img-responsive" alt=""/>
</div>
<div id="nav">


    <nav class="navbar navbar-inverse ">

        <div class="container">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('/inicio') ?>">Inicio</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php echo anchor('/nosotros', '¿Quiénes somos?', 'class="link-class"') ?>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Artículos <b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php echo anchor('/articulo', 'Mis Artículos', 'class="link-class"') ?>
                            </li>
                            <li>
                                <?php echo anchor('/articulo/editor', 'Editor', 'class="link-class"') ?>
                            </li>
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <?php echo anchor('/contacto', 'Contacto', 'class="link-class"') ?>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuraciones<b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <?php echo anchor('/revista/apartados_tematicos', 'Apartados temáticos', 'class="link-class"') ?>
                            </li>
                            <li>
                                <a href="magazine.php">Gestión de Revista</a>
                            </li>
                            <li>
                                <a href="users.php">Gestión de Usuarios</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing Table</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="copies.php">Ejemplares</a>
                    </li>
                    <li>
                        <a href="map.php">Mapa del Sitio</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi Perfil <b
                                    class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="profile.php">Datos personales</a>
                            </li>
                            <li>
                                <a href="password.php">Seguridad</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo site_url('/login') ?>"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
</div>