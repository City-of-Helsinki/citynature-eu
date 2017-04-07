<?php

/**
 * Routes post-type
 *
 * @link    http://github.com/jjgrainger/wp-custom-post-type-class/
 *
 */

$routes = new CPT( [
    'post_type_name'   => 'route',
    'singular'         => _x( 'Routes', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Routes', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Routes', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Routes', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'route'
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
    'query_var'     => 'route'

] );

$routes->menu_icon( "dashicons-editor-textcolor" );
$routes->set_textdomain( TEXT_DOMAIN );
