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
			background: gray;
			background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?php the_post_thumbnail_url('place_thumb'); ?>");
		}
	</style>

	<h3><?php the_title(); ?></h3>
	<?php the_excerpt(); ?>

</header>

<article <?php post_class( 'post-container post-' . sanitize_title( get_the_title() ) ); ?>>
	<?php
	
	the_content();
	
	// $terms = wp_get_post_terms( $post->ID, 'birds' );
	// print_r($terms);

	?>
</article>