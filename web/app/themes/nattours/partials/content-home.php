<?php

/**
 * The main template for basic-content
 *
 * @package Nattours
 *
 */

$home_bg = get_the_post_thumbnail_url();

$services_map = get_field( 'services_map' );

$ig_feed = get_field( 'feed_shortcode' );

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
      <a href="#nature" class="nav-link">
        <?= pll__( 'Read more about nature' ) ?>
      </a>
		</div>
		<div class="graphic-content">
			<img src="<?php the_field( 'nature_image' ) ?>" />
		</div>
		<div class="text-content visible-xs">
			<h5> <?= pll__( 'Services and routes' ) ?></h5>
			<?= get_first_paragraph( get_field( 'services_text', false, false ) ); ?>
			<a href="#services" class="nav-link">
				<?= pll__( 'Read more about services and routes' ) ?>
			</a>
		</div>
		<div class="graphic-content visible-xs">
			<div>
				<?= do_shortcode( "[leaflet-map height=50vw][leaflet-geojson src=$services_map fitbounds=1 popup_property=\"message\"]" ) ?>
			</div>
		</div>
		<div class="text-content visible-xs">
			<h5> <?= pll__( 'Species' ) ?></h5>
			<a href="#species" class="nav-link">
				<?= pll__( 'Read more about species' ) ?>
			</a>
		</div>
		<div class="graphic-content visible-xs">
			<img src="<?php the_field( 'species_image' ) ?>" />
		</div>
    <div class="text-content">
			<h5> <?= pll__( 'History' ) ?></h5>
			<?= get_first_paragraph( get_field( 'history_text', false, false ) ); ?>
			<a href="#history" class="nav-link">
				<?= pll__( 'Read more about history' ) ?>
			</a>
		</div>
		<div class="graphic-content">
			<img src="<?php the_field( 'history_image' ) ?>" />
		</div>
		<?php if ( $ig_feed ) : ?>
			<div class="text-content visible-xs">
				<h5> <?= pll__( 'Instagram' ) ?></h5>
				<?= do_shortcode( $ig_feed ); ?>
			</div>
		<?php endif; ?>
	</section>

	<section class="content--right hidden-xs">
		<div class="graphic-content">
			<div>
				<?= do_shortcode( "[leaflet-map height=15vw][leaflet-geojson src=$services_map fitbounds=1 popup_property=\"message\"]" ) ?>
			</div>
		</div>
		<div class="text-content">
			<h5> <?= pll__( 'Services and routes' ) ?></h5>
			<?= get_first_paragraph( get_field( 'services_text', false, false ) ); ?>
			<a href="#services" class="nav-link">
				<?= pll__( 'Read more about services and routes' ) ?>
			</a>
		</div>
		<div class="text-content">
			<h5> <?= pll__( 'Species' ) ?></h5>
			<a href="#species" class="nav-link">
				<?= pll__( 'Read more about species' ) ?>
			</a>
		</div>
		<div class="graphic-content">
			<img src="<?php the_field( 'species_image' ) ?>" />
		</div>
		<?php if ( $ig_feed ) : ?>
			<div class="text-content">
				<h5> <?= pll__( 'Instagram' ) ?></h5>
				<?= do_shortcode( $ig_feed ); ?>
			</div>
		<?php endif; ?>
	</section>
</article>
