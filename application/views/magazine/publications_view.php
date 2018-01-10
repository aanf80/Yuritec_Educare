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
    <br/>



        <!-- Blog Entries Column -->

            <div class="col-md-8">
                <div class="business">
                <!-- First Blog Post -->
                    <h2><?php echo $pub_title; ?></h2>
                    <hr>
                    <?php
                    if($magazines != false){
                        foreach ($magazines as $magazine) { ?>
                            <div class="soci">
                                <ul>
                                    <li><a href="#"><i class="glyphicon glyphicon-print"> </i></a></li>
                                </ul>
                            </div>
                            <div class="tc-ch">

                                <div class="tch-img">
                                    <div align="center">
                                        <a href="<?php echo site_url('/magazine/articles/' . $magazine->magazineid) ?>">
                                            <img class="img-responsive" src="<?php echo base_url('assets/images/'.$magazine->cover)?>" width="400" height="100" alt="" >
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <!-- technology-top -->
                            <!-- technology-top -->
                            <?php
                        }
                    }
                    else{
                        echo "<h3>No se encontraron resultados</h3> ";
                    }
                    ?>
                </div><!-- BUSSINESS -->

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

<!-- Pager -->



    <hr>