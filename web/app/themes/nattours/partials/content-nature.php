<?php
$plants = wp_get_post_terms( $post->ID, 'plants' );
$birds = wp_get_post_terms( $post->ID, 'birds' );
$animals = wp_get_post_terms( $post->ID, 'animals' );

$nature_bg = get_field('nature_image');
?>

<article class="location__nature">
	<section class="content--left">
		<div class="text-content">
			<?= get_field( 'nature_text' ); ?>
		</div>
		<?php if ( get_field( 'nature_gallery' ) ) : ?>
			<div id="natureGallery" class="location__gallery">
				<?php foreach ( get_field( 'nature_gallery' ) as $pic ) { ?>
					<a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
				<?php } ?>
			</div>
			<div class="location__images" id="natureImages">
				<?php foreach ( get_field( 'nature_gallery' ) as $pic ) { ?>
					<a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
				<?php } ?>
			</div>
		<?php endif; ?>
	</section>
	<section class="content--right">
		<?php if( $plants ) : ?>
			<div class="text-content">
				<h6><?= pll__('Plants'); ?></h6>
				<?php foreach( $plants as $plant ): ?>
					<!--<?php print_r( $plant ); ?>-->
					<a href="<?= '/' . $plant->taxonomy . '/' . $plant->slug ?>" target="_blank">
						<div class="link-component">
							<div class="link-component__img" style="background-image: url(<?= get_field( 'featured_image', $plant->taxonomy . '_' . $plant->term_id ) ?>); background-color: gray;"></div>
							<div class="link-component__text">
								<span class="h7"><?= $plant->name ?></span>
								<?php if ( get_field( 'is_rare', $plant->taxonomy . '_' . $plant->term_id ) ) : ?>
									&emsp;<span class="is-rare"><i class="fa fa-star" aria-hidden="true"> </i>&ensp;<?= pll__('Rare'); ?></span>
								<?php endif; ?>
								<p><?= $plant->description ?></p>
							</div>
						</div>
					</a>
				<?php endforeach;?>
			</div>
		<?php endif; ?>

		<?php if( $birds ) : ?>
			<div class="text-content">
				<h6><?= pll__('Birds'); ?></h6>
				<?php foreach( $birds as $bird ): ?>
					<!--<?php print_r( $bird ); ?>-->
					<a href="<?= '/' . $bird->taxonomy . '/' . $bird->slug ?>" target="_blank">
						<div class="link-component">
							<div class="link-component__img" style="background-image: url(<?= get_field( 'featured_image', $bird->taxonomy . '_' . $bird->term_id ) ?>); background-color: gray;"></div>
							<div class="link-component__text">
								<span class="h7"><?= $bird->name ?></span>
								<?php if ( get_field( 'is_rare', $bird->taxonomy . '_' . $bird->term_id ) ) : ?>
									&emsp;<span class="is-rare"><i class="fa fa-star" aria-hidden="true"> </i>&ensp;<?= pll__('Rare'); ?></span>
								<?php endif; ?>
								<p><?= $bird->description ?></p>
							</div>
						</div>
					</a>
				<?php endforeach;?>
			</div>
		<?php endif; ?>

		<?php if( $animals ) : ?>
			<div class="text-content">
				<h6><?= pll__('Animals'); ?></h6>
				<?php foreach( $animals as $animal ): ?>
					<!--<?php print_r( $animal ); ?>-->
					<a href="<?= '/' . $animal->taxonomy . '/' . $animal->slug ?>" target="_blank">
						<div class="link-component">
							<div class="link-component__img" style="background-image: url(<?= get_field( 'featured_image', $animal->taxonomy . '_' . $animal->term_id ) ?>); background-color: gray;"></div>
							<div class="link-component__text">
								<span class="h7"><?= $animal->name ?></span>
								<?php if ( get_field( 'is_rare', $animal->taxonomy . '_' . $animal->term_id ) ) : ?>
									&emsp;<span class="is-rare"><i class="fa fa-star" aria-hidden="true"> </i>&ensp;<?= pll__('Rare'); ?></span>
								<?php endif; ?>
								<p><?= $animal->description ?></p>
							</div>
						</div>
					</a>
				<?php endforeach;?>
			</div>
		<?php endif; ?>
	</section>
</article>
