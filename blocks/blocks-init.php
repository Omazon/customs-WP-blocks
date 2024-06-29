<?php

require_once GB_PLUGIN_DIR.'blocks/title/fields.php';
require_once GB_PLUGIN_DIR.'blocks/highlight/fields.php';
require_once GB_PLUGIN_DIR.'blocks/newsletter/fields.php';
require_once GB_PLUGIN_DIR.'blocks/grid-multimedia/fields.php';
require_once GB_PLUGIN_DIR.'blocks/standard/fields.php';
require_once GB_PLUGIN_DIR.'blocks/entries/fields.php';
require_once GB_PLUGIN_DIR.'blocks/links/fields.php';
require_once GB_PLUGIN_DIR.'blocks/content/fields.php';
require_once GB_PLUGIN_DIR .'blocks/destacado/fields.php';
require_once GB_PLUGIN_DIR .'blocks/quote/fields.php';
require_once GB_PLUGIN_DIR .'blocks/thumbnail/fields.php';
require_once GB_PLUGIN_DIR .'blocks/extract/fields.php';
require_once GB_PLUGIN_DIR .'blocks/multimedia/fields.php';


add_filter( 'block_categories_all' , function( $categories ) {
    $categories[] = array(
        'slug'  => 'guegue',
        'title' => 'Güegüe Blocks',
    );

    return $categories;
} );

function gb_register_acf_blocks() {
    register_block_type(GB_PLUGIN_DIR.'/blocks/title');
    register_block_type(GB_PLUGIN_DIR.'/blocks/highlight');
    register_block_type(GB_PLUGIN_DIR.'/blocks/newsletter');
    register_block_type(GB_PLUGIN_DIR.'/blocks/grid-multimedia');
    register_block_type(GB_PLUGIN_DIR.'/blocks/standard');
    register_block_type(GB_PLUGIN_DIR.'/blocks/entries');
    register_block_type(GB_PLUGIN_DIR.'/blocks/links');
    register_block_type(GB_PLUGIN_DIR.'/blocks/extract');
    register_block_type(GB_PLUGIN_DIR.'/blocks/thumbnail');
    register_block_type(GB_PLUGIN_DIR.'/blocks/content');
    register_block_type(GB_PLUGIN_DIR.'/blocks/destacado');
    register_block_type(GB_PLUGIN_DIR.'/blocks/quote');
    register_block_type(GB_PLUGIN_DIR.'/blocks/multimedia');
}
add_action( 'init', 'gb_register_acf_blocks' );


//patrones
    function register_patterns_category() {
        register_block_pattern_category(
            "guegue",
            array( 'label' => __( 'Patrones Iberoamérica', 'GB' ) )
        );
    }
    add_action( 'init', 'register_patterns_category' );

    function register_pattern() {
        register_block_pattern(
            'GB/portada',
            array(
                'title'       => __( 'Portada', 'GB' ),
                'description' => _x( 'Un patrón de bloques: Portada', 'Block pattern description', 'GB' ),
                'categories'  => array( 'guegue' ),
                'content'     => '
                <!-- wp:acf/title /-->
                <!-- wp:acf/highlight /-->
                <!-- wp:acf/newsletter /-->
                <!-- wp:acf/grid-multimedia /-->
                <!-- wp:acf/standard /-->
            ',
            )
        );
        register_block_pattern(
            'GB/listado-taxonomico',
            array(
                'title'       => __( 'Listado Taxonomico', 'GB' ),
                'description' => _x( 'Un patrón de bloques: Listado Taxonomico', 'Block pattern description', 'GB' ),
                'categories'  => array( 'guegue' ),
                'content'     => '
                <!-- wp:acf/entries /-->
            ',
            )
        );
        register_block_pattern(
            'GB/listado-tematico',
            array(
                'title'       => __( 'Listado Temático', 'GB' ),
                'description' => _x( 'Un patrón de bloques: Listado Temático', 'Block pattern description', 'GB' ),
                'categories'  => array( 'guegue' ),
                'content'     => '
                <!-- wp:acf/links /-->
            ',
            )
        );
        register_block_pattern(
            'GB/entrada',
            array(
                'title'       => __( 'Entrada', 'GB' ),
                'description' => _x( 'Un patrón de bloques: Entrada', 'Block pattern description', 'GB' ),
                'categories'  => array( 'guegue' ),
                'content'     => '
                <!-- wp:acf/title /-->
                <!-- wp:acf/extract /-->
                <!-- wp:acf/thumbnail /-->
                <!-- wp:acf/content /-->
                <!-- wp:acf/quote /-->
                <!-- wp:acf/destacado /-->
            ',
            )
        );
        register_block_pattern(
            'GB/entrevista',
            array(
                'title'       => __( 'Entrevista', 'GB' ),
                'description' => _x( 'Un patrón de bloques: Entevista', 'Block pattern description', 'GB' ),
                'categories'  => array( 'guegue' ),
                'content'     => '
                <!-- wp:acf/title /-->
                <!-- wp:acf/extract /-->
                <!-- wp:acf/thumbnail {"name":"acf/thumbnail","data":{"tipo_de_item_destacado":"video","_tipo_de_item_destacado":"field_667215a5a6424","youtube_embed_url":"qjOB4jb_06c","_youtube_embed_url":"field_6672161da6425"},"mode":"preview"} /-->
                <!-- wp:acf/content /-->
                <!-- wp:acf/quote /-->
                <!-- wp:acf/destacado /-->
            ',
            )
        );
        register_block_pattern(
            'GB/tribuna',
            array(
                'title'       => __( 'Tribuna', 'GB' ),
                'description' => _x( 'Un patrón de bloques: Tribuna', 'Block pattern description', 'GB' ),
                'categories'  => array( 'guegue' ),
                'content'     => '
                <!-- wp:acf/title /-->
                <!-- wp:acf/extract /-->
                <!-- wp:acf/thumbnail {"name":"acf/thumbnail","data":{"tipo_de_item_destacado":"tribuna","_tipo_de_item_destacado":"field_667215a5a6424","selecciona_author":"1409","_selecciona_author":"field_66722029cae5d"},"mode":"preview"} /-->   
                <!-- wp:acf/content /-->
                <!-- wp:acf/quote /-->
                <!-- wp:acf/destacado /-->
            ',
            )
        );
        register_block_pattern(
            'GB/multimedia',
            array(
                'title'       => __( 'Multimedia', 'GB' ),
                'description' => _x( 'Un patrón de bloques: Multimedia', 'Block pattern description', 'GB' ),
                'categories'  => array( 'guegue' ),
                'content'     => '
                <!-- wp:acf/extract {"name":"acf/extract","data":{"field_667245d64d40d":"1"},"mode":"preview"} /-->
                <!-- wp:acf/multimedia {"name":"acf/multimedia","data":{"field_667247bfc8fda":"\u003cstrong\u003eArroz\u003c/strong\u003e"},"mode":"preview"} /-->
            ',
            )
        );
    }
    add_action( 'init', 'register_pattern' );


add_filter('acf/load_field/key=field_666a696e79a5d', 'load_just_categories_filter', 12, 1); //highlight
//add_filter('acf/load_field/key=field_666e041bfe6e7', 'load_just_categories_filter', 12, 1); //post grande
add_filter('acf/load_field/key=field_666e071b4b8ca', 'load_just_categories_filter', 12, 1); //post pequeno


function load_just_categories_filter( $field ) {
    $field['taxonomy'] = [];
    $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => false,
        'parent' => 0
    ) );
    if ( !empty($terms) ) {
        foreach( $terms as $term ) {
            $field['taxonomy'][] = 'category:'.$term->slug;
        }
    }

    return $field;
}

add_filter('acf/fields/relationship/query/key=field_666a696e79a5d', 'my_acf_relationship_query', 10, 3);

function my_acf_relationship_query($args, $field, $post_id) {
    // Ajustar los argumentos de la consulta para asegurarse de que los resultados sean únicos
    $args['posts_per_page'] = -1;
    $args['post_status'] = 'publish';
    $args['orderby'] = 'title';
    $args['order'] = 'ASC';

    // Ejecutar la consulta original
    $query = new WP_Query($args);

    // Array para almacenar los títulos únicos y los IDs de los posts
    $unique_titles = array();
    $unique_post_ids = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $post_title = get_the_title();

            // Solo añadimos el post_id si el título no está en el array para evitar duplicados
            if (!in_array($post_title, $unique_titles)) {
                $unique_titles[] = $post_title;
                $unique_post_ids[] = $post_id;
            }
        }
    }
    wp_reset_postdata();

    // Si hay post_ids únicos, ajustamos el argumento 'post__in'
    if (!empty($unique_post_ids)) {
        $args['post__in'] = $unique_post_ids;
    }

    return $args;
}

add_filter('acf/fields/relationship/query', 'acf_relationship_query_taxonomy', 10, 3);

function acf_relationship_query_taxonomy($args, $field, $post_id) {
    // Verificar si hay parámetros de taxonomía en la consulta
    if (isset($_POST['taxonomy'])) {
        $taxonomies = explode(',', $_POST['taxonomy']);
        $args['tax_query'] = array(
            'relation' => 'AND',
        );
        foreach ($taxonomies as $taxonomy) {
            list($tax, $term) = explode(':', $taxonomy);
            $args['tax_query'][] = array(
                'taxonomy' => $tax,
                'field' => 'slug',
                'terms' => $term,
            );
        }
    }

    // Aplicar cualquier otro filtro necesario basado en otros parámetros de la consulta AJAX
    if (isset($_POST['s'])) {
        $args['s'] = sanitize_text_field($_POST['s']);
    }

    return $args;
}
