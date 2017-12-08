

    <div class="technology">
        <div class="container">
<br/>
<br/>

    <div class="col-md-12 technology-left">

        <div class="tech-no">
            <!-- technology-top -->
            <br/>
           <?php  
           switch($tipo){
                case 0: 
                  echo "<h2>Volumen " . $volume . " Número " . $number."</h2>";
                  break;
                case 1:
                  echo "<h2>".$category."</h2>";
                  break;
           }
          ?>
            <br/>
            <?php
            if($articles != false){

                foreach($articles as $art) {?>
                    <div class="soci">
                        <ul>
                            <li><a href="<?php echo site_url('/magazine/generatePDF/' . $art->articleid) ?>"><i class="glyphicon glyphicon-print"> </i></a></li>
                        </ul>
                    </div>
                    <div class="tc-ch">

                        <div class="tch-img">
                            <a href="<?php echo site_url('/magazine/article_view/' . $magazineid . '/' . $art->articleid) ?>">
                                <img class="img-responsive img-hover" src="http://placehold.it/700x300" alt="">
                            </a>
                        </div>
                        <a class="blog orn"><?php
                            foreach($categories as $cat) {
                                if($cat->categoryid == $art->categoryid){
                                    echo $cat->categoryname;
                                }
                            }
                            ?></a>
                        <h3><a href="<?php echo site_url('/magazine/article_view/' . $magazineid . '/' . $art->articleid) ?>"> <?php echo $art->title ?></a></h3>
                        <?php echo $art->resumen ?>


                        <div class="blog-poast-info">
                            <ul>
                                <li><i class="glyphicon glyphicon-user"> </i><a class="admin" href="#"> <?php
                                        foreach($users as $user) {
                                            if($user->userid == $art->userid){
                                                echo $user->username." ".$user->lastname." ".$user->maternalsurname;
                                            }
                                        }
                                        ?></a></li>
                                <li><i class="glyphicon glyphicon-calendar"> </i><?php echo $art->articledate ?> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- technology-top -->
                    <!-- technology-top -->
                    <?php
                }//foreach
            }
            else{
                echo "<h3>No se encontraron resultados</h3>";
            }
            ?>
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
        </div>

    </div>

        </div>