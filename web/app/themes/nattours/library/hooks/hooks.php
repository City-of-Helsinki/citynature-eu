<?php

/**
 * Filter video oembeds and wrap with Foundations flex-video
 *
 * @param $html
 * @param $url
 * @param $attr
 * @param $post_id
 *
 * @return string
 */
add_filter( 'embed_oembed_html', function ( $html, $url, $attr, $post_id ) {
	$matches = [
		'youtube.com',
		'vimeo.com',
		'youtu.be'
	];

	foreach ( $matches as $match ) {
		if ( false !== stripos( $url, $match ) ) {
			return '<div class="framecontainer">' . $html . '</div>';
		}
	}

	return $html;
}, 99, 4 );

/**
 * Remove h1-tag from tinyMCE, show second row by default
 */
add_filter( 'tiny_mce_before_init', function ( $init ) {
	$tinymce['wordpress_adv_hidden'] = false;
	$init['block_formats']           = "Paragraph=p;Address=address;Pre=pre;Heading 2=h2;Heading 3=h3;Heading 4=h4";

	return $init;
} );

/**
 * Add TagManager-script (if defined)
 *
 * @hook nattours_after_body
 */
add_action( 'nattours_after_body', function () {
	$options = get_option( 'nattours_general_options' );

	if ( ! empty( $options['nattours_tagmanager'] ) ) :
		echo $options['nattours_tagmanager'];
	endif;
} );

/**
 * Add favicons / app-icons / manifests to head
 *
 * @hook wp_head
 */
add_action( 'wp_head', function () {
	$imageUri = UTILS()->get_image_uri();

	echo <<<EOT
	\n

	<link rel="icon" type="image/png" sizes="192x192" href="{$imageUri}/icons/android-chrome-192x192.png">
    <link rel="manifest" href="{$imageUri}/icons/manifest.json">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#ffffff">

    <link rel="apple-touch-icon" sizes="57x57" href="{$imageUri}/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{$imageUri}/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{$imageUri}/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{$imageUri}/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{$imageUri}/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{$imageUri}/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{$imageUri}/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{$imageUri}/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{$imageUri}/icons/apple-touch-icon-180x180.png">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="icon" type="image/png" sizes="228x228" href="{$imageUri}/icons/coast-228x228.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{$imageUri}/icons/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{$imageUri}/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{$imageUri}/icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="230x230" href="{$imageUri}/icons/favicon-230x230.png">

    <link rel="shortcut icon" href="{$imageUri}/icons/favicon.ico">
    <link rel="yandex-tableau-widget" href="{$imageUri}/icons/yandex-browser-manifest.json">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{$imageUri}/icons/mstile-144x144.png">
    <meta name="msapplication-config" content="{$imageUri}/icons/browserconfig.xml">

	<link rel="manifest" href="{$imageUri}/icons/manifest.webapp">
    <link rel="manifest" href="{$imageUri}/icons/manifest.json">
	\n
EOT;
}, 999 );

/**
 * Hook city name to body class
 */
add_filter( 'body_class', function ( $classes ) {
	global $post;

	if ( $post->post_type === 'location' ) {
		$terms = get_the_terms( $post, 'location-city' );

		if ( ! is_wp_error( $terms ) ) {
			if ( $terms ) {
				foreach ( $terms as $term ) {
					$classes[] = 'location-' . $term->slug;
				}
			}
		}
	} elseif ( is_page_template( 'custom-templates/locations-front-page.php' ) ) {
		$term = get_term( get_field( 'city_location', $post->ID ), 'location-city' );

		if ( ! is_wp_error( $term ) ) {
			$classes[] = 'location-' . $term->slug;
		}
	}

	return $classes;
} );
