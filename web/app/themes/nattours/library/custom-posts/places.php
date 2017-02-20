<?php

/**
 * Places post-type
 *
 * @link    http://github.com/jjgrainger/wp-custom-post-type-class/
 *
 */

$places = new CPT( [
    'post_type_name'   => 'place',
    'singular'         => _x( 'Place', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Places', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Place', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Places', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'place'
], [
    'hierarchical'  => true,
    'menu_position' => 20,
    'supports'      => [
        'title',
        'editor',
        'excerpt',
        'page-attributes'
    ],
    'rewrite'       => [
        'with_front' => false
    ],
    'has_archive'   => true,
    'query_var'     => 'place'

] );

$places->menu_icon( "dashicons-editor-textcolor" );
$places->set_textdomain( TEXT_DOMAIN );
$places->register_taxonomy( [
    'taxonomy_name'    => 'topic',
    'singular'         => _x( 'Topic', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Topics', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Topic', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Topics', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'topic',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'topic',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );
