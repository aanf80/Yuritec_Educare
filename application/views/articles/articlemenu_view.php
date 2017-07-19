<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Artículos
                <?php
                if($articles != false){
                echo "<small>Volumen " . $volume . " Número " . $number ?></small>
                <?php
                }?>

            </h1>
            <ol class="breadcrumb">
                <li> <?php echo anchor('/magazine', 'Ejemplares', 'class="link-class"') ?></li>
                <li class="active">Artículos</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Project One -->

    <?php
    if($articles != false){
        foreach($articles as $art) { ?>
            <div class="row">
                <div class="col-md-7">
                    <a href="<?php echo site_url('/magazine/article_view/' . $magazineid . '/' . $art->articleid) ?>">
                        <img class="img-responsive img-hover" src="http://placehold.it/700x300" alt="">
                    </a>
                </div>
                <div class="col-md-5">
                    <h3><?php echo $art->title; ?></h3>
                    <h4>Autor: <?php
                        echo $autorname . " " . $autorlastname . " " . $autormoaternalsurname; ?> </h4>
                    <p><?php echo $art->resumen; ?></p>
                    <a class="btn btn-warning"
                       href="<?php echo site_url('/magazine/article_view/' . $magazineid . '/' . $art->articleid) ?>">Ver
                        Artículo <span class="glyphicon glyphicon-circle-arrow-right"></span></i></a>
                    <a class="btn btn-danger" href="<?php echo site_url('/magazine/generatePDF/' . $art->articleid) ?>">Descargar
                        en PDF <span class="glyphicon glyphicon-download"></span></a>
                    <br/>
                    <br/>
                    <script src="https://apis.google.com/js/platform.js" async defer></script>
                    <div class="g-savetodrive"
                         data-src="/Yuritec_Educare/politicas.pdf"
                         data-filename="politicas_de_operacion.pdf"
                         data-sitename="Yuritec Educare">
                    </div>
                    <hr>
                </div>
            </div>

            <!-- /.row -->
            <hr>
            <?php
        }
    }
    else{
        echo " <img class=\"img-responsive img-hover\" src=\"/Yuritec_Educare/assets/img/not-found.png\" ";
    }
    ?>
    <hr>


    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <?php
                /* Se imprimen los números de página */
                echo $this->pagination->create_links();
                ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>
