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

$tile_url = UTILS()->get_map_tileurl();

?>

<style>
	.header--location {
		background-image: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.5),
      rgba(0, 0, 0, 0.1) 10%,
      rgba(0, 0, 0, 0.1) 70%,
      rgba(0, 0, 0, 0.6)
		),
        url("<?= $home_bg; ?>");
	}
</style>

</header>
<?php if ( wp_get_img_caption( get_post_thumbnail_id() ) ): ?>
    <span class="img-caption"><?= wp_get_img_caption( get_post_thumbnail_id() ); ?></span>
<?php endif; ?>

<main class="location__home">
	<section class="content--left">
		<div class="text-content">
      <?= get_field( 'nature_excerpt' ) ? apply_filters( 'the_content', get_field( 'nature_excerpt' ) ) : get_first_paragraph( get_the_content() ); ?>
      <a href="?section=nature" class="nav-link">
        <?= pll__( 'Read more' ) ?>
      </a>
		</div>
		<div class="graphic-content">
			<img src="<?= get_field( 'nature_image' )['url'] ?>" />
            <?php if ( wp_get_img_caption( get_field( 'nature_image' )['id'] ) ): ?>
                <span class="img-caption"><?= wp_get_img_caption( get_field( 'nature_image' )['id'] ); ?></span>
            <?php endif; ?>
		</div>
		<div class="text-content visible-xs">
      <a href="?section=services">
        <h5> <?= pll__( 'Services and routes' ) ?></h5>
      </a>
      <?= get_field( 'services_excerpt' ) ? apply_filters( 'the_content', get_field( 'services_excerpt' ) ) : get_first_paragraph( get_field( 'services_text', false, false ) ); ?>
			<a href="?section=services" class="nav-link">
				<?= pll__( 'Read more' ) ?>
			</a>
		</div>
		<div class="graphic-content visible-xs">
			<div>
				<?= do_shortcode( "[leaflet-map fit_markers=1 height=50vw tileurl=$tile_url][leaflet-geojson src=$services_map fitbounds=1 popup_property=\"message\"]" ) ?>
			</div>
		</div>
		<div class="text-content visible-xs">
			<a href="?section=species">
        <h5> <?= pll__( 'Species' ) ?></h5>
      </a>
			<a href="?section=species" class="nav-link">
				<?= pll__( 'Read more' ) ?>
			</a>
		</div>
		<div class="graphic-content visible-xs">
			<img src="<?= get_field( 'species_image' )['url'] ?>" />
            <?php if ( wp_get_img_caption( get_field( 'species_image' )['id'] ) ): ?>
                <span class="img-caption"><?= wp_get_img_caption( get_field( 'species_image' )['id'] ); ?></span>
            <?php endif; ?>
		</div>
    <div class="text-content">
			<a href="?section=history">
        <h5> <?= pll__( 'History' ) ?></h5>
      </a>
			<?= get_field( 'history_excerpt' ) ? apply_filters( 'the_content', get_field( 'history_excerpt' ) ) : get_first_paragraph( get_field( 'history_text', false, false ) ); ?>
			<a href="?section=history" class="nav-link">
				<?= pll__( 'Read more' ) ?>
			</a>
		</div>
		<div class="graphic-content">
			<img src="<?= get_field( 'history_image' )['url'] ?>" />
            <?php if ( wp_get_img_caption( get_field( 'history_image' )['id'] ) ): ?>
                <span class="img-caption"><?= wp_get_img_caption( get_field( 'history_image' )['id'] ); ?></span>
            <?php endif; ?>
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
				<?= do_shortcode( "[leaflet-map fit_markers=1 height=15vw tileurl=$tile_url][leaflet-geojson src=$services_map fitbounds=1 popup_property=\"message\"]" ) ?>
			</div>
		</div>
		<div class="text-content">
			<a href="?section=services">
        <h5> <?= pll__( 'Services and routes' ) ?></h5>
      </a>
			<?= get_field( 'services_excerpt' ) ? apply_filters( 'the_content', get_field( 'services_excerpt' ) ) : get_first_paragraph( get_field( 'services_text', false, false ) ); ?>
			<a href="?section=services" class="nav-link">
				<?= pll__( 'Read more' ) ?>
			</a>
		</div>
		<div class="text-content">
			<a href="?section=species">
        <h5> <?= pll__( 'Species' ) ?></h5>
      </a>
			<a href="?section=species" class="nav-link">
				<?= pll__( 'Read more' ) ?>
			</a>
		</div>
		<div class="graphic-content">
			<img src="<?= get_field( 'species_image' )['url'] ?>" />
            <?php if ( wp_get_img_caption( get_field( 'species_image' )['id'] ) ): ?>
                <span class="img-caption"><?= wp_get_img_caption( get_field( 'species_image' )['id'] ); ?></span>
            <?php endif; ?>
		</div>
		<?php if ( $ig_feed ) : ?>
			<div class="text-content">
				<h5> <?= pll__( 'Instagram' ) ?></h5>
				<?= do_shortcode( $ig_feed ); ?>
			</div>
		<?php endif; ?>
	</section>
</main>
