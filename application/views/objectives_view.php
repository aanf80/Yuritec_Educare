<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 08/06/2017
 * Time: 12:34 PM
 */
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Objetivos</h1>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/about', 'Acerca de Yúritec Educare ', 'class="link-class"') ?>
                </li>
                <li class="active">Objetivos</li>
                <li>
                    <?php echo anchor('/about/terms', 'Políticas de Operación', 'class="link-class"') ?>
                </li>
            </ol>
        </div>
    </div>


<?php foreach($objectives as $obj) {
    echo $obj->objectivecontent;
}
?>