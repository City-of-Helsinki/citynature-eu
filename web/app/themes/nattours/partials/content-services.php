<?php

$services = get_posts(array(
'post_type'		=> 'service',
'posts_per_page'	=> -1,
'meta_query'		=> array(
	array(
		'key' => 'service_location',
		'value' => get_the_ID(),
		'compare' => 'LIKE'
		)
	)
));

?>

<style>
	.header--location {
		background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?php the_field('services_image'); ?>");
	}
</style>

<article class="location__services">
	<section class="location__content--left">
    <div class="location__text-content"> 
      <h4> <?= pll__( 'Services and routes' ) ?></h4>
			<?= get_field( 'services_text' ); ?>
    </div>
		<div class="location__graphic-content visible-xs">
			<?php the_field( 'services_map' ); ?>
		</div>
    <div class="location__text-content"> 
      <h6>Reitit</h6>
			<?php if( $services ) : foreach( $services as $service ): ?>
        <?php print_r( $service ); ?>
        <a href="<?= $service->guid ?>">
          <div class="service-link">
            <?= get_the_post_thumbnail( $service ) ?>
            <span><?= $service->post_title ?></span>
            <p><?= $service->post_excerpt ?></p>
          </div>
        </a>
      <?php endforeach; endif; ?>
    </div>
  </section>
  <section class="location__content--right service-map hidden-xs">
    <?php the_field( 'services_map' ); ?>
  </section>
</article>