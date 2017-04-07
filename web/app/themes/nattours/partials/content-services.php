<?php

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
			<div class="map">
        <?php the_field( 'services_map' ); ?>
      </div>
		</div>
    <div class="text-content"> 
      <h6>Reitit</h6>
			<?php if( $services ) : foreach( $services as $service ): ?>
        <!--<?php print_r( $service ); ?>-->
        <a href="<?= get_permalink($service->ID) ?>" target="_blank">
          <div class="link-component">
            <?= get_the_post_thumbnail( $service ) ?>
            <span><?= $service->post_title ?></span>
            <p><?= $service->post_excerpt ?></p>
          </div>
        </a>
      <?php endforeach; endif; ?>
    </div>
  </section>
  <section class="content--right hidden-xs">
    <div class="map map--large">
      <?php the_field( 'services_map' ); ?>
    </div>
  </section>
</article>