<?php
$cabecera = get_field('cabecera')?:'Introduzco el título';
$contenido = get_field('content')?:'Introduzco el contenido';
?>

<div class="recuadro container">
    <h3 class="recuadro-title"><?= $cabecera ?></h3>
    <?= $contenido ?>
</div>
