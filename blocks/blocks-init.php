<?php

require_once GB_PLUGIN_DIR.'blocks/title/fields.php';
require_once GB_PLUGIN_DIR.'blocks/highlight/fields.php';
require_once GB_PLUGIN_DIR.'blocks/newsletter/fields.php';
require_once GB_PLUGIN_DIR.'blocks/grid-multimedia/fields.php';
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
                <!-- wp:html /-->
            ',
            )
        );
    }
    add_action( 'init', 'register_pattern' );


add_filter('acf/load_field/key=field_666a696e79a5d', 'load_just_categories_filter', 12, 1); //highlight
add_filter('acf/load_field/key=field_666e041bfe6e7', 'load_just_categories_filter', 12, 1); //post grande
add_filter('acf/load_field/key=field_666e071b4b8ca', 'load_just_categories_filter', 12, 1); //post pequeno
add_filter('acf/load_field/key=field_666e0f21b1abb', 'load_just_categories_filter', 12, 1); //standard
add_filter('acf/load_field/key=field_666b7c5afe454', 'load_just_categories_filter', 12, 1); //newsletter
function load_just_categories_filter( $field ) {
    $field['taxonomy'] = [];

    $terms = get_terms( array(
        'taxonomy' => 'category',
        'hide_empty' => false,
        'hierarchical' => true
    ) );

    if ( !empty($terms) ) {
        foreach( $terms as $term ) {
            $field['taxonomy'][] = 'category:' . $term->slug;
        }
    }

    return $field;
}

function my_acf_relationship_query( $args, $field, $post_id ) {
    $args['orderby'] = 'date';
    $args['order'] = 'DESC';

    return $args;
}
add_filter('acf/fields/relationship/query', 'my_acf_relationship_query', 10, 3);
