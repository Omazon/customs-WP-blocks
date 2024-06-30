<?php
$link_de_newsletter = get_field('link_de_newsletter');
$selecciona_post_tribuna = get_field('selecciona_post_tribuna');
$selecciona_posts = get_field('selecciona_posts');
$include_rss= get_field('incluir_rss');
$rss = get_field('rss');
$rss_titulo = get_field('rss_titulo');

if($selecciona_post_tribuna){
    $author = get_the_terms($selecciona_post_tribuna[0], 'autores');
    $foto_tribuna = wp_get_attachment_image_url(get_field('soib_photo',get_term($author[0]->term_id, 'autores')));
    $posicion_tribuna = get_field('soib_position',get_term($author[0]->term_id, 'autores'));
    list($category_display1, $category_link1) = array_values(get_yoast_category($selecciona_post_tribuna[0]));;
}


$include_newsletter = get_field('incluir_newsletter');
$classes = 'col-lg-3';
$classes_tribuna = 'col-lg-3';

if (!$include_newsletter) {
    $classes = 'col-lg-4';
    $classes_tribuna = 'col-lg-4';
}

if ($include_rss) {
    $classes = 'col-lg-3';
    $classes_tribuna = 'col-lg-3';
}

if ($include_rss && $include_newsletter) {
    $classes = 'col-lg-2';
    $classes_tribuna = 'col-lg-3';
}
?>
<section class="block block-newsletter pt-5 pt-lg-6 pb-5 pb-lg-6">
    <div class="container">
        <div class="row">
            <?php if($selecciona_post_tribuna): ?>
            <div class="col-12 col-md-6 <?= $classes_tribuna ?> mb-6 mb-lg-0">
                <article class="card">
                    <a class="d-inline-block card-category mb-2"
                           href="<?= $category_link1 ?>"><?= $category_display1 ?></a>
                    <h2 class="card-title"><a
                                href="<?= get_permalink($selecciona_post_tribuna[0]) ?>"><?= get_the_title($selecciona_post_tribuna[0]) ?></a></h2>
                    <div class="card-excerpt mt-4">
                        <p><?= get_the_excerpt($selecciona_post_tribuna[0]) ?></p>
                    </div>
                    <div class="card-meta">
                        <div class="card-author mt-3">
                            <div class="d-flex g-0">
                                <div class="flex-shrink-0 card-author-figure pe-3">
                                    <a href="<?= get_term_link($author[0]->term_id) ?>"
                                       class="d-block ratio ratio-1x1">
                                        <img width="307" height="358"
                                             src="<?= $foto_tribuna?>"
                                             class="card-author-photo" alt="<?= $author[0]->name?>"
                                             decoding="async">
                                    </a>
                                </div>
                                <div class="flex-grow-5 d-flex flex-column">
                                    <a class="card-author-name text-uppercase"
                                       href="<?= get_term_link($author[0]->term_id) ?>"><?= $author[0]->name?></a>
                                    <div class="card-author-position"><?= $posicion_tribuna ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-published text-uppercase mt-3">
                                <time><?= get_the_date('j F, Y', $selecciona_post_tribuna[0]) ?></time>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <?php endif; ?>
            <?php foreach ($selecciona_posts as $post):
                list($category_display, $category_link) = array_values(get_yoast_category($post));
            ?>
            <div class="col-12 col-md-6 <?= $classes ?> mb-6 mb-lg-0">
                <article class="card">
                    <figure class="card-figure">
                        <a href="<?= get_permalink($post) ?>"
                           class="d-block position-relative ratio ratio-270x377">
                            <img width="667" height="666"
                                 src="<?= get_the_post_thumbnail_url($post) ?>"
                                 class="card-img object-fit-cover wp-post-image"
                                 alt="<?= get_the_title($post) ?>"
                                 decoding="async">
                            <svg class="card-figure-ico position-absolute" width="118" height="118"
                                 viewBox="0 0 118 118">
                                <use xlink:href="#svg-video"></use>
                            </svg>
                        </a>
                    </figure>
                    <?php if(isset($category_display)): ?>
                    <a class="d-inline-block card-category mb-2"
                       href="<?= $category_link ?>"><?= $category_display ?></a>
                    <?php endif; ?>
                    <h2 class="card-title"><a
                                href="<?= get_permalink($post) ?>"><?= get_the_title($post) ?></a></h2>
                    <div class="card-meta">
                        <div class="card-published text-uppercase mt-3">
                            <time datetime="<?= get_post_time('c', false, $post) ?>"><?= get_the_date('j F, Y', $post) ?></time>
                        </div>
                    </div>
                </article>
            </div>
           <?php endforeach;
           if($include_newsletter):
           ?>
            <div class="col-md-6 <?= $classes ?> mb-6 mb-lg-0">
                <aside class="widget text-center d-flex flex-column pb-4">
                    <h3 class="widget-title m-0 pt-2">Newsletter</h3>
                    <div class="widget-body mb-6">Suscríbete a nuestro <br>boletín</div>
                    <a href="<?= $link_de_newsletter ?>"
                       class="mb-6 d-block" target="_blank">
                        <img width="155" height="209" class="d-block mx-auto"
                             src="https://www.somosiberoamerica.org/wp-content/themes/somosiberoamerica/dist/images/widget-newsletter.png"
                             alt="Newsletter">
                    </a>
                    <div class="widget-footer px-3">
                        <a class="btn btn-primary w-100 text-uppercase"
                           href="<?= $link_de_newsletter ?>"
                           target="_blank">
                            Suscríbete
                        </a>
                    </div>
                </aside>
            </div>
            <?php endif; ?>
            <?php if ($include_rss): ?>
                <div class="widget widget-feed d-flex flex-column pb-4 col-md-6 col-lg-3 mb-6 mb-lg-0 p-0 align-self-baseline">
                    <h3 class="ps-3 widget-title pt-2 pb-2">
                        <?= $rss_titulo ?>
                    </h3>
                    <div class="widget-body">
                        <?php
                        wprss_display_feed_items( $args = array(
                            'limit' => '5',
                            'source' => $rss
                        ))
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
