<?php

/**
 * The main template for basic-content
 *
 * @package Nattours
 *
 */

?>

<article <?php post_class( 'post-container post-' . sanitize_title( get_the_title() ) ); ?>>
	<h1><?php the_title(); ?></h1>
	<?php
	
	the_content();
	
	$terms = wp_get_post_terms( $post->ID, 'birds' );
	print_r($terms);

	?>
</article>
