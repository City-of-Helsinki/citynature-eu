<?php

/**
 * The Service post-template-wrapper
 *
 * @package Nattours
 */

get_header('blank');

$location = get_field( 'service_location');
$map = get_field( 'service_map' );

?>

<?php get_template_part( 'partials/components/sidemenu-left' ); ?>
<?php get_template_part( 'partials/components/sidemenu-right' ); ?>

<article class="service">
  <section class="text-content">
    <a class="nav-link" href="<?= get_permalink( $location->ID ); ?>">
      <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
      <?= $location->post_title; ?>
    </a>

    <h1><?php the_title(); ?></h1>
    <p><?= apply_filters( 'the_content', $post->post_content ); ?></p>
  </section>
  <section class="graphic-content">
    <div class="service__map">
      <?= do_shortcode( "[leaflet-map fit_markers=1][leaflet-geojson src=$map fitbounds=1 popup_property=\"message\"]" ) ?>
    </div>
  </section>
  <section class="text-content">
    <h6><?= pll__('Further information'); ?></h6>
    <p>
      <?= pll__('Opening hours and further info at:') ?>
    </p>
    <a class="nav-link" href="//www.<?php the_field( 'service_link' ); ?>" target="_blank">
      <?php the_field( 'service_link' ); ?>
      <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
    </a>
  </section>
</article>

<?php get_footer(); ?>
