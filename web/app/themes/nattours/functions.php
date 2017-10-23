<?php

/**
 * Main functions and definitions
 *
 * @package Nattours
 */

/**
 * Require helpers
 */
require dirname( __FILE__ ) . '/library/functions/helpers.php';

/**
 * Set theme name which will be referenced from style & script registrations
 * @return WP_Theme
 */
function nattours_theme() {
    return wp_get_theme();
}

/**
 * Set custom imagesizes
 *
 * @return array
 */
function nattours_set_imagesizes() {
    return [
        [
            'name'   => 'location_thumb',
            'width'  => 611,
            'height' => 304,
            'crop'   => true
        ],
        [
            'name'   => 'header_img',
            'width'  => 1500,
            'height' => 500,
            'crop'   => true
        ]
    ];
}

/**
 * If defined, the feed will be shown on admin dashboard
 */
define( 'FEED_URI', 'http://omnipartners.fi/feed' );

/**
 * Define Translation domain which will be used on WP __() & _e() -functions
 *
 * note: change also the one on style.css also
 */
define( 'TEXT_DOMAIN', 'nord' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 640;
}

/**
 * Set up theme defaults and register support for various WordPress features.
 */
if ( ! function_exists( 'nattours_setup' ) ) :

    function nattours_setup() {

        global $cap, $content_width;

        /**
         * Load textdomain
         */
        load_theme_textdomain( TEXT_DOMAIN, get_template_directory() . '/library/lang' );

        /**
         * Add editor styling
         */
        add_editor_style( asset_uri( 'styles/main.css' ) );

        /**
         * Require some classes
         */
        require_files( dirname( __FILE__ ) . '/library/classes' );

        /**
         * Require custom post types
         */
        require_files( dirname( __FILE__ ) . '/library/custom-posts' );

        /**
         * Require metaboxes
         */
        require_files( dirname( __FILE__ ) . '/library/metaboxes' );

        /**
         * Widgets (nav-menus & widgetized areas)
         */
        require_files( dirname( __FILE__ ) . '/library/widgets' );

        /**
         * Functions and helpers
         */
        require_files( dirname( __FILE__ ) . '/library/functions' );

        /**
         * Hooks
         */
        require_files( dirname( __FILE__ ) . '/library/hooks' );

        /**
         * Theme supports
         */
        if ( function_exists( 'add_theme_support' ) ) {
            add_theme_support( 'automatic-feed-links' );
            add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );
            add_theme_support( 'post-thumbnails' );
            add_theme_support( 'title-tag' );
            //add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
        }

        /**
         * Register custom imagesizes
         */
        if ( ! empty( nattours_set_imagesizes() ) ) {
            foreach ( nattours_set_imagesizes() as $size ) {
                add_image_size( $size['name'], $size['width'], $size['height'], $size['crop'] );
            }
        }

    }

endif; // nattours_setup

add_action( 'after_setup_theme', 'nattours_setup' );

/**
 * Add feed (if defined) to dashboard
 */
add_action( 'wp_dashboard_setup', function () {
    if ( defined( 'FEED_URI' ) ) {
        add_meta_box( 'dashboard_custom_feed', 'Feed', 'nattours_feed', 'dashboard', 'side', 'low' );
    }

    function nattours_feed() {
        echo '<div class="rss-widget">';
        wp_widget_rss_output( [
            'url'          => FEED_URI,
            'title'        => __( 'Title', TEXT_DOMAIN ),
            'items'        => 2,
            'show_title'   => 0,
            'show_summary' => 1,
            'show_author'  => 0,
            'show_date'    => 1
        ] );
        echo "</div>";
    }
} );

/**
 * Add admin scripts & styles
 */
function nattours_admin_style() {
    echo '<link rel="stylesheet" href="' . asset_uri( 'styles/admin.css' ) . '" type="text/css" media="all" />';
}

add_action( 'login_head', 'nattours_admin_style' );
add_action( 'admin_head', 'nattours_admin_style' );

add_action( 'admin_enqueue_scripts', function () {
    wp_enqueue_script(
        'nord-admin',
        asset_uri( 'scripts/admin.min.js' ),
        [ 'jquery' ],
        nattours_theme()->get( 'Version' )
    );
} );

/**
 * Add text to theme footer
 */
add_filter( 'admin_footer_text', function () {
    return '<span id="footer-thankyou">' . nattours_theme()->Name . ' by: <a href="' . nattours_theme()->AuthorURI . '" target="_blank">' . nattours_theme()->Author . '</a><span>';
} );

/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', function () {

    /**
     * Main scripts file
     */
    wp_enqueue_script(
        'nord-theme',
        asset_uri( 'scripts/main.min.js' ),
        [ 'jquery' ],
        nattours_theme()->get( 'Version' ),
        true
    );

    /**
     * Main style
     */
    wp_enqueue_style(
        'nord-style',
        asset_uri( 'styles/main.css' ),
        [],
        nattours_theme()->get( 'Version' )
    );

    wp_localize_script(
        'nord-theme',
        'nattours_vars',
        [
            'home' => get_the_post_thumbnail_url(null, 'header_img'),
            'nature' => get_field('nature_image'),
            'services' => get_field('services_image'),
            'species' => get_field('species_image'),
            'history' => get_field('history_image'),
        ]
    );
} );

/**
 * Allow svg-uploads
 */
add_filter( 'upload_mimes', function ( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['geojson'] = 'application/vnd.geo+json';

    return $mimes;
} );

/**
 * Change default WP-API endpoints
 *
 * @return mixed|void
 */

add_filter( 'rest_url_prefix', function () {
    return 'api';
} );

add_filter( 'json_url_prefix', function () {
    return 'api';
} );

/**
 * Move WP-templates to templates-folder for cleaner experience on dev
 */
add_filter( 'stylesheet', function ( $stylesheet ) {
    return dirname( $stylesheet );
} );

add_action( 'after_switch_theme', function () {
    $stylesheet = get_option( 'stylesheet' );
    if ( basename( $stylesheet ) !== 'templates' ) {
        update_option( 'stylesheet', $stylesheet . '/templates' );
    }
} );

/**
 * Register local ACF-json
 */
add_filter( 'acf/settings/save_json', function () {
    return get_stylesheet_directory() . '/acf-data';
} );

/**
 * Add setting-page through ACF
 */
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( 'Nattours' );
}

/**
* Get first paragraph from text content.
*
* @param $text
*
* @return string
*/
function get_first_paragraph( $text ) {
	$str = wpautop( $text );
	$str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
	$str = strip_tags($str, '<a><strong><em>');
    $str = preg_replace( "/\[.*\]\s*/", "", $str );
	return '<p>' . $str . '</p>';
}

function my_acf_init() {

	acf_update_setting('google_api_key', 'AIzaSyCpsxz-LCgYLUxT1J6eacLwgEBsprfnc_U');
}

add_action('acf/init', 'my_acf_init');

/**
 * Register strings for polylang
 *
 */
if(function_exists('pll_register_string')) {
    pll_register_string( 'Explore the urban nature of Helsinki', 'Explore the urban nature of Helsinki' );
    pll_register_string( 'Read entire introduction', 'Read entire introduction' );
    pll_register_string( 'Read more about services and routes', 'Read more about services and routes' );
    pll_register_string( 'Read more about nature', 'Read more about nature' );
    pll_register_string( 'Read more about history', 'Read more about history' );
    pll_register_string( 'Locations on map', 'Locations on map' );
    pll_register_string( 'Services and routes', 'Services and routes' );
    pll_register_string( 'Location on map', 'Location on map' );
    pll_register_string( 'Home', 'Home' );
    pll_register_string( 'Nature', 'Nature' );
    pll_register_string( 'Routes', 'Routes' );
    pll_register_string( 'Species', 'Species' );
    pll_register_string( 'Further information', 'Further information' );
    pll_register_string( 'Opening hours and further info at:', 'Opening hours and further info at:' );
    pll_register_string( 'Services', 'Services' );
    pll_register_string( 'Rare', 'Rare' );
    pll_register_string( 'Helsinki', 'Helsinki' );
    pll_register_string( 'All locations', 'All locations' );
    pll_register_string( 'History', 'History' );
    pll_register_string( 'Plants', 'Plants' );
    pll_register_string( 'Mushrooms', 'Mushrooms' );
    pll_register_string( 'Mosses and lichens', 'Mosses and lichens' );
    pll_register_string( 'Birds', 'Birds' );
    pll_register_string( 'Mammals', 'Mammals' );
    pll_register_string( 'Reptiles', 'Reptiles' );
    pll_register_string( 'Amphibians', 'Amphibians' );
    pll_register_string( 'Insects', 'Insects' );
    pll_register_string( 'Locations', 'Locations' );
    pll_register_string( 'Filter locations', 'Filter locations' );
    pll_register_string( 'Helsinki', 'Helsinki' );
    pll_register_string( 'Language', 'Language' );
    pll_register_string( 'Menu', 'Menu' );
    pll_register_string( 'Helsinki nature documentary', 'Helsinki nature documentary' );
    pll_register_string( 'Video, 10min', 'Video, 10min' );
    pll_register_string( 'Difficulty', 'Difficulty' );
    pll_register_string( 'Season', 'Season' );
    pll_register_string( 'Activity', 'Activity' );
    pll_register_string( 'Other', 'Other' );
    pll_register_string( 'Directions to location', 'Directions to location' );
    pll_register_string( 'Find the best route and transportation from Reittiopas', 'Find the best route and transportation from Reittiopas' );
    pll_register_string( 'Open in Reittiopas', 'Open in Reittiopas' );
    pll_register_string( 'Map', 'Map' );
    pll_register_string( 'Species in Luontoportti', 'Species in Luontoportti' );
    pll_register_string( 'More info about the species ', 'More info about the species ' );
    pll_register_string( 'Luontoportti', 'Luontoportti' );
    pll_register_string( 'Instagram', 'Instagram' );
    pll_register_string( 'Read more about species', 'Read more about species' );
    pll_register_string( 'Read more', 'Read more' );
}
