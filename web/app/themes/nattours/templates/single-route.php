<?php

/**
 * The Route post-template-wrapper
 *
 * @package Nattours
 */

get_header('blank');

$location = get_field( 'route_location' );
$map = get_field( 'route_map' );

?>

<?php get_template_part( 'partials/components/sidemenu-left' ); ?>
<?php get_template_part( 'partials/components/sidemenu-right' ); ?>

<article class="route">
  <section class="text-content">
    <a class="nav-link" href="<?= get_permalink( $location->ID ); ?>">
      <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
      <?= $location->post_title; ?>
    </a>

    <h1><?php the_title(); ?></h1>
    <p><?= apply_filters( 'the_content', $post->post_content ); ?></p>
  </section>
  <section class="graphic-content">
    <div class="route__map">
      <?= do_shortcode( "[leaflet-map fit_markers=1][leaflet-geojson src=$map fitbounds=1 popup_property=\"message\"]" ) ?>
    </div>
  </section>
</article>

<?php get_footer(); ?>
