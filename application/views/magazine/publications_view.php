<?php

/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 07/04/2017
 * Time: 11:02 AM
 */
?>
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Publicaciones
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php">Inicio</a></li>
                <li class="active">Ejemplares</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- First Blog Post -->
            <?php foreach($magazines as $magazine) { ?>
                <h2>
                    <a href="<?php echo site_url('/magazine/articles/'.$magazine->magazineid) ?>"><?php echo "Volumen ".$magazine->volume." Número ".$magazine->number  ?></a>
                    <small><?php echo $magazine->period." ".$magazine->year ?></small>
                </h2>

                <p><i class="fa fa-clock-o"></i> <?php echo "Fecha de publicación: ".$magazine->date ?></p>
                <hr>
                <div align="center">
                    <a href="<?php echo site_url('/magazine/articles/'.$magazine->magazineid) ?>">
                        <img class="img-responsive img-hover" src="assets/img/imgabout.png" width="400" height=100" alt="">
                    </a>
                </div>
                <br/>
                <a class="btn btn-warning" href="<?php echo site_url('/magazine/articles/'.$magazine->magazineid) ?>">Ver artículos <i class="fa fa-angle-right"></i></a>

                <hr>
                <?php
            }
            ?>
            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Older</a>
                </li>
                <li class="next">
                    <a href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Buscar</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                        </span>
                </div>
                <!-- /.input-group -->
            </div>

            <!-- Blog Categories Well -->
            <div class="well">
                <h4>Apartados Temáticos</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled">

                            <?php foreach($categories as $cat) { ?>
                                <li><a href="#"><?php echo $cat->categoryname;  ?></a>
                                </li>

                                <?php
                            }
                            ?>


                        </ul>
                    </div>

                </div>
                <!-- /.row -->
            </div>

            <!-- Side Widget Well -->
            <div class="well">
                <h4>Side Widget Well</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
            </div>

        </div>

    </div>
    <!-- /.row -->

    <hr>