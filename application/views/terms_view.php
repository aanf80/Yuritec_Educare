<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 08/06/2017
 * Time: 10:15 AM
 */
?>

<div class="container">
   <br/>
<div class="business">
<h3 class="page-header"><?php echo $about_op; ?></h3>
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li role="presentation" ><?php echo anchor('/about', $about_title, 'class="link-class"') ?></li>
                <li role="presentation"><?php echo anchor('/about/objectives',  $about_obj, 'class="link-class"') ?></li>
                <li role="presentation" class="active"><?php echo anchor('/about/policies',  $about_op, 'class="link-class"') ?></li>
                <li role="presentation"><?php echo anchor('/about/evaluation_terms', $about_ep, 'class="link-class"') ?></li>
            </ul>

        </div>
   <br/>
  


    <br/>

    <?php foreach($terms as $ter) {
        echo $ter->content;
    }
    ?>

</div>


    <br/>
