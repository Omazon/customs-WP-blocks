<?php
add_action( 'acf/include_fields', function() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key' => 'group_667215a5d01a7',
        'title' => 'Bloque - Imagen Destacada',
        'fields' => array(
            array(
                'key' => 'field_667215a5a6424',
                'label' => 'Tipo de item destacado',
                'name' => 'tipo_de_item_destacado',
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
                    'imagen' => 'Imagen',
                    'video' => 'Vídeo',
                    'tribuna' => 'Tribuna',
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
                'key' => 'field_6672161da6425',
                'label' => 'ID del video de Youtube',
                'name' => 'id_del_video_de_youtube',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => 'Copia y peque el valor del ID de YouTube. Ej: qjOB4jb_06c',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_667215a5a6424',
                            'operator' => '==',
                            'value' => 'video',
                        ),
                    ),
                ),
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
                'key' => 'field_66722029cae5d',
                'label' => 'Selecciona Author',
                'name' => 'selecciona_author',
                'aria-label' => '',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_667215a5a6424',
                            'operator' => '==',
                            'value' => 'tribuna',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'taxonomy' => 'autores',
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'field_type' => 'select',
                'allow_null' => 0,
                'bidirectional' => 0,
                'multiple' => 0,
                'bidirectional_target' => array(
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/thumbnail',
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



