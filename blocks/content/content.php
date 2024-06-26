<?php
$contenido = get_field('contenido')?:'Escribe el contenido de este bloque';
?>
<div class="entry container g-lg-4 mb-6">
    <div class="entry-content container clearfix entry-content- col-lg-8 col-xl-7 mt-4 mt-lg-7 mb-4 mb-md-8">
        <?= $contenido ?>
    </div>
</div>

