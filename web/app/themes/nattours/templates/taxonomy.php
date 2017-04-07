<?php

/**
 * Taxonomy template
 *
 * @package Nattours
 */

get_header('location');

do_action( 'nattours_before_page' ); 

?>

<style>
	.header--location {
		background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?php the_field( 'featured_image' ) ?>");
	}
</style>

	<div class="header__texts">
		<h3><?php single_term_title(); ?></h3>
		<?= term_description(); ?>
	</div>
</header>
<main class="taxonomy">
	<section class="content--left">
		<?php the_field( 'info' ); ?>
	</section>
	
	<?php
	$locations = get_posts(
		array(
			'posts_per_page' => -1,
			'post_type' => 'location',
			'tax_query' => array(
				array(
					'taxonomy' => 'birds',
					'field'		=> 'name',
					'terms' => get_queried_object()->name,
				)
			)
		)
	);
	?>

	<section class="content--right">
		<h6>Kohteet</h6>
		<?php if( $locations ) : foreach( $locations as $location ): ?>
        <a href="<?= get_permalink($location->ID) ?>" target="_blank">
          <div class="link-component">
            <?= get_the_post_thumbnail( $location ) ?>
            <span><?= $location->post_title ?></span>
            <p><?= $location->post_excerpt ?></p>
          </div>
        </a>
      <?php endforeach; endif; ?>
	</section>
</main>

<?php
// print_r( get_queried_object() );
// print_r( $locations );
?>

<?php get_footer(); ?>