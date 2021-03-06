<?php

/**
 * WP-nav-menus
 *
 * @package Nattours
 */

/**
 * Main menu
 */
function nattours_main_menu() {
	wp_nav_menu( [
		'theme_location'  => 'top_nav',
		'container'       => false,
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => '',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '%3$s',
		'depth'           => 4,
		'walker'          => new Nord\WP_navwalker
	] );
}

/**
 * Main menu
 */
function nattours_footer_menu() {
	wp_nav_menu( [
		'theme_location'  => 'footer_nav',
		'container'       => false,
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => '',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '%3$s',
		'depth'           => 1,
	] );
}

/**
 * Register the menu
 */
register_nav_menus( [
	'top_nav'    => __( 'Main menu', TEXT_DOMAIN ),
	'footer_nav' => __( 'Footer menu', TEXT_DOMAIN ),
] );
