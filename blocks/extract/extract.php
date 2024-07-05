<?php
$excerpt = get_the_excerpt()?:'Escriba el extracto y luego guarde';
$titulo = get_the_title()?:'Escriba el título y luego guarde';
$quitar_extracto = get_field('quitar_extracto');
$quitar_titulo = get_field('quitar_titulo');
?>

<div class="text-center container col-lg-8 col-lg-7 mb-4 mb-lg-8">
    <?php if (!$quitar_titulo): ?>
    <h1 class="entry-title mb-0"><?= $titulo ?></h1>
    <?php endif; ?>
    <?php if (!$quitar_extracto): ?>
    <h2 class="entry-subtitle mb-0 mt-3 mt-lg-5"><?= $excerpt ?></h2>
    <?php endif; ?>
</div>

