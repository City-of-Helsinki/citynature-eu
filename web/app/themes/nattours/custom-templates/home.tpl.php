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

$places = new WP_Query( [
  'post_type' => 'place',
  'order'     => 'asc',
] )

?>

<main class="front">
  <div class="front__filter">
		<i class="fa fa-filter" aria-hidden="true"></i>
		&ensp;
		Suodata listausta
	</div>
  <div class="front__content">
    <?php
    if ( $places->have_posts() ) : while ( $places->have_posts() ) : $places->the_post();
      get_template_part( 'partials/content', 'excerpt' );
    endwhile;
    else :
      get_template_part( 'partials/no-results' );
    endif;
    ?>
  </div>
</main>

<?php get_footer(); ?>