<?php

$routes = get_posts([
  'post_type'		    => 'route',
  'posts_per_page'	=> -1,
  'orderby'         => 'title',
  'order'           => 'ASC',
  'meta_query'		  => [
    [
      'key'     => 'route_location',
      'value'   => get_the_ID(),
      'compare' => 'LIKE'
    ]
  ]
]);

$services = get_posts([
  'post_type'		    => 'service',
  'posts_per_page'	=> -1,
  'orderby'         => 'title',
  'order'           => 'ASC',
  'meta_query'		  => [
    [
      'key'     => 'service_location',
      'value'   => get_the_ID(),
      'compare' => 'LIKE'
    ]
  ]
]);

$services_bg = get_field('services_image');

$services_map = get_field( 'services_map' );

?>

<article class="location__services">
	<section class="content--left">
    <div class="text-content"> 
			<?= get_field( 'services_text' ); ?>
    </div>
		<div class="graphic-content visible-xs">
			<div>
        <?= do_shortcode( "[leaflet-map height=50vw][leaflet-geojson src=$services_map fitbounds=1 popup_property=\"message\"]" ) ?>
      </div>
		</div>
    <?php if( $routes ) : ?>
      <div class="text-content"> 
        <h6><?= pll__('Routes'); ?></h6>
        <?php foreach( $routes as $route ): ?>
          <a href="<?= get_permalink($route->ID) ?>">
            <div class="link-component">
              <div class="link-component__img" style="background-image: url(<?= get_the_post_thumbnail_url( $route->ID ); ?>); background-color: gray;"></div>
              <div class="link-component__text">
                <span class="h7"><?= $route->post_title ?></span>
                <p><?= $route->post_excerpt ?></p>
              </div>
            </div>
          </a>
        <?php endforeach;?>
        <hr class="visible-xs" />
      </div>
    <?php endif; ?>
    <?php if( $services ) : ?>
      <div class="text-content"> 
        <h6><?= pll__('Services'); ?></h6>
        <?php foreach( $services as $service ): ?>
          <a href="<?= get_permalink($service->ID) ?>">
            <div class="link-component">
              <div class="link-component__img" style="background-image: url(<?= get_the_post_thumbnail_url( $service->ID ); ?>); background-color: gray;"></div>
              <div class="link-component__text">
                <span class="h7"><?= $service->post_title ?></span>
                <p><?= $service->post_excerpt ?></p>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
        <hr class="visible-xs" />
      </div>
    <?php endif; ?>
    <?php if ( get_field( 'servicemap_id' ) ) : ?>
      <div class="text-content route-link visible-xs">
        <span class="h7"><?= pll__( 'Directions to location' ); ?></span>
        <p><?= pll__( 'Find the best route and transportation from Reittiopas' ); ?></p>
        <a href="//palvelukartta.hel.fi/unit/<?php the_field( 'servicemap_id' ); ?>#!route-details" target="_blank"><?= pll__( 'Open in Reittiopas' ); ?></a>
      </div>
    <?php endif; ?>
  </section>
  <section class="content--right hidden-xs">
    <div class="map">
      <?= do_shortcode( "[leaflet-map height=600][leaflet-geojson src=$services_map fitbounds=1 popup_property=\"message\"]" ) ?>
    </div>
    <?php if ( get_field( 'servicemap_id' ) ) : ?>
      <div class="outer-link">
        <span class="h7"><?= pll__( 'Directions to location' ); ?></span>
        <p><?= pll__( 'Find the best route and transportation from Reittiopas' ); ?></p>
        <a href="//palvelukartta.hel.fi/unit/<?php the_field( 'servicemap_id' ); ?>#!route-details" target="_blank"><?= pll__( 'Open in Reittiopas' ); ?></a>
      </div>
    <?php endif; ?>
  </section>
</article>