<?php

/**
 * Widgetized areas
 *
 * @package Nattours
 *
 */

/**
 * Register widgetized areas
 */
add_action( 'widgets_init', function () {
    $widget_base = [
        'before_widget' => '<section class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget__title">',
        'after_title'   => '</h3>'
    ];

    register_sidebar( [
        'name' => __( 'Sidebar', TEXT_DOMAIN ),
        'id' => 'sidebar-main'
    ] + $widget_base );
} );
