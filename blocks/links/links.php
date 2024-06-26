<?php
$texto_superior = get_field('texto_superior')?:'Agregar texto';
$categories = get_categories();
$grouped_categories = array();

foreach ($categories as $category) {
    $normalized_name = normalize($category->name);
    $first_letter = strtoupper($normalized_name[0]);

    if (!array_key_exists($first_letter, $grouped_categories)) {
        $grouped_categories[$first_letter] = array();
    }
    $grouped_categories[$first_letter][] = $category;
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
        <?php foreach ($grouped_categories as $letter => $categories): ?>
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
        <?php endforeach; ?>
    </div>
</article>
