<style>
	.header--location {
		background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?php the_field('nature_image'); ?>");
	}
</style>

<article class="location__nature">
	<div class="content--left">
		<div class="text-content">
			<h5> <?= pll__( 'Nature' ) ?></h5>
			<?= get_field( 'nature_text' ); ?>
		</div>
		<div class="graphic-content">
			<?php
			$terms = wp_get_post_terms( $post->ID, 'birds' );
			print_r($terms);
			?>
		</div>
	</div>
</article>