<?php

//$routes = get_posts( [
//	'post_type'      => 'route',
//	'posts_per_page' => - 1,
//	'orderby'        => 'title',
//	'order'          => 'ASC',
//	'meta_query'     => [
//		[
//			'key'     => 'route_location',
//			'value'   => get_the_ID(),
//			'compare' => 'LIKE'
//		]
//	]
//] );
//
//$services = get_posts( [
//	'post_type'      => 'service',
//	'posts_per_page' => - 1,
//	'orderby'        => 'title',
//	'order'          => 'ASC',
//	'meta_query'     => [
//		[
//			'key'     => 'service_location',
//			'value'   => get_the_ID(),
//			'compare' => 'LIKE'
//		]
//	]
//] );

$services_bg = get_field( 'services_image' );

$services_map = get_field( 'services_map' );

?>

<style>
    .header--location {
        background: linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.1) 10%,
                rgba(0, 0, 0, 0.1) 70%,
                rgba(0, 0, 0, 0.6)
        ),
        url(<?= $services_bg['url'] ?>) center/cover no-repeat;
    }
</style>

</header>
<?php if ( wp_get_img_caption( $services_bg['id'] ) ): ?>
    <span class="img-caption"><?= wp_get_img_caption( $services_bg['id'] ); ?></span>
<?php endif; ?>

<main class="location__services">
    <section class="content--left">
        <div class="text-content">
			<?= get_field( 'services_text' ); ?>
        </div>
		<?php if ( get_field( 'servicemap_id' ) ) : ?>
            <div class="text-content outer-link">
                <span class="h7"><?= pll__( 'Directions to location' ); ?></span>
                <p><?= pll__( 'Find the best route and transportation from Reittiopas' ); ?></p>
                <a href="//palvelukartta.hel.fi/unit/<?php the_field( 'servicemap_id' ); ?>#!route-details"
                   target="_blank"><?= pll__( 'Open in Reittiopas' ); ?></a>
            </div>
		<?php endif; ?>
        <div class="graphic-content visible-xs">
            <div>
				<?php
				$map     = "[leaflet-map fit_markers=1 height=50vw][leaflet-geojson src=$services_map fitbounds=1]";
				$map_arr = [];
				array_push( $map_arr, $map );
				if ( have_rows( 'services_markers' ) ): while ( have_rows( 'services_markers' ) ): the_row();
					$location = get_sub_field( 'location' );
					$lat      = $location['lat'];
					$lng      = $location['lng'];
					$icon     = get_sub_field( 'icon' )['sizes']['map_marker'];
					$width    = get_sub_field( 'width' );
					$height   = get_sub_field( 'height' );
					$content  = get_sub_field( 'content' );
					array_push( $map_arr, "[leaflet-marker iconUrl=\"$icon\" iconSize=\"$width,$height\" lat=\"$lat\" lng=\"$lng\"] $content [/leaflet-marker]" );
				endwhile; endif;
				echo do_shortcode( implode( $map_arr ) );
				?>
            </div>
        </div>
    </section>
    <section class="content--right hidden-xs">
		<?php
		$map     = "[leaflet-map fit_markers=1 height=600][leaflet-geojson src=$services_map fitbounds=1]";
		$map_arr = [];
		array_push( $map_arr, $map );
		if ( have_rows( 'services_markers' ) ): while ( have_rows( 'services_markers' ) ): the_row();
			$location = get_sub_field( 'location' );
			$lat      = $location['lat'];
			$lng      = $location['lng'];
			$icon     = get_sub_field( 'icon' )['sizes']['map_marker'];
			$width    = get_sub_field( 'width' );
			$height   = get_sub_field( 'height' );
			$content  = get_sub_field( 'content' );
			array_push( $map_arr, "[leaflet-marker iconUrl=\"$icon\" iconSize=\"$width,$height\" lat=\"$lat\" lng=\"$lng\"] $content [/leaflet-marker]" );
		endwhile; endif;
		echo '<div class="map">';
		echo do_shortcode( implode( $map_arr ) );
		echo '</div>';
		?>
    </section>
</main>
