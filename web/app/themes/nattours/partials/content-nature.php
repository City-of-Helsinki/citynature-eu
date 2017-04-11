<?php $birds = wp_get_post_terms( $post->ID, 'birds' ) ?>

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
								<p><?= $bird->description ?></p>
							</div>
						</div>
					</a>
				<?php endforeach;?>
			</div>
		<?php endif; ?>
	</section>
</article>