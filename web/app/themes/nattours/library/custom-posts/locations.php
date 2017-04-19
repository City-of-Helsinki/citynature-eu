<?php

/**
 * Locations post-type
 *
 * @link    http://github.com/jjgrainger/wp-custom-post-type-class/
 *
 */

$locations = new CPT( [
    'post_type_name'   => 'location',
    'singular'         => _x( 'Location', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Locations', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Location', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Locations', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'location'
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
    'query_var'     => 'location'

] );

$locations->menu_icon( "dashicons-editor-textcolor" );
$locations->set_textdomain( TEXT_DOMAIN );
$locations->register_taxonomy( [
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

$locations->register_taxonomy( [
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

$locations->register_taxonomy( [
    'taxonomy_name'    => 'activity',
    'singular'         => _x( 'Activity', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Activities', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Activity', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Activities', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'activity',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'activity',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );

$locations->register_taxonomy( [
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

$locations->register_taxonomy( [
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

$locations->register_taxonomy( [
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

$locations->register_taxonomy( [
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
