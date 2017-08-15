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

$locations->register_taxonomy( [
    'taxonomy_name'    => 'mushrooms',
    'singular'         => _x( 'Mushroom', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Mushrooms', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Mushroom', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Mushrooms', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'mushrooms',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'mushrooms',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );

$locations->register_taxonomy( [
    'taxonomy_name'    => 'mosses_and_lichens',
    'singular'         => _x( 'Moss and lichen', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Mosses and lichens', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Moss and lichen', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Mosses and lichens', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'mosses_and_lichens',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'mosses_and_lichens',
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
    'taxonomy_name'    => 'mammals',
    'singular'         => _x( 'Mammal', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Mammals', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Mammal', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Mammals', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'mammals',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'mammals',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );

$locations->register_taxonomy( [
    'taxonomy_name'    => 'reptiles',
    'singular'         => _x( 'Reptile', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Reptiles', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Reptile', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Reptiles', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'reptiles',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'reptiles',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );

$locations->register_taxonomy( [
    'taxonomy_name'    => 'amphibian',
    'singular'         => _x( 'Amphibian', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Amphibians', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Amphibian', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Amphibians', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'amphibian',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'amphibian',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );

$locations->register_taxonomy( [
    'taxonomy_name'    => 'insects',
    'singular'         => _x( 'Insect', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Insects', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Insect', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Insects', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'insects',
    [
        'query_var' => true,
        'rewrite'   => [
            'slug'         => 'insects',
            'with_front'   => false,
            'hierarchical' => true
        ],
        'sort'      => true
    ]
] );
