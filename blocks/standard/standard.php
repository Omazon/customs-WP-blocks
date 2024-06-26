<?php
$seleccionar_post = get_field('seleccionar_post');

$classes = 'col-lg-3';
if(count($seleccionar_post) < 4 ){
    $classes = 'col-lg-4';
}
?>

<section class="block block-none pt-5 pt-lg-6 pb-5 pb-lg-6">
    <div class="container">
        <div class="row">
            <?php
            if(!$seleccionar_post): echo "Edite el bloque en el panel de edición"; endif;
            foreach ($seleccionar_post as $post):
                list($category_display, $category_link) = array_values(get_yoast_category($post));?>
            <div class="col-12 col-md-6 <?= $classes ?> mb-6 mb-lg-0">
                <article class="card">
                    <figure class="card-figure">
                        <a href="<?= get_permalink($post) ?>" class="d-block position-relative ratio ratio-270x377">
                            <img width="700" height="417" src="<?= get_the_post_thumbnail_url($post) ?>" class="card-img object-fit-cover wp-post-image" alt="<?= get_the_title($post) ?>" decoding="async">
                        </a>
                    </figure>
                    <a class="d-inline-block card-category mb-2" href="<?= $category_link ?>"><?= $category_display ?></a>
                    <h2 class="card-title"><a href="<?= get_permalink($post) ?>"><?= get_the_title($post) ?></a></h2>
                    <div class="card-meta">
                        <div class="card-published text-uppercase mt-3">
                            <time datetime="<?= get_post_time('c', false, $post) ?>"><?= get_the_date('j F, Y', $post) ?></time>
                        </div>
                    </div>
                </article>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>