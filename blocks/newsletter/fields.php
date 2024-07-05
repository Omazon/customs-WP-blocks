<?php
add_action( 'acf/include_fields', function() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key' => 'group_666b7c0dbafb4',
        'title' => 'Bloque - Newsletter',
        'fields' => array(
            array(
                'key' => 'field_666dfe44ca4e2',
                'label' => 'Incluir Newsletter',
                'name' => 'incluir_newsletter',
                'aria-label' => '',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
                'ui' => 1,
            ),
            array(
                'key' => 'field_667254873cb65',
                'label' => 'Incluir RSS',
                'name' => 'incluir_rss',
                'aria-label' => '',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
                'ui' => 1,
            ),
            array(
                'key' => 'field_6680accc556ca',
                'label' => 'RSS',
                'name' => '',
                'aria-label' => '',
                'type' => 'accordion',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_667254873cb65',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'open' => 0,
                'multi_expand' => 0,
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_6680acf5556cb',
                'label' => 'RSS Título',
                'name' => 'rss_titulo',
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
                'key' => 'field_6672549a3cb66',
                'label' => 'RSS',
                'name' => 'rss',
                'aria-label' => '',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'wprss_feed',
                ),
                'post_status' => '',
                'taxonomy' => '',
                'return_format' => 'id',
                'multiple' => 0,
                'allow_null' => 0,
                'bidirectional' => 0,
                'ui' => 1,
                'bidirectional_target' => array(
                ),
            ),
            array(
                'key' => 'field_666b7c0dfe451',
                'label' => 'Newsletter',
                'name' => '',
                'aria-label' => '',
                'type' => 'accordion',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_666dfe44ca4e2',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'open' => 0,
                'multi_expand' => 0,
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_666b7c3efe452',
                'label' => 'Link de Newsletter',
                'name' => 'link_de_newsletter',
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
            ),
            array(
                'key' => 'field_666b7c49fe453',
                'label' => 'Posts',
                'name' => '',
                'aria-label' => '',
                'type' => 'accordion',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'open' => 0,
                'multi_expand' => 0,
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_666b7c5afe454',
                'label' => 'Selecciona Posts',
                'name' => 'selecciona_posts',
                'aria-label' => '',
                'type' => 'relationship',
                'instructions' => 'El bloque solo puede mostrar un máximo de 4 elementos, siguiendo esta prioridad: Post > Newsletter > RSS.

**Si seleccionas 4 Posts: No se mostrará Newsletter ni RSS, aunque estén activos.
**Si quieres ver Newsletter: Selecciona 3 Post y activa Newsletter.
**Si quieres ver Post + Newsletter + RSS: Selecciona 2 Post y activa Newsletter y RSS.
**Si tienes activado Newsletter y RSS y agregas un tercer Post: RSS desaparecerá porque los Post tienen mayor prioridad.

En resumen, la prioridad es mostrar primero los Post, luego el Newsletter, y finalmente el RSS, ajustándose siempre al límite de 4 elementos.',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'post',
                    1 => 'tribuna',
                    2 => 'investigacion',
                    3 => 'institucion',
                ),
                'post_status' => '',
                'taxonomy' => array(
                    0 => 'category:2019',
                    1 => 'category:2020',
                    2 => 'category:2021',
                    3 => 'category:2022',
                    4 => 'category:2023',
                    5 => 'category:2024',
                    6 => 'category:2024-sera-clave-para-entender-y-canalizar-la-ia',
                    7 => 'category:campana-30-aniversario',
                    8 => 'category:30-anos-de-cumbres-iberoamericanas',
                    9 => 'category:a-debate',
                    10 => 'category:acoso-sexual-callejero',
                    11 => 'category:actualidad',
                    12 => 'category:adultos-mayores',
                    13 => 'category:afrodescendientes',
                    14 => 'category:agenda-2030',
                    15 => 'category:agricultura',
                    16 => 'category:agua',
                    17 => 'category:algoritmos-minijobs-y-precariado-digital',
                    18 => 'category:alianzas-para-el-desarrollo-sostenible',
                    19 => 'category:analisis',
                    20 => 'category:andorra',
                    21 => 'category:apertura',
                    22 => 'category:archivos',
                    23 => 'category:area-metropolitana',
                    24 => 'category:argentina',
                    25 => 'category:artes-escenicas',
                    26 => 'category:artesania',
                    27 => 'category:asentamientos-informales',
                    28 => 'category:ayuda-al-desarrollo',
                    29 => 'category:bibliotecas',
                    30 => 'category:bolivia',
                    31 => 'category:brasil',
                    32 => 'category:cambio-climatico',
                    33 => 'category:cambio-climatico-2',
                    34 => 'category:camino-a-la-cumbre-iberoamericana',
                    35 => 'category:camino-a-la-igualdad-de-genero',
                    36 => 'category:camino-a-la-igualdad-de-genero-3',
                    37 => 'category:camino-a-la-igualdad-de-genero-2',
                    38 => 'category:capacidades',
                    39 => 'category:chile',
                    40 => 'category:ciencia',
                    41 => 'category:ciencia-tecnologia-e-innovacion',
                    42 => 'category:cine',
                    43 => 'category:ciudadania',
                    44 => 'category:ciudades',
                    45 => 'category:ciudades-nueva-frontera-para-el-desarrollo',
                    46 => 'category:cocina',
                    47 => 'category:cohesion-social',
                    48 => 'category:colombia',
                    49 => 'category:comunicacion',
                    50 => 'category:conocimiento',
                    51 => 'category:conservacion-ecosistemas',
                    52 => 'category:cooperacion',
                    53 => 'category:cooperacion-feminista',
                    54 => 'category:cooperacion-iberoamericana-2',
                    55 => 'category:cooperacion-iberoamericana',
                    56 => 'category:cooperacion-iberoamericana-en-salud',
                    57 => 'category:cooperacion-sur-sur',
                    58 => 'category:cooperacion-sur-sur-2',
                    59 => 'category:cooperacion-triangular',
                    60 => 'category:cooperar-es-crecer',
                    61 => 'category:costa-rica',
                    62 => 'category:covid-19',
                    63 => 'category:cuarto-sector-2',
                    64 => 'category:cuarto-sector',
                    65 => 'category:cuba',
                    66 => 'category:cultura',
                    67 => 'category:cultura-para-el-desarrollo',
                    68 => 'category:cultura-y-bilinguismo',
                    69 => 'category:cultura-y-desarrollo-2',
                    70 => 'category:cultura-y-desarrollo',
                    71 => 'category:cumbre-del-clima',
                    72 => 'category:cumbres-iberoamericanas',
                    73 => 'category:deporte',
                    74 => 'category:derechos',
                    75 => 'category:derechos-digitales-2024',
                    76 => 'category:especial-derechos-digitales',
                    77 => 'category:derechos-digitales',
                    78 => 'category:desarrollo',
                    79 => 'category:desarrollo-sostenible',
                    80 => 'category:desigualdad',
                    81 => 'category:destacado',
                    82 => 'category:digitalizacion',
                    83 => 'category:diplomacia-cultural',
                    84 => 'category:discapacidad',
                    85 => 'category:discapacidad-2',
                    86 => 'category:diversidad',
                    87 => 'category:economia',
                    88 => 'category:economia-de-los-cuidados',
                    89 => 'category:ecuador',
                    90 => 'category:educacion',
                    91 => 'category:educacion-superior',
                    92 => 'category:el-salvador',
                    93 => 'category:empleo',
                    94 => 'category:empleo-temas',
                    95 => 'category:emprendimiento',
                    96 => 'category:empresa',
                    97 => 'category:energia',
                    98 => 'category:energias-renovables',
                    99 => 'category:entrevista',
                    100 => 'category:espana',
                    101 => 'category:espana-temas',
                    102 => 'category:especial',
                    103 => 'category:alianzas-ods-17',
                    104 => 'category:familia',
                    105 => 'category:formacion',
                    106 => 'category:fotografia-2',
                    107 => 'category:garantias-sociales',
                    108 => 'category:gastronomia',
                    109 => 'category:gastronomia-sostenible',
                    110 => 'category:genero',
                    111 => 'category:genero-2',
                    112 => 'category:onda-global',
                    113 => 'category:globalizacion',
                    114 => 'category:gobierno',
                    115 => 'category:gobierno-abierto',
                    116 => 'category:guatemala',
                    117 => 'category:hacia-una-agenda-medioambiental-iberoamericana',
                    118 => 'category:historia',
                    119 => 'category:honduras',
                    120 => 'category:onda-iberoamerica',
                    121 => 'category:iberoamerica-en-la-era-del-conocimiento',
                    122 => 'category:iberoamerica-en-transformacion',
                    123 => 'category:iberoamerica-frente-al-covid-19',
                    124 => 'category:identidad',
                    125 => 'category:igualdad-juridica',
                    126 => 'category:impacto-socioeconomico-de-la-pandemia',
                    127 => 'category:inclusion',
                    128 => 'category:indigenas',
                    129 => 'category:industria',
                    130 => 'category:infancia',
                    131 => 'category:infraestructuras',
                    132 => 'category:innovacion',
                    133 => 'category:innovacion-2',
                    134 => 'category:innovacion-ciudadana',
                    135 => 'category:innovacion-para-el-cambio',
                    136 => 'category:innovacion-para-un-nuevo-tiempo',
                    137 => 'category:innovacion-publica',
                    138 => 'category:innovacion-tecnologica',
                    139 => 'category:instituciones',
                    140 => 'category:integracion',
                    141 => 'category:inteligencia-artificial-y-etica',
                    142 => 'category:interculturalidad',
                    143 => 'category:investigacion-temas',
                    144 => 'category:investigacion',
                    145 => 'category:justicia',
                    146 => 'category:juventud',
                    147 => 'category:literatura',
                    148 => 'category:lo-mas-destacado-de-2020',
                    149 => 'category:medio-ambiente',
                    150 => 'category:medio-rural',
                    151 => 'category:mexico',
                    152 => 'category:migracion',
                    153 => 'category:movilidad',
                    154 => 'category:mujeres',
                    155 => 'category:municipios',
                    156 => 'category:museos',
                    157 => 'category:musica',
                    158 => 'category:nicaragua',
                    159 => 'category:noticias-de-otros-medios',
                    160 => 'category:destacado-2',
                    161 => 'category:ods',
                    162 => 'category:onda-destacada',
                    163 => 'category:onda-pais',
                    164 => 'category:ongs',
                    165 => 'category:organismos-iberoamericanos',
                    166 => 'category:organismos-internacionales',
                    167 => 'category:orquestas',
                    168 => 'category:panama',
                    169 => 'category:paraguay',
                    170 => 'category:participacion',
                    171 => 'category:patrimonio',
                    172 => 'category:paz',
                    173 => 'category:pensamiento-iberoamericano',
                    174 => 'category:peru',
                    175 => 'category:politica',
                    176 => 'category:politicas-publicas',
                    177 => 'category:portugal',
                    178 => 'category:programas-iniciativas-y-proyectos-adscritos',
                    179 => 'category:pueblos-indigenas',
                    180 => 'category:pueblos-indigenas-2',
                    181 => 'category:r-dominicana',
                    182 => 'category:redes-iberoamericanas',
                    183 => 'category:regionalismo',
                    184 => 'category:relaciones-internacionales',
                    185 => 'category:resultados-xxviii-cumbre-iberoamericana',
                    186 => 'category:salud',
                    187 => 'category:salud-mental',
                    188 => 'category:seguridad-alimentaria-y-cambio-climatico',
                    189 => 'category:seguridad-social',
                    190 => 'category:semana-de-la-cooperacion-iberoamericana-2019',
                    191 => 'category:soberania-alimentaria',
                    192 => 'category:sociedad-civil',
                    193 => 'category:sostenibilidad',
                    194 => 'category:stem',
                    195 => 'category:tecnologia',
                    196 => 'category:television',
                    197 => 'category:destacado-1',
                    198 => 'category:temas',
                    199 => 'category:trabajo-digno',
                    200 => 'category:transicion-energetica',
                    201 => 'category:transicion-energetica-en-iberoamerica',
                    202 => 'category:transporte',
                    203 => 'category:tribuna',
                    204 => 'category:tribuna-2',
                    205 => 'category:turismo',
                    206 => 'category:turismo-sostenible-2',
                    207 => 'category:turismo-sostenible',
                    208 => 'category:una-agenda-medioambiental-para-iberoamerica',
                    209 => 'category:una-cooperacion-innovadora',
                    210 => 'category:una-nueva-cooperacion',
                    211 => 'category:una-nueva-economia-post-covid',
                    212 => 'category:universidad',
                    213 => 'category:universidades-iberoamericanas',
                    214 => 'category:uruguay',
                    215 => 'category:venezuela',
                    216 => 'category:vivienda',
                    217 => 'category:voces-de-iberoamerica',
                    218 => 'category:voluntariado',
                    219 => 'category:xxvii-cumbre-iberoamericana',
                ),
                'filters' => array(
                    0 => 'search',
                    1 => 'taxonomy',
                ),
                'return_format' => 'id',
                'min' => 2,
                'max' => 4,
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
                    'value' => 'acf/newsletter',
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