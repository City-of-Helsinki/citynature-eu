<?php

/**
 * Services post-type
 *
 * @link    http://github.com/jjgrainger/wp-custom-post-type-class/
 *
 */

$services = new CPT( [
    'post_type_name'   => 'service',
    'singular'         => _x( 'Service', 'Single', TEXT_DOMAIN ),
    'plural'           => _x( 'Services', 'Plural', TEXT_DOMAIN ),
    'partitive'        => _x( 'Service', 'Partitive', TEXT_DOMAIN ),
    'partitive_plural' => _x( 'Services', 'Partitive plural', TEXT_DOMAIN ),
    'slug'             => 'service'
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
    'query_var'     => 'service'

] );

$services->menu_icon( "dashicons-editor-textcolor" );
$services->set_textdomain( TEXT_DOMAIN );
