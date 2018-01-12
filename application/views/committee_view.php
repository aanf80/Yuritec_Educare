<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 22/07/2017
 * Time: 08:02 PM
 */
?>


<!-- Team Members -->
<div class="container">
    <br/>
    <div class="business">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header"><?php echo $committee_title;?></h2>
            </div>
            <?php
            //if($magazines != false){
            foreach ($member as $mem) { ?>

                <div class="col-md-4 text-center">
                    <div class="soci">
                        <ul>
                            <li><a href="<?php echo $mem->ec_twaccount ?>" class="facebook-1"> </a></li>
                            <li><a href="<?php echo $mem->ec_fbaccount ?>" class="facebook-1 chrome"> </a></li>
                        </ul>
                    </div>
                    <div class="thumbnail">
                        <img class="img-responsive" src="<?php echo "assets/images/".$mem->ec_photo?>" width="150" height=150" alt="" >
                        <div class="caption">
                            <h3><?php echo $mem->ec_name ?><br>
                                <small><?php echo $mem->ec_position ?></small>
                            </h3>
                            <p><?php echo $mem->ec_bio?></p>

                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
    </div>

    <br/>

<!-- /.row -->

