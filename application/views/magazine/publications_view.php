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
        </div>
    </div>
    <!-- /.row -->

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- First Blog Post -->

            <?php
            if($magazines != false){
                foreach ($magazines as $magazine) { ?>
                    <h2>
                        <a href="<?php echo site_url('/magazine/articles/' . $magazine->magazineid) ?>"><?php echo "Volumen " . $magazine->volume . " Número " . $magazine->number ?></a>
                        <small><?php echo $magazine->period . " " . $magazine->year ?></small>
                    </h2>

                    <p><i class="fa fa-clock-o"></i> <?php echo "Fecha de publicación: " . $magazine->date ?></p>
                    <hr>
                    <div align="center">
                        <a href="<?php echo site_url('/magazine/articles/' . $magazine->magazineid) ?>">

                            <img class="img-responsive" src="<?php echo "/Yuritec_Educare/assets/images/".$magazine->cover?>" width="400" height=100" alt="" >
                        </a>
                    </div>
                    <br/>
                    <a class="btn btn-warning"
                       href="<?php echo site_url('/magazine/articles/' . $magazine->magazineid) ?>">Ver artículos <i
                            class="fa fa-angle-right"></i></a>

                    <hr>
                    <?php
                }
            }
            else{

                echo " <img class=\"img-responsive img-hover\" src=\"/Yuritec_Educare/assets/img/not-found.png\" ";

            }
            ?>
            <!-- Pager -->
            <div class="row text-center">
                <ul class="pagination">
                    <?php
                    /* Se imprimen los números de página */
                    echo $this->pagination->create_links();
                    ?>
                </ul>
            </div>
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

            <div class="well">
                <h4>Apartados Temáticos</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled">

                            <?php foreach($categories as $cat) { ?>
                                <li><a href="<?php echo site_url('/magazine/articlesByCategory/' .$cat->categoryid) ?>"><?php echo $cat->categoryname;  ?></a>
                                </li>

                                <?php
                            }
                            ?>


                        </ul>
                    </div>

                </div>

            </div>

            <div class="well">
                <h4>Tipos de artículo</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled">

                            <?php foreach($articletypes as $artype) { ?>
                                <li><a href="<?php echo site_url('/magazine/articlesByType/' .$artype->article_typeid) ?>"><?php echo $artype->article_typename;  ?></a>
                                </li>

                                <?php
                            }
                            ?>
                        </ul>
                    </div>

                </div>
                <!-- /.row -->
            </div>
        </div>



        <!-- Blog Sidebar Widgets Column -->


    </div>
    <!-- /.row -->

    <hr>