<?php
$plants = wp_get_post_terms( $post->ID, 'plants' );
$mushrooms = wp_get_post_terms( $post->ID, 'mushrooms' );
$mosses_and_lichens = wp_get_post_terms( $post->ID, 'mosses_and_lichens' );
$birds = wp_get_post_terms( $post->ID, 'birds' );
$mammals = wp_get_post_terms( $post->ID, 'mammals' );
$reptiles = wp_get_post_terms( $post->ID, 'reptiles' );
$amphibians = wp_get_post_terms( $post->ID, 'amphibians' );
$insects = wp_get_post_terms( $post->ID, 'insects' );


function get_species($tax) {
	foreach( $tax as $value ):
		echo '<a href="/' . $value->taxonomy . '/' . $value->slug . '" target="_blank">';
			echo '<div class="link-component">';
				echo '<div class="link-component__img" style="background-image: url(' . get_field( 'featured_image', $value->taxonomy . '_' . $value->term_id ). '); background-color: gray;"></div>';
				echo '<div class="link-component__text">';
					echo '<span class="h7">' . $value->name . '</span>';
					if ( get_field( 'is_rare', $value->taxonomy . '_' . $value->term_id ) ) :
						echo '&emsp;<span class="is-rare"><i class="fa fa-star" aria-hidden="true"> </i>&ensp;' . pll__('Rare') . '</span>';
					endif;
					echo '<p>' . $value->description . '</p>';
				echo '</div>';
			echo '</div>';
		echo '</a>';
	endforeach;
}
?>

<article class="location__species">
		<div class="text-content">
			<?= get_field( 'nature_text' ); ?>
		</div>
	<section class="graphic-content">
		<?php if( $plants ) : ?>
			<div class="col-xs-12 col-sm-6 col-lg-4">
				<h6><?= pll__('Plants'); ?></h6>
				<?php get_species($plants) ?>
			</div>
		<?php endif; ?>

		<?php if( $mushrooms ) : ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<h6><?= pll__('Mushrooms'); ?></h6>
				<?php get_species($mushrooms) ?>
			</div>
		<?php endif; ?>

		<?php if( $mosses_and_lichens ) : ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<h6><?= pll__('Mosses and lichens'); ?></h6>
				<?php get_species($mosses_and_lichens) ?>
			</div>
		<?php endif; ?>

		<?php if( $birds ) : ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<h6><?= pll__('Birds'); ?></h6>
				<?php get_species($birds) ?>
			</div>
		<?php endif; ?>

		<?php if( $mammals ) : ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<h6><?= pll__('Mammals'); ?></h6>
				<?php get_species($mammals) ?>
			</div>
		<?php endif; ?>

		<?php if( $reptiles ) : ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<h6><?= pll__('Reptiles'); ?></h6>
				<?php get_species($reptiles) ?>
			</div>
		<?php endif; ?>

		<?php if( $amphibians ) : ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<h6><?= pll__('Amphibians'); ?></h6>
				<?php get_species($amphibians) ?>
			</div>
		<?php endif; ?>

		<?php if( $insects ) : ?>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<h6><?= pll__('Insects'); ?></h6>
				<?php get_species($insects) ?>
			</div>
		<?php endif; ?>

	</section>
</article>
