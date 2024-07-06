<?php
$post_grande = get_field('selecciona_post_grande')?:[];
$post_pequeno = get_field('selecciona_post_pequeno')?:[];
if($post_grande && $post_pequeno) {
    list($category_display_grande, $category_link_grande) = array_values(get_yoast_category($post_grande[0]));;
    list($category_display_pequeno, $category_link_pequeno) = array_values(get_yoast_category($post_pequeno[0]));;
}
?>

<section class="block block-media pt-5 pb-5 pt-lg-10 pb-lg-10">
    <div class="container">
        <div class="row">
            <header class="block-media-header container col-12 mb-md-4 col-lg-3">
                <h3 class="block-media-title m-0 pt-2 pb-3">Multimedia<span>.</span></h3>
            </header>
            <?php if($post_grande): ?>
            <div class="col-12 col-md-8 col-lg-6">
                <article class="card">
                    <figure class="card-figure">
                        <a href="<?= get_permalink($post_grande[0]) ?>" class="d-block position-relative ">
                            <img width="700" height="467" src="<?= get_the_post_thumbnail_url($post_grande[0]) ?>" class="card-img img-fluid wp-post-image" alt="<?= get_the_title($post_grande[0]) ?>" decoding="async" />
                        </a>
                    </figure>
                    <a class="d-inline-block card-category mb-2" href="<?= $category_link_grande ?>"><?= $category_display_grande ?></a>
                    <h2 class="card-title"><a href="<?= get_permalink($post_grande[0]) ?>"><?= get_the_title($post_grande[0]) ?></a></h2>
                    <div class="card-meta">
                        <div class="card-published text-uppercase mt-3">
                            <time datetime="<?= get_post_time('c', false, $post_grande[0]) ?>"><?= get_the_date('j F, Y', $post_grande[0]) ?></time>
                        </div>
                    </div>
                </article>
            </div>
            <?php endif; ?>
            <?php if($post_pequeno): ?>
            <div class="col-12 col-md-4 col-lg-3">
                <article class="card">
                    <figure class="card-figure">
                        <a href="<?= get_permalink($post_pequeno[0]) ?>" class="d-block position-relative ">
                            <img width="270" height="214" src="<?= get_the_post_thumbnail_url($post_pequeno[0]) ?>" class="card-img img-fluid wp-post-image" alt="<?= get_the_title($post_pequeno[0]) ?>" decoding="async">
                        </a>
                    </figure>
                    <a class="d-inline-block card-category mb-2" href="<?= $category_link_pequeno ?>"><?= $category_display_pequeno ?></a>
                    <h2 class="card-title"><a href="<?= get_permalink($post_pequeno[0]) ?>"><?= get_the_title($post_pequeno[0]) ?></a></h2>
                    <div class="card-meta">
                        <div class="card-published text-uppercase mt-3">
                            <time datetime="<?= get_post_time('c', false, $post_pequeno[0]) ?>"><?= get_the_date('j F, Y', $post_pequeno[0]) ?></time>
                        </div>
                    </div>
                </article>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

