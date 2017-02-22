<?php

/**
 * Places post-type
 *
 * @link    http://github.com/jjgrainger/wp-custom-post-type-class/
 *
 */

$nature = new CPT( [
    'post_type_name'   => 'nature',
    'singular'         => _x( 'Nature', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Nature', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Nature', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Nature', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'nature'
], [
    'hierarchical'  => true,
    'menu_position' => 20,
    'supports'      => [
        'title',
        'editor',
        'excerpt',
        'page-attributes',
        'thumbnail'
    ],
    'rewrite'       => [
        'with_front' => false
    ],
    'has_archive'   => true,
    'query_var'     => 'nature'

] );

$nature->menu_icon( "dashicons-editor-textcolor" );
$nature->set_textdomain( TEXT_DOMAIN );
$nature->register_taxonomy( [
    'taxonomy_name'    => 'type',
    'singular'         => _x( 'Tyyppi', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Tyypit', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Tyyppi', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Tyypit', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'type',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'type',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );
