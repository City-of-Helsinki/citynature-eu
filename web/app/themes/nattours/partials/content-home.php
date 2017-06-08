<?php

/**
 * The main template for basic-content
 *
 * @package Nattours
 *
 */

 $home_bg = get_the_post_thumbnail_url();

 $services_map = get_field( 'services_map' );

?>

<style>
	.header--location {
		background-image: url("<?= $home_bg; ?>");
	}
</style>
<article class="location__home">
	<section class="content--left">
		<div class="text-content">
			<?= get_first_paragraph( get_the_content() ); ?>
			<a href="#intro" class="nav-link">
				<?= pll__( 'Read entire introduction' ) ?>
			</a>
		</div>
		<div class="graphic-content">
			<img src="<?php the_field( 'introduction_image' ) ?>" />
		</div>
		<div class="text-content visible-xs">
			<h5> <?= pll__( 'Services and routes' ) ?></h5>
			<?= get_first_paragraph( get_field( 'services_text' ) ); ?>
			<a href="#services" class="nav-link">
				<?= pll__( 'Read more about services and routes' ) ?>
			</a>
		</div>
		<div class="graphic-content visible-xs">
			<div>
				<?= do_shortcode( "[leaflet-map height=50vw][leaflet-geojson src=$services_map fitbounds=1 popup_property=\"popup-text\"]" ) ?>
			</div>
		</div>
		<div class="text-content">
			<h5> <?= pll__( 'Nature' ) ?></h5>
			<?= get_first_paragraph( get_field( 'nature_text' ) ); ?>
			<a href="#nature" class="nav-link">
				<?= pll__( 'Read more about nature' ) ?>
			</a>
		</div>
		<div class="graphic-content">
			<img src="<?php the_field( 'nature_image' ) ?>" />
		</div>
		<div class="text-content visible-xs">
			<h5> <?= pll__( 'History' ) ?></h5>
			<a href="#nature" class="nav-link">
				<?= pll__( 'Read more about history' ) ?>
			</a>
		</div>
	</section>

	<section class="content--right hidden-xs sm-lift">
		<div class="graphic-content">
			<div>
				<?= do_shortcode( "[leaflet-map height=15vw][leaflet-geojson src=$services_map fitbounds=1 popup_property=\"popup-text\"]" ) ?>
			</div>
		</div>
		<div class="text-content">
			<h5> <?= pll__( 'Services and routes' ) ?></h5>
			<?= get_first_paragraph( get_field( 'services_text' ) ); ?>
			<a href="#services" class="nav-link">
				<?= pll__( 'Read more about services and routes' ) ?>
			</a>
		</div>
		<div class="text-content">
			<h5> <?= pll__( 'History' ) ?></h5>
			<a href="#nature" class="nav-link">
				<?= pll__( 'Read more about history' ) ?>
			</a>
		</div>
	</section>
</article>