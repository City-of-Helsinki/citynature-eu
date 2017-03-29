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
			<?= get_field( 'services_text' ); ?>
    </div>
  </section>
  <section class="location__content--right service-map hidden-xs">
    <?php the_field( 'services_map' ); ?>
  </section>
</article>