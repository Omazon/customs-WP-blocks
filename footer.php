<?php

$footer_menu = get_field('escoge_un_menu', 'options');
$menu_object = wp_get_nav_menu_object($footer_menu);
$menu_id = $menu_object->term_id;

$asignaciones_menu = get_theme_mod('nav_menu_locations');
$asignaciones_menu['footer_navigation'] = $menu_id;

set_theme_mod('nav_menu_locations', $asignaciones_menu);

$texto_superior = get_field('texto_superior', 'options')?:'Con el apoyo de';
$logos = get_field('logos', 'options');
?>
<footer class="content-info gb-blocks">

    <div class="container">
        <?php
        if (has_nav_menu('footer_navigation')) : ?>
            <div class="nav-footer py-5 d-flex flex-column flex-lg-row justify-content-center align-items-center">
                <div class="brand px-1 py-1 fw-bold">Somos Iberoamérica / Somos Ibero-América</div>
                <?php wp_nav_menu([
                    'theme_location' => 'footer_navigation',
                    'container' => 'nav',
                    'container_class' => 'nav-primary navbar navbar-expand-lg justify-content-center align-items-center flex-column flex-lg-row',
                    'menu_class' => 'navbar-nav justify-content-center align-items-center'
                ]); ?>
            </div>
        <?php
        endif; ?>
    </div>
    <div class="container container-logo py-4 px-lg-5">
        <span class="d-block container-logo-text text-uppercase mb-1"><?php _e($texto_superior, 'sage'); ?></span>
        <div class="d-flex justify-content-between flex-sm-wrap">
            <?php if($logos):
                foreach ($logos as $logo):?>
                    <a href="<?= $logo['link']?>" target="_blank" class="w-auto">
                        <img class="" loading="lazy" src="<?= $logo['logo'] ?>" alt="AECID"/>
                    </a>
                <?php endforeach;
            endif;?>
        </div>
</footer>