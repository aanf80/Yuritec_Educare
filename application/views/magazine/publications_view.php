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
                            <img class="img-responsive img-hover" src="/Yuritec_Educare/assets/img/imgabout.png" width="400" height=100"
                                 alt="">
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
            <ul class="pagination">
                <?php
                /* Se imprimen los números de página */
                echo $this->pagination->create_links();
                ?>
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


        </div>

        <!-- Blog Sidebar Widgets Column -->


    </div>
    <!-- /.row -->

    <hr>