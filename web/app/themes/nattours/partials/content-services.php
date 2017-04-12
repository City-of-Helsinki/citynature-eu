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

?>

<style>
	.header--location {
		background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?php the_field('services_image'); ?>");
	}
</style>

<article class="location__services">
	<section class="content--left">
    <div class="text-content"> 
      <h4> <?= pll__( 'Services and routes' ) ?></h4>
			<?= get_field( 'services_text' ); ?>
    </div>
		<div class="graphic-content visible-xs">
			<div>
        <?php the_field( 'services_map' ); ?>
      </div>
		</div>
    <?php if( $routes ) : ?>
      <div class="text-content"> 
        <h6><?= pll__('Routes'); ?></h6>
        <?php foreach( $routes as $route ): ?>
          <!--<?php print_r( $route ); ?>-->
          <a href="<?= get_permalink($route->ID) ?>">
            <div class="link-component">
              <div class="link-component__img"></div>
              <span><?= $route->post_title ?></span>
              <p><?= $route->post_excerpt ?></p>
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
          <!--<?php print_r( $service ); ?>-->
          <a href="<?= get_permalink($service->ID) ?>">
            <div class="link-component">
              <div class="link-component__img" style="background-image: url(<?= get_the_post_thumbnail_url( $service->ID ); ?>)"></div>
              <div class="link-component__text">
                <span><?= $service->post_title ?></span>
                <p><?= $service->post_excerpt ?></p>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
        <hr class="visible-xs" />
      </div>
    <?php endif; ?>
  </section>
  <section class="content--right hidden-xs">
    <div class="map">
      <?php the_field( 'services_map' ); ?>
    </div>
  </section>
</article>