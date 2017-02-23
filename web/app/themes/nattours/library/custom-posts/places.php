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
        'page-attributes',
        'thumbnail'
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
    'taxonomy_name'    => 'difficulty',
    'singular'         => _x( 'Difficulty', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Difficulties', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Difficulty', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Difficulties', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'difficulty',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'difficulty',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );

$places->register_taxonomy( [
    'taxonomy_name'    => 'season',
    'singular'         => _x( 'Season', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Seasons', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Season', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Seasons', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'season',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'season',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );

$places->register_taxonomy( [
    'taxonomy_name'    => 'activities',
    'singular'         => _x( 'Activity', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Activities', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Activity', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Activities', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'activities',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'activities',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );

$places->register_taxonomy( [
    'taxonomy_name'    => 'other',
    'singular'         => _x( 'Other', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Others', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Other', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Others', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'other',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'other',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );

$places->register_taxonomy( [
    'taxonomy_name'    => 'birds',
    'singular'         => _x( 'Bird', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Birds', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Bird', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Birds', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'birds',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'birds',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );

$places->register_taxonomy( [
    'taxonomy_name'    => 'animals',
    'singular'         => _x( 'Animal', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Animals', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Animal', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Animals', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'animals',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'animals',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );

$places->register_taxonomy( [
    'taxonomy_name'    => 'plants',
    'singular'         => _x( 'Plant', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Plants', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Plant', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Plants', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'plants',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'plants',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );
