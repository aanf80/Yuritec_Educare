

<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <?php foreach($articles as $art) { ?>
    <div class="row">
        <div class="col-lg-12">

            <ol class="breadcrumb">
                <li><a href="index.php">Inicio</a>
                </li>
                <li> <?php echo anchor('/magazine', 'Ejemplares', 'class="link-class"') ?></li>
                <li> <?php echo anchor('/magazine/articles/'.$magazineid, 'Articulos', 'class="link-class"') ?></li>
                <li class="active"><?php echo $art->title;?></li>
            </ol>
        </div>
    </div>

    <!-- /.row -->

    <!-- Content Row -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.9&appId=532724410449570";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>


    <div class="row">


        <!-- Blog Post Content Column -->
        <div class="col-lg-8">
            <div class="business">
                <h3 ><?php echo $art->title;?>
                    <br/><small>Por <a href="#"> <?php echo $autorname . " " . $autorlastname  . " " . $autormoaternalsurname; ?></a></small>
                </h3>
            <!-- Blog Post -->

            <hr>

            <!-- Date/Time -->
            <p><i class="fa fa-calendar"></i> Fecha de publicación: <?php echo $art->articledate;?></p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <br/>
            <div class="fb-share-button" data-href="http://appempre-aanf.esy.es/Yuritec_Educare/magazine/article_view" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartir</a></div>
            <br/>
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            <div class="g-savetodrive"
                 data-src="/Yuritec_Educare/politicas.pdf"
                 data-filename="politicas_de_operacion.pdf"
                 data-sitename="Yuritec Educare">
            </div>

            <br/>
            <br/>

            <!-- Post Content -->

            <?php echo $art->content;?>


            <hr>

            <?php
            }
            ?>


            <hr>

            <!-- Posted Comments -->

                <div class="fb-comments" data-href=<?php echo "http://appempre-aanf.esy.es/Yuritec_Educare/article/article_view/".$art->articleid;?> data-numposts="5"></div>
            </div> <!--Cuadro blanco -->
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
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
                                <li><a href="<?php echo site_url('/magazine/articlesByCategory/' .$cat->categoryid) ?>"><?php echo $cat->categoryname;  ?></a>
                                </li>

                                <?php
                            }
                            ?>


                        </ul>
                    </div>

                </div>
                <!-- /.row -->
            </div>

            <div class="well">
                <h4>Tipos de artículo</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-unstyled">

                            <?php foreach($articletypes as $artype) { ?>
                                <li><a href="<?php echo site_url('/magazine/articlesByCategory/' .$artype->article_typeid) ?>"><?php echo $artype->article_typename;  ?></a>
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

    </div>
    <!-- /.row -->

    <hr>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.10&appId=1248325218622771";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>