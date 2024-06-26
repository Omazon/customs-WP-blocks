<?php
$post_id = get_field('selecciona_un_post');
$primary_cat_id = get_post_meta($post_id,'_yoast_wpseo_primary_' . 'product_cat', true);
list($category_display, $category_link) = array_values(get_yoast_category($post_id[0]));

?>
<article class="card card-opening container pb-6">
    <div class="row">
        <?php if ($post_id): ?>
        <div class="col-md-6 col-lg-7">
            <figure class="card-figure mb-2 mb-lg-0">
                <a href="<?php echo get_permalink($post_id[0]) ?>" class="d-block position-relative ratio ratio ratio-662x441">
                    <img width="700" height="466" src="<?= get_the_post_thumbnail_url($post_id[0]) ?>" class="card-img object-fit-cover wp-post-image" alt="<?= get_the_title($post_id[0]) ?>" decoding="async" fetchpriority="high" >
                </a>
            </figure>
        </div>
        <div class="col-md-6 col-lg-5">
            <div class="card-body">
                <a class="d-inline-block card-category mb-2" href="<?= $category_link ?>"><?= $category_display ?></a>
                <h2 class="card-title"><a href="<?= get_permalink($post_id[0]) ?>"><?= get_the_title($post_id[0]) ?></a></h2>
                <div class="card-text">
                    <p></p>
                    <p><b><?= get_the_excerpt($post_id[0]) ?></b></p>
                </div>
                <div class="card-meta">
                    <div class="card-published text-uppercase mt-3">
                        <time datetime="<?= get_post_time('c', false, $post_id[0]) ?>"><?= get_the_date('j F, Y', $post_id[0]) ?></time>
                    </div>
                </div>
            </div>
        </div>
        <?php else: echo "Edite el bloque en el panel de edición"; endif; ?>
    </div>
</article>
