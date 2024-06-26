<?php
$cabecera = get_field('cabecera')?:'Introduzco el título';
$contenido = get_field('content')?:'Introduzco el contenido';
?>


<div class="entry container g-lg-4 mb-6">
    <div class="entry-content container clearfix entry-content- col-lg-8 col-xl-7 mt-4 mt-lg-7 mb-4 mb-md-8">
        <div class="recuadro container">
            <h3 class="recuadro-title"><?= $cabecera ?></h3>
            <?= $contenido ?>
        </div>
    </div>
</div>
