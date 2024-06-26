<?php
add_action( 'acf/include_fields', function() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key' => 'group_666e041bbe784',
        'title' => 'Bloque - Grid Multimedia',
        'fields' => array(
            array(
                'key' => 'field_666e041bfe6e7',
                'label' => 'Selecciona post grande',
                'name' => 'selecciona_post_grande',
                'aria-label' => '',
                'type' => 'relationship',
                'instructions' => 'Selecciona post para espacio grande',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'post',
                ),
                'post_status' => '',
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                ),
                'return_format' => 'id',
                'min' => 1,
                'max' => 1,
                'elements' => array(
                    0 => 'featured_image',
                ),
                'bidirectional' => 0,
                'bidirectional_target' => array(
                ),
            ),
            array(
                'key' => 'field_666e071b4b8ca',
                'label' => 'Selecciona post pequeño',
                'name' => 'selecciona_post_pequeno',
                'aria-label' => '',
                'type' => 'relationship',
                'instructions' => 'Selecciona post para espacio grande',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => '',
                'post_status' => '',
                'taxonomy' => array(
                    0 => 'category:especial',
                ),
                'filters' => array(
                    0 => 'search',
                ),
                'return_format' => 'id',
                'min' => 1,
                'max' => 1,
                'elements' => array(
                    0 => 'featured_image',
                ),
                'bidirectional' => 0,
                'bidirectional_target' => array(
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/grid-multimedia',
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

