<?php
/**
 * Created by PhpStorm.
 * User: Armando_Navarro
 * Date: 22/07/2017
 * Time: 08:02 PM
 */
?>


<!-- Team Members -->
<div class="container"
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Comité Editorial</h2>
    </div>
    <?php
    //if($magazines != false){
    foreach ($member as $mem) { ?>
        <div class="col-md-4 text-center">
            <div class="thumbnail">
                <img class="img-responsive" src="<?php echo "assets/images/".$mem->ec_photo?>" width="150" height=150" alt="" >
                <div class="caption">
                    <h3><?php echo $mem->ec_name ?><br>
                        <small><?php echo $mem->ec_position ?></small>
                    </h3>
                    <p><?php echo $mem->ec_bio?></p>
                    <ul class="list-inline">
                        <li><a href="<?php echo $mem->ec_fbaccount ?>"><i class="fa fa-2x fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fa fa-2x fa-twitter-square"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

</div>
<!-- /.row -->

