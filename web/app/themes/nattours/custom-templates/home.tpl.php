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

<main class="front">
  <div class="front__filter">
		<i class="fa fa-filter" aria-hidden="true"></i>
		<h6>Suodata listausta</h6>
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