<?php

/**
 * The main template for basic-content
 *
 * @package Nattours
 *
 */

?>

<style>
	.header--place {
		background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?php the_post_thumbnail_url(); ?>");
	}
</style>

<article <?php post_class( 'post-container post-' . sanitize_title( get_the_title() ) ); ?>>
	
	<?php

	// $terms = wp_get_post_terms( $post->ID, 'birds' );
	// print_r($terms);

	?>
	
	<section class="place__content">
		<div class="place__content__text">
			<?php 
			echo '<h5>' . pll__( 'Header for introduction text' ) . '</h5>';
			echo get_first_paragraph( get_the_content() );
			echo '<a class="nav-link">' .
				pll__( 'Read entire introduction' ) .
			'</a>';
			?>
		</div>
		<?php echo '<img src="' . get_field( 'introduction_image' ) . '" />'; ?>
	</section>

	<section class="place__content">
		<div class="place__content__text">
			<?php 
			echo '<h5>' . pll__( 'Services and routes' ) . '</h5>';
			echo get_first_paragraph( get_field( 'services_text' ) );
			echo '<a class="nav-link">' .
				pll__( 'Read more about services and routes' ) .
			'</a>';
			?>
		</div>
		<?php the_field( 'services_map' ); ?>
	</section>

	<section class="place__content">
		<div class="place__content__text">
			<?php 
			echo '<h5>' . pll__( 'Nature' ) . '</h5>';
			echo get_first_paragraph( get_field( 'nature_text' ) );
			echo '<a class="nav-link">' .
				pll__( 'Read more about nature' ) .
			'</a>';
			?>
		</div>
		<?php echo '<img src="' . get_field( 'nature_image' ) . '" />'; ?>
	</section>

</article>