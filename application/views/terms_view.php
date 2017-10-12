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
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li role="presentation" ><?php echo anchor('/about', 'Acerca de Yúritec Educare ', 'class="link-class"') ?></li>
                <li role="presentation"><?php echo anchor('/about/objectives', 'Objetivos', 'class="link-class"') ?></li>
                <li role="presentation" class="active"><?php echo anchor('/about/terms', 'Políticas de Operación', 'class="link-class"') ?></li>
                <li role="presentation"><?php echo anchor('/about/evaluation_terms', 'Políticas de Evaluación', 'class="link-class"') ?></li>
            </ul>

        </div>
   <br/>
    <h3>Políticas de Operación</h3>


    <br/>

    <?php foreach($terms as $ter) {
        echo $ter->content;
    }
    ?>

</div>


    <br/>
