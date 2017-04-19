<?php

/**
 * Front page template
 *
 * @package Nattours
 *
 * Template Name: Front page
 * Description: Front page template
 */

get_header();

$locations = new WP_Query( [
  'post_type' => 'location',
  'order'     => 'asc',
] );

$location_arr = [];
?>

<style>
	.header--main {
		background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?= get_the_post_thumbnail_url() ?>");
	}
</style>

<?php get_template_part( 'partials/components/sidemenu-left' ); ?>
<?php get_template_part( 'partials/components/filter' ); ?>

<main class="front">
  <div class="front__filter">
    <h6><?= pll__('Locations') ?></h6>
    <div class="front__filter__link" id="openFilter">
      <i class="fa fa-filter" aria-hidden="true"></i>
      <a><?= pll__('Filter locations') ?></a>
    </div>
	</div>
  <div class="front__content">
    <?php
    if ( $locations->have_posts() ) : while ( $locations->have_posts() ) : $locations->the_post();
      get_template_part( 'partials/content', 'excerpt' );
      array_push($location_arr, get_the_title());
    endwhile;
    wp_reset_postdata();
    else :
      get_template_part( 'partials/no-results' );
    endif;
    ?>
  </div>
  <div class="text-content">
    <h4><?php the_title(); ?></h4>
    <?php the_content(); ?>
    <span class="front__city"><?= pll__('Helsinki') ?></span>
    <p>
      <?= implode( ' - ', $location_arr ); ?>
    </p>
  </div>
</main>

<?php get_footer(); ?>