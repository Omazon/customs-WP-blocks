<?php
$texto_superior = get_field('texto_superior')?:'Agregar texto';
$categories = get_categories();
$tipo_de_listado = get_field('tipo_de_listado')?:'cron'; //cron o alfa
$grouped_categories = array();
if($tipo_de_listado == 'cron') {
    foreach ($categories as $categoria) {

        if (is_numeric($categoria->name)) {
            $nombre_categoria = $categoria->name;
            $link_categoria = get_category_link($categoria->term_id);


            $subcategorias = get_categories(array(
                'child_of' => $categoria->term_id
            ));

            $subcategorias_array = [];
            foreach ($subcategorias as $subcategoria) {
                $subcategorias_array[] = array(
                    'nombre_subcategoria' => $subcategoria->name,
                    'link_subcategoria' => get_category_link($subcategoria->term_id)
                );
            }

            $grouped_categories[] = array(
                'nombre_categoria' => $nombre_categoria,
                'link_categoria' => $link_categoria,
                'subcategorias' => $subcategorias_array
            );
        }
    }
    usort($grouped_categories, function ($a, $b) {
        return $b['nombre_categoria'] - $a['nombre_categoria'];
    });
}
foreach ($categories as $categoria) {

    if (!is_numeric($categoria->name)) {
        $normalized_name = normalize($categoria->name);
        $first_letter = strtoupper($normalized_name[0]);

        if (!array_key_exists($first_letter, $grouped_categories)) {
            $grouped_categories[$first_letter] = array();
        }
        $grouped_categories[$first_letter][] = $categoria;
    }
}


?>
<article class="entry container g-lg-6 mb-10">
    <header class="page-header mb-4 mb-lg-6 text-center pt-4 pt-lg-10">
        <h1 class="page-title mb-0"><?= get_the_title() ?></h1>
    </header>
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xl-7">
            <div class="entry-content clearfix mb-4 mb-md-8">
                <p><?= $texto_superior ?></p>
                <p>&nbsp;</p>
            </div>
        </div>
        <?php
        if($tipo_de_listado == 'alfa'):
            foreach ($grouped_categories as $letter => $categories): ?>
                <section class="entry-section entry-section-themes entry-section-category  mb-8 container">
                    <div class="row justify-content-center">
                        <h3 class="entry-section-title col-12 col-lg-8 mb-5 text-uppercase">
                            <span class="entry-section-title-line d-block mb-1"></span>
                            <?= $letter ?>
                        </h3>
                        <div class="container entry-section-list text-uppercase col-lg-9">
                            <ul class="list-unstyled row mb-0">
                                <?php foreach ($categories as $category): ?>
                                    <li class="col-12 col-md-4 mb-3"><a href="<?= get_term_link($category) ?>"><?= $category->name ?></a></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </section>
            <?php endforeach; endif;
            if($tipo_de_listado == 'cron'): ?>
            <section class="entry-section entry-section-especiales mb-8 container page-template-template-especiales">
                <div class="row justify-content-center">
                    <div class="container entry-section-list text-uppercase col-lg-9">
                        <ul class="list-unstyled list-especiales text-uppercase">
                            <?php foreach ($grouped_categories as $category): ?>
                            <li class="cat-item cat-item-1372"><a href="<?= $category['link_categoria'] ?>"><?= $category['nombre_categoria'] ?></a>
                                <ul class="children">
                                    <?php foreach ($category['subcategorias'] as $subcategoria): ?>
                                    <li class="cat-item cat-item-1412"><a href="<?= $subcategoria['link_subcategoria'] ?>"><?= $subcategoria['nombre_subcategoria'] ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <?php endforeach;?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
    </div>
</article>
