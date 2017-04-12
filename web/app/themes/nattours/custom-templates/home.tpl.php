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
] )

?>

<style>
	.header--main {
		background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?= get_the_post_thumbnail_url() ?>");
	}
</style>

<?php get_template_part( 'partials/components/sidemenu-left' ); ?>

<main class="front">
  <div class="front__filter">
    <h6>Kohteet</h6>
		<i class="fa fa-filter" aria-hidden="true"></i>
		<a>Suodata listausta</a>
	</div>
  <div class="front__content">
    <?php
    if ( $locations->have_posts() ) : while ( $locations->have_posts() ) : $locations->the_post();
      get_template_part( 'partials/content', 'excerpt' );
    endwhile;
    else :
      get_template_part( 'partials/no-results' );
    endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>