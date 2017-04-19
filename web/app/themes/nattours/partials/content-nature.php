<?php
$birds = wp_get_post_terms( $post->ID, 'birds' );
$animals = wp_get_post_terms( $post->ID, 'animals' );
$plants = wp_get_post_terms( $post->ID, 'plants' );
?>

<style>
	.header--location {
		background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?php the_field('nature_image'); ?>");
	}
</style>

<article class="location__nature">
	<section class="content--left">
		<div class="text-content">
			<h5> <?= pll__( 'Nature' ) ?></h5>
			<?= get_field( 'nature_text' ); ?>
		</div>
	</section>
	<section class="content--right">
		<?php if( $birds ) : ?>
			<div class="text-content"> 
				<h6><?= pll__('Birds'); ?></h6>
				<?php foreach( $birds as $bird ): ?>
					<!--<?php print_r( $bird ); ?>-->
					<a href="<?= '/' . $bird->taxonomy . '/' . $bird->slug ?>">
						<div class="link-component">
							<div class="link-component__img" style="background-image: url(<?= get_field( 'featured_image', $bird->taxonomy . '_' . $bird->term_id ) ?>)"></div>
							<div class="link-component__text">
								<span><?= $bird->name ?></span>
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
					<a href="<?= '/' . $animal->taxonomy . '/' . $animal->slug ?>">
						<div class="link-component">
							<div class="link-component__img" style="background-image: url(<?= get_field( 'featured_image', $animal->taxonomy . '_' . $animal->term_id ) ?>)"></div>
							<div class="link-component__text">
								<span><?= $animal->name ?></span>
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

		<?php if( $plants ) : ?>
			<div class="text-content"> 
				<h6><?= pll__('Plants'); ?></h6>
				<?php foreach( $plants as $plant ): ?>
					<!--<?php print_r( $plant ); ?>-->
					<a href="<?= '/' . $plant->taxonomy . '/' . $plant->slug ?>">
						<div class="link-component">
							<div class="link-component__img" style="background-image: url(<?= get_field( 'featured_image', $plant->taxonomy . '_' . $plant->term_id ) ?>)"></div>
							<div class="link-component__text">
								<span><?= $plant->name ?></span>
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
	</section>
</article>