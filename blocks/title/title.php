<?php

$titulo = get_field('titulo');
$usar_actual = get_field('usar_actual');
$post_type = get_post_type();
$variante_de_color = get_field('variante_de_color');

if ($usar_actual) {
    if($post_type == 'page') {
        $titulo_name = "'Usar actual' solo funciona con Publicaciones";
        $titulo_link = '#';
    } else {
        list($titulo_name,  $titulo_link) = array_values(get_yoast_category(get_the_ID()));;
    }

} else {
    $titulo_link = '#';
    $titulo_name = 'Edite el bloque en el panel de edición';

    if ($titulo) {
        $term = get_term($titulo);
        if ($term) {
            $titulo_link = esc_html(get_term_link($term));
            $titulo_name = $term->name;
        }
    }
}
?>
<?php if(!$usar_actual && $variante_de_color=='imagen'): ?>
<div class="block-header container text-center mb-3 mb-lg-5 pt-5 pt-lg-6">
    <h3 class="block-highlight-title text-uppercase d-flex justify-content-center m-0 py-2 p-lg-0">
        <a class="block-highlight-title-lnk" href="<?= $titulo_link ?>"><?= $titulo_name ?></a>
    </h3>
</div>
<?php else: ?>
<div class="text-center container col-lg-8 col-lg-7 pt-4 pt-lg-10">
    <a class="entry-category mb-1 d-inline-block" href="<?= $titulo_link ?>"><?= $titulo_name ?></a>
</div>
<?php endif; ?>