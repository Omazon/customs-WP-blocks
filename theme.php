<?php

function custom_page_template($template) {
    if (is_page()) {
        $plugin_template = plugin_dir_path(__FILE__) . 'page.php';

        if (file_exists($plugin_template)) {
            return $plugin_template;
        }
    }

    return $template;
}
add_filter('template_include', 'custom_page_template');
function custom_footer_template() {
    $plugin_footer_template = plugin_dir_path(__FILE__) . 'footer.php';

    if (file_exists($plugin_footer_template)) {
        include($plugin_footer_template);
        return;
    }
}
add_action('wp_footer', 'custom_footer_template', 100);

function disable_disabler_gutenberg_function() {
    remove_filter('use_block_editor_for_post_type', '__return_false', 10);
    remove_action('wp_enqueue_scripts', 'remove_block_css', 100);
}
add_action('init', 'disable_disabler_gutenberg_function');

function load_main_css_for_backend() {

    wp_enqueue_style('backend-bootstrap', get_stylesheet_directory_uri() . '/dist/styles/main.css', array(), null);
    wp_enqueue_style('gb-core', GB_CORE_CSS . 'gb-core.css',null,time(),'all');
}
add_action('enqueue_block_editor_assets', 'load_main_css_for_backend');

add_action( 'acf/init', function() {
    acf_add_options_page( array(
        'page_title' => 'Opciones del Tema',
        'menu_slug' => 'opciones-del-tema',
        'position' => '',
        'redirect' => false,
    ) );
} );

add_filter( 'acf/load_field/name=escoge_un_menu', 'wd_nav_menus_load' );
function wd_nav_menus_load( $field ) {
    $menus = wp_get_nav_menus();
    if ( ! empty( $menus ) ) {
        foreach ( $menus as $menu ) {
            $field['choices'][ $menu->slug ] = $menu->name;
        }
    }
    return $field;
}

function get_yoast_category($id) {
    $category_display = '';
    $category_link = '';
    if ( class_exists('WPSEO_Primary_Term') ) {
        $wpseo_primary_term = new WPSEO_Primary_Term('category', $id);
        $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
        $category_display = get_term($wpseo_primary_term);
        $category_link = get_term_link($category_display);
    }
    return [
        'category_display' => is_wp_error($category_display) ? 'Selecciona una categoria principal' : $category_display->name,
        'category_link' => is_wp_error($category_link) ? '#' : $category_link,
    ];
}


function add_custom_query_var($vars) {
    $vars[] = 'paginate';
    return $vars;
}
add_filter('query_vars', 'add_custom_query_var');

function keep_query_parameters($redirect_url, $requested_url, $redirect_status) {
    if (isset($_GET['paginate'])) {
        $redirect_url = add_query_arg('paginate', $_GET['paginate'], $redirect_url);
    }
    return $redirect_url;
}
add_filter('redirect_canonical', 'keep_query_parameters', 10, 3);
remove_filter('template_redirect', 'redirect_canonical');

function get_current_url() {
    global $wp;
    return home_url(add_query_arg(array(), $wp->request));
}
function normalize($string)
{
    $normalized = htmlentities($string, ENT_QUOTES, 'UTF-8');
    $normalized = preg_replace('~&([a-z]{1,2})(?:acute|grave|circ|tilde|uml|ring|cedil|lig);~i', '$1', $normalized);
    return html_entity_decode($normalized, ENT_QUOTES, 'UTF-8');
}
add_post_type_support('page', 'excerpt');

add_action( 'acf/include_fields', function() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key' => 'group_6668dc37d7792',
        'title' => 'Opciones del Tema',
        'fields' => array(
            array(
                'key' => 'field_6668dc389f3df',
                'label' => 'Escoge un menú',
                'name' => 'escoge_un_menu',
                'aria-label' => '',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'principal' => 'Principal',
                    'principal-pt' => 'Principal-PT',
                    'secundario' => 'Secundario',
                    'secundario-pt' => 'Secundario-PT',
                ),
                'default_value' => false,
                'return_format' => 'value',
                'multiple' => 0,
                'allow_null' => 0,
                'ui' => 0,
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_6668e9805d47d',
                'label' => 'Texto Superior',
                'name' => 'texto_superior',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_6668e55bae6c1',
                'label' => 'Logos',
                'name' => 'logos',
                'aria-label' => '',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'layout' => 'table',
                'pagination' => 0,
                'min' => 2,
                'max' => 4,
                'collapsed' => '',
                'button_label' => 'Agregar Fila',
                'rows_per_page' => 20,
                'sub_fields' => array(
                    array(
                        'key' => 'field_6668e91aae6c2',
                        'label' => 'Logo',
                        'name' => 'logo',
                        'aria-label' => '',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                        'preview_size' => 'medium',
                        'parent_repeater' => 'field_6668e55bae6c1',
                    ),
                    array(
                        'key' => 'field_6668e93eae6c3',
                        'label' => 'Link',
                        'name' => 'link',
                        'aria-label' => '',
                        'type' => 'url',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'parent_repeater' => 'field_6668e55bae6c1',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'opciones-del-tema',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ) );
} );

//function desregistrar_taxonomia_autores_del_tema() {
//    unregister_taxonomy_for_object_type( 'autores', 'post','tribuna','investigacion' );
//
//    $labels = array(
//        'name'              => _x( 'Autores', 'taxonomy general name', 'textdomain' ),
//        'singular_name'     => _x( 'Autor', 'taxonomy singular name', 'textdomain' ),
//        'search_items'      => __( 'Buscar Autores', 'textdomain' ),
//        'all_items'         => __( 'Todos los Autores', 'textdomain' ),
//        'parent_item'       => __( 'Autor Padre', 'textdomain' ),
//        'parent_item_colon' => __( 'Autor Padre:', 'textdomain' ),
//        'edit_item'         => __( 'Editar Autor', 'textdomain' ),
//        'update_item'       => __( 'Actualizar Autor', 'textdomain' ),
//        'add_new_item'      => __( 'Añadir Nuevo Autor', 'textdomain' ),
//        'new_item_name'     => __( 'Nuevo Nombre de Autor', 'textdomain' ),
//        'menu_name'         => __( 'Autores', 'textdomain' ),
//    );
//
//    $args = array(
//        'hierarchical'      => false,
//        'labels'            => $labels,
//        'show_ui'           => true,
//        'show_admin_column' => true,
//        'query_var'         => true,
//        'rewrite'           => array( 'slug' => 'autor' ),
//        'show_in_rest'      => true, // Asegura que se muestre en el editor de Gutenberg
//        'rest_base'         => 'autores', // Asegura la ruta correcta en la API REST
//    );
//
//    register_taxonomy( 'autores', array( 'post','tribuna','investigacion' ), $args );
//}
//add_action( 'init', 'desregistrar_taxonomia_autores_del_tema' );





