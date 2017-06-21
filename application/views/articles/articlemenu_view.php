<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Artículos
                <small>Nombre de la revista</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.html">Inicio</a>
                </li>
                <li><a href="index.html">Ejemplares</a>
                </li>
                <li class="active">Artículos</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <!-- Project One -->

    <?php foreach($articles as $art) { ?>
    <div class="row">
        <div class="col-md-7">
            <a href="portfolio-item.html">
                <img class="img-responsive img-hover" src="http://placehold.it/700x300" alt="">
            </a>
        </div>
        <div class="col-md-5">
            <h3><?php echo $art->title;?></h3>
            <h4>Autor:</h4>
            <p><?php echo $art->resumen;?></p>
            <a class="btn btn-warning" href="<?php echo site_url('/magazine/article_view') ?>">Ver Artículo <span class="glyphicon glyphicon-circle-arrow-right"></span></i></a>
            <button class="btn btn-danger">Descargar en PDF<span class="glyphicon glyphicon-download"></span></button>
        </div>
    </div>

    <!-- /.row -->
        <hr>
        <?php
    }
    ?>
    <hr>


    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a href="#">&laquo;</a>
                </li>
                <li class="active">
                    <a href="#">1</a>
                </li>
                <li>
                    <a href="#">2</a>
                </li>
                <li>
                    <a href="#">3</a>
                </li>
                <li>
                    <a href="#">4</a>
                </li>
                <li>
                    <a href="#">5</a>
                </li>
                <li>
                    <a href="#">&raquo;</a>
                </li>
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
