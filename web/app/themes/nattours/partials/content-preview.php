<?php

/**
 * The main template for basic-content
 *
 * @package Nattours
 *
 */

?>

<style>
	.header--location {
		background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?php the_post_thumbnail_url(); ?>");
	}
</style>

<article class="location__preview">
	<div class="location__content--left">
		<div class="location__text-content">
			<h5> <?= pll__( 'Header for introduction text' ) ?> </h5>
			<?= get_first_paragraph( get_the_content() ); ?>
			<span class="nav-link">
				<?= pll__( 'Read entire introduction' ) ?>
			</span>
		</div>
		<div class="location__graphic-content">
			<img src="<?php the_field( 'introduction_image' ) ?>" />
		</div>
	</div>

	<div class="location__content--right sm-lift">
		<div class="location__graphic-content hidden-xs">
			<?php the_field( 'services_map' ); ?>
		</div>
		<div class="location__text-content">
			<h5> <?= pll__( 'Services and routes' ) ?></h5>
			<?= get_first_paragraph( get_field( 'services_text' ) ); ?>
			<span class="nav-link">
				<?= pll__( 'Read more about services and routes' ) ?>
			</span>
		</div>
		<div class="location__graphic-content visible-xs">
			<?php the_field( 'services_map' ); ?>
		</div>
	</div>

	<div class="location__content--left">
		<div class="location__text-content">
			<h5> <?= pll__( 'Nature' ) ?></h5>
			<?= get_first_paragraph( get_field( 'nature_text' ) ); ?>
			<span class="nav-link">
				<?= pll__( 'Read more about nature' ) ?>
			</span>
		</div>
		<div class="location__graphic-content">
			<img src="<?php the_field( 'nature_image' ) ?>" />
		</div>
	</div>

	<div class="location__content--right sm-lift">
		<?php echo 'hi'; ?>
	</div>
</article>