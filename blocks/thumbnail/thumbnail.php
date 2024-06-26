<?php
$titulo = get_the_title()?:'Escriba el título y luego guarde';
$thumbnail = get_the_post_thumbnail_url()?:'https://placehold.co/1200x714?text=Subir+la+imagen+y+luego+recargue';
$tipo = get_field('tipo_de_item_destacado')?:'imagen';
$id_del_video_de_youtube = get_field('id_del_video_de_youtube')?:'qjOB4jb_06c';
$selecciona_author = get_field('selecciona_author');
$autor_term = get_term($selecciona_author);

$autor_posicion = get_field('soib_position','autores_'.$selecciona_author)?:'Cargo';
$autor_foto = wp_get_attachment_image_url(get_field('soib_photo','autores_'.$selecciona_author))?:'https://placehold.co/270x214?text=Autor+sin+imagen';
$autor_titulo = is_wp_error($autor_term) ? 'NAME' : $autor_term->name;
$autor_link = is_wp_error(get_term_link($selecciona_author)) ?? '#';
?>

<div class="col-12 d-flex justify-content-center px-0">
    <?php if ($tipo === 'imagen'): ?>
    <figure class="entry-featured wp-caption mb-4 mb-lg-9">
        <img width="1200" height="714" src="<?= $thumbnail ?>"
             class="img-fluid wp-post-image" alt="<?= $titulo ?>" decoding="async"
             fetchpriority="high">
    </figure>
    <?php
    endif;
    if ($tipo === 'video'):
    ?>
    <div class="container">
        <div class="entry-featured wp-caption ratio ratio-16x9 mb-4 mb-lg-9">
            <iframe title="<?= $titulo ?>" width="500" height="281" src="https://www.youtube.com/embed/<?= $id_del_video_de_youtube ?>?feature=oembed"
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen="">
            </iframe>
        </div>
    </div>
    <?php endif;
    if ($tipo === 'tribuna'):
    ?>
    <div class="entry-author text-center">
        <figure class="entry-author-figure mb-2 mx-auto d-flex justify-content-center">
            <a class="d-block ratio ratio-1x1" href="<?= $autor_link ?>">
                <img width="307" height="358" src="<?= $autor_foto ?>" class="object-fit-cover entry-author-photo" alt="" decoding="async" fetchpriority="high">
            </a>
        </figure>
        <a class="entry-author-name text-uppercase" href="<?= $autor_link ?>"><?= $autor_titulo ?></a>
        <div class="entry-author-position"><?= $autor_posicion ?></div>
    </div>
    <?php endif; ?>
</div>
