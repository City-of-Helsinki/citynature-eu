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
  'orderby'   => 'title',
  'order'     => 'asc',
  'posts_per_page'  => -1,
] );

$location_arr = [];
?>

<style>
	.header--main {
		background-image: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.5),
      rgba(0, 0, 0, 0.1) 10%,
      rgba(0, 0, 0, 0.1) 80%,
      rgba(0, 0, 0, 0.5)
    ),
    url("<?= get_the_post_thumbnail_url() ?>");
    /* overflow: hidden; */
	}
</style>
</header>
<?php if ( wp_get_img_caption( get_post_thumbnail_id() ) ): ?>
    <span class="img-caption"><?= wp_get_img_caption( get_post_thumbnail_id() ); ?></span>
<?php endif; ?>

<?php get_template_part( 'partials/components/sidemenu-left' ); ?>
<?php get_template_part( 'partials/components/sidemenu-right' ); ?>
<?php get_template_part( 'partials/components/filter' ); ?>

<main class="front">
  <div class="front__filter">
    <h6><?= pll__('Locations') ?></h6>
    <div class="front__filter__link" id="openFilter">
      <i class="fa fa-filter" aria-hidden="true"></i>
      <a><?= pll__('Filter locations') ?></a>
    </div>
	</div>
  <div class="front__filter-selections" id="filterSelections"></div>
  <div class="front__content">
    <?php
    if ( $locations->have_posts() ) : while ( $locations->have_posts() ) : $locations->the_post();
      get_template_part( 'partials/content', 'excerpt' );
      array_push( $location_arr, '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' );
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
    <!--<span class="front__city"><?= pll__('Helsinki') ?></span>-->
    <p class="front__location-list">
      <?= implode( ' - ', $location_arr ); ?>
    </p>
  </div>
</main>

<?php get_footer(); ?>
