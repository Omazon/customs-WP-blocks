<?php
$quote = get_field('quote')?:"Escribe el quote";
?>
<div class="entry container g-lg-4 mb-6">
    <div class="entry-content container clearfix entry-content- col-lg-8 col-xl-7 mt-4 mt-lg-7 mb-4 mb-md-8">
        <blockquote><p><?= $quote ?></p></blockquote>
    </div>
</div>
