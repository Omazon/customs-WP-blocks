<?php
global $post;
$selecciona_categoria = get_field('selecciona_categoria')?: 178;
$categoria_name = get_term($selecciona_categoria)->name;
$paged = (get_query_var('paginate')) ? get_query_var('paginate') : 1;


$posts = get_posts(array(
    'numberposts' => 12,
    'category' => $selecciona_categoria,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged
));

?>
<header class="page-header mb-4 mb-lg-6 text-center pt-4 pt-lg-10">
    <h1 class="page-title mb-0"><?= $categoria_name ?></h1>
</header>
<div class="container">
    <div class="row">
        <?php foreach ($posts as $post): setup_postdata( $post );
            list($category_display1, $category_link1) = array_values(get_yoast_category($post->ID));;
            ?>
            <div class="col-6 col-md-3 mb-4 mb-lg-6">
                <article class="card">
                    <figure class="card-figure">
                        <a href="<?= the_permalink(); ?>" class="d-block position-relative ratio ratio-270x214">
                            <img width="270" height="214" src="<?= the_post_thumbnail_url(); ?>"
                                 class="card-img img-fluid object-fit-cover wp-post-image" alt="<?= the_title(); ?>"
                                 decoding="async"
                                 fetchpriority="high">
                        </a>
                    </figure>
                    <a class="d-inline-block card-category mb-2" href="<?= $category_link1 ?>"><?= $category_display1 ?></a>
                    <h2 class="card-title">
                        <a href="<?= the_permalink(); ?>""><?= the_title(); ?></a>
                    </h2>
                    <div class="card-meta">
                        <div class="card-published text-uppercase mt-3">
                            <time datetime="<?= the_date('c') ?>"><?= the_date('j F, Y') ?></time>
                        </div>
                    </div>
                </article>
            </div>
        <?php endforeach; wp_reset_postdata();?>
        <nav class="navigation posts-navigation" aria-label="Entradas">
            <h2 class="screen-reader-text">Navegación de entradas</h2>
            <div class="nav-links">
                <div class="nav-previous">
                    <a href="<?= get_current_url().'?paginate='.($paged + 1) ?>">Entradas anteriores</a>
                </div>
                <?php
                if ($paged > 1) {
                    $url = ($paged == 2) ? get_current_url() : get_current_url() . '?paginate=' . ($paged - 1);
                    echo '
                        <div class="nav-next">
                            <a href="' . $url . '">Entradas siguientes</a>
                        </div>';
                    }
                ?>
            </div>
        </nav>
    </div>
