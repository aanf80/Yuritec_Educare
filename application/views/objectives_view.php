<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 08/06/2017
 * Time: 12:34 PM
 */
?>

<div class="container">
    <br/>
    <div class="business">
    <h3 class="page-header">Objetivos</h3>
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li role="presentation" ><?php echo anchor('/about', 'Acerca de Yúritec Educare ', 'class="link-class"') ?></li>
                    <li role="presentation" class="active"><?php echo anchor('/about/objectives', 'Objetivos', 'class="link-class"') ?></li>
                    <li role="presentation"><?php echo anchor('/about/terms', 'Políticas de Operación', 'class="link-class"') ?></li>
                    <li role="presentation"><?php echo anchor('/about/terms', 'Políticas de Evaluación', 'class="link-class"') ?></li>
                </ul>

            </div>
<br/>
      


<br/>
        <?php foreach($objectives as $obj) {
            echo $obj->objectivecontent;
        }
        ?>
    </div>
    <br/>

