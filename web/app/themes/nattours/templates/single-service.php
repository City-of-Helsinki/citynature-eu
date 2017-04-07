<?php

/**
 * The Service post-template-wrapper
 *
 * @package Nattours
 */

get_header('service');

$location = get_field( 'service_location');

?>

<article class="service">
  <section class="text-content">
    <a class="nav-link" href="<?= get_permalink( $location->ID ); ?>">
      <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
      <?= $location->post_title; ?>
    </a>

    <h1><?php the_title(); ?></h1>
    <p><?php the_content(); ?></p>
  </section>
</article>

<?php get_footer(); ?>
