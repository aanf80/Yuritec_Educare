<?php
/**
 * Created by PhpStorm.
 * User: Concurso18
 * Date: 08/06/2017
 * Time: 10:15 AM
 */
?>

    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Políticas de Evaluación</h1>
            <ol class="breadcrumb">
                <li>
                    <?php echo anchor('/about', 'Acerca de Yúritec Educare ', 'class="link-class"') ?>
                </li>
                <li>
                    <?php echo anchor('/about/objectives', 'Objetivos', 'class="link-class"') ?>
                </li>
                <li>
                    <?php echo anchor('/about/terms', 'Políticas de Operación', 'class="link-class"') ?>
                </li>
                <li class="active">Políticas de Evaluación</li>
            </ol>
        </div>
    </div>

<?php foreach($terms as $ter) {
    echo $ter->content;
}
?>