<?php

/**
 * The main template for single article
 *
 * @package Nattours
 *
 */

?>

<article <?php post_class( 'post-container post-' . sanitize_title( get_the_title() ) ); ?>>
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
</article>
