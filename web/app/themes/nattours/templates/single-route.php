<?php

/**
 * The Route post-template-wrapper
 *
 * @package Nattours
 */

get_header('blank');

$location = get_field( 'service_location');

?>

<article class="service">
  <section class="text-content">
    <a class="nav-link" href="<?= get_permalink( $location->ID ); ?>">
      <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
      <?= $location->post_title; ?>
    </a>

    <h1><?php the_title(); ?></h1>
    <p><?= $post->post_content; ?></p>
  </section>
  <section class="graphic-content">
    <div>
      <?php the_field( 'service_map' ); ?>
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
