<?php

/**
 * Taxonomy template
 *
 * @package Nattours
 */

get_header('location');

do_action( 'nattours_before_page' ); 

$taxonomy = get_queried_object();
$locations = get_posts(
	array(
		'posts_per_page' => -1,
		'post_type' => 'location',
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy->taxonomy,
				'field'		=> 'name',
				'terms' => $taxonomy->name,
			)
		)
	)
);

?>

<style>
	.header--location {
		background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?= get_field( 'featured_image', $taxonomy->taxonomy . '_' . $taxonomy->term_id ) ?>");
	}
</style>

	<div class="header__texts">
		<h3><?php single_term_title(); ?></h3>
		<?= term_description(); ?>
	</div>
</header>

<?php get_template_part( 'partials/components/sidemenu-left' ); ?>
<?php get_template_part( 'partials/components/sidemenu-right' ); ?>

<main class="taxonomy">
	<section class="content--left">
		<!--<h1><?= $taxonomy->description; ?></h1>-->
		<?php the_field( 'info', $taxonomy->taxonomy . '_' . $taxonomy->term_id ); ?>
	</section>
	
	<section class="content--right">
		<h6>Kohteet</h6>
		<?php if( $locations ) : foreach( $locations as $location ): ?>
        <a href="<?= get_permalink($location->ID) ?>">
          <div class="link-component">
						<div class="link-component__img" style="background-image: url(<?= get_the_post_thumbnail_url( $location ); ?>)"></div>
						<div class="link-component__text">
							<span class="h7"><?= $location->post_title ?></span>
							<p><?= $location->post_excerpt ?></p>
						</div>
          </div>
        </a>
      <?php endforeach; endif; ?>
	</section>
</main>

<?php get_footer(); ?>