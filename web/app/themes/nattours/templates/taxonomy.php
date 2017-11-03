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
			background-image: url("<?= get_field( 'featured_image', $taxonomy->taxonomy . '_' . $taxonomy->term_id ) ?>");
		}

	</style>

	<div class="header__texts">
		<h3><?php single_term_title(); ?></h3>
		<p class="subtitle"><?= wp_strip_all_tags( term_description() ); ?></p>
	</div>
	</header>

	<?php get_template_part( 'partials/components/sidemenu-left' ); ?>
	<?php get_template_part( 'partials/components/sidemenu-right' ); ?>

	<main class="taxonomy">
		<section class="content--left">
			<div class="text-content">
				<!--<h1><?= $taxonomy->description; ?></h1>-->
				<?php the_field( 'info', $taxonomy->taxonomy . '_' . $taxonomy->term_id ); ?>
				<?php if ( get_field( 'luontoportti_url', $taxonomy->taxonomy . '_' . $taxonomy->term_id ) ) : ?>
				<br />
				<div class="outer-link">
					<p>
						<?= pll__( 'More info about the species ' ); ?>
						<a href="<?php the_field( 'luontoportti_url', $taxonomy->taxonomy . '_' . $taxonomy->term_id ); ?>" target="_blank">
							<?= pll__('Luontoportti'); ?>
						</a>
					</p>
				</div>
				<?php endif; ?>
			</div>
		</section>

		<section class="content--right">
			<div class="text-content">
				<h6><?= pll__( 'Locations' ); ?></h6>
				<?php if( $locations ) : foreach( $locations as $location ): ?>
				<a href="<?= get_permalink($location->ID) ?>">
					<div class="link-component">
						<div class="link-component__img" style="background-image: url(<?= get_the_post_thumbnail_url( $location, 'location_thumb' ); ?>)"></div>
						<div class="link-component__text">
							<span class="h7"><?= $location->post_title ?></span>
							<p>
								<?= $location->post_excerpt ?>
							</p>
						</div>
					</div>
				</a>
				<?php endforeach; endif; ?>
			</div>
		</section>
	</main>

	<?php get_footer(); ?>
