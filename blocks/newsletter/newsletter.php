<?php
$link_de_newsletter = get_field('link_de_newsletter');
$selecciona_post_tribuna = get_field('selecciona_post_tribuna');
$selecciona_posts = get_field('selecciona_posts');
$include_rss= get_field('incluir_rss');
$rss = get_field('rss');
$rss_titulo = get_field('rss_titulo');
$include_newsletter = get_field('incluir_newsletter');
$total_items = count($selecciona_posts);

if($include_newsletter){
    $total_items++;
}
if($include_rss){
    $total_items++;
}

$classes = '';
$classes_tribuna = 'col-lg-3';

if($total_items == 2){
    $classes = 'col-lg-6';
}
if($total_items == 3){
    $classes = 'col-lg-4';
}
if($total_items >= 4){
    $classes = 'col-lg-3';
}

if($selecciona_post_tribuna){
    $author = get_the_terms($selecciona_post_tribuna[0], 'autores');
    $foto_tribuna = wp_get_attachment_image_url(get_field('soib_photo'  ,get_term($author[0]->term_id, 'autores')));
    $posicion_tribuna = get_field('soib_position',get_term($author[0]->term_id, 'autores'));
    list($category_display1, $category_link1) = array_values(get_yoast_category($selecciona_post_tribuna[0]));;
}

if(count($selecciona_posts) >= 3 && $include_newsletter){
    $include_rss = false;
}
if(count($selecciona_posts) ==4){
    $include_newsletter = false;
    $include_rss = false;
}


?>
<section class="block block-newsletter pt-5 pt-lg-6 pb-5 pb-lg-6">
    <div class="container">
        <div class="row">
            <?php foreach ($selecciona_posts as $post):
                list($category_display, $category_link) = array_values(get_yoast_category($post));
            ?>
            <div class="col-12 col-md-6 <?= $classes ?> mb-6 mb-lg-0">
                <?php
                if($category_display == 'Tribuna'):
                    list($autor_id, $autor_nombre, $foto_tribuna, $posicion_tribuna) = array_values(get_author_for_tribuna($post));
                ?>
                    <article class="card">
                        <a class="d-inline-block card-category mb-2"
                           href="<?= $category_link ?>"><?= $category_display ?></a>
                        <h2 class="card-title"><a
                                    href="<?= get_permalink($post) ?>"><?= get_the_title($post) ?></a></h2>
                        <div class="card-excerpt mt-4">
                            <p><?= substr(get_the_excerpt($post),0,200) ?></p>
                        </div>
                        <div class="card-meta">
                            <div class="card-author mt-3">
                                <div class="d-flex g-0">
                                    <div class="flex-shrink-0 card-author-figure pe-3">
                                        <a href="<?= get_term_link($autor_id) ?>"
                                           class="d-block ratio ratio-1x1">
                                            <img width="307" height="358"
                                                 src="<?= $foto_tribuna?>"
                                                 class="card-author-photo" alt="<?= $autor_nombre?>"
                                                 decoding="async">
                                        </a>
                                    </div>
                                    <div class="flex-grow-5 d-flex flex-column">
                                        <a class="card-author-name text-uppercase"
                                           href="<?= get_term_link($autor_id) ?>"><?= $autor_nombre?></a>
                                        <div class="card-author-position"><?= $posicion_tribuna ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-published text-uppercase mt-3">
                                    <time><?= get_the_date('j F, Y', $post) ?></time>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php
                else:
                ?>
                    <article class="card">
                    <figure class="card-figure">
                        <a href="<?= get_permalink($post) ?>"
                           class="d-block position-relative ratio ratio-270x377">
                            <img width="667" height="666"
                                 src="<?= get_the_post_thumbnail_url($post) ?>"
                                 class="card-img object-fit-cover wp-post-image"
                                 alt="<?= htmlspecialchars(strip_tags(get_the_title($post)), ENT_QUOTES, 'UTF-8') ?>"
                                 decoding="async"/>
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
                <?php
                endif;
                ?>
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
