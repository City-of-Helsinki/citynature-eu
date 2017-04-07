<?php

/**
 * The main template for listing articles on index.php
 *
 * @package Nattours
 *
 */

?>


<a href="<?php the_permalink(); ?>">
	<article class="front__home box" style="background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url(<?php the_post_thumbnail_url('location_thumb'); ?>);">
		<h3><?php the_title(); ?></h3>
		<?php the_excerpt(); ?>
	</article>
</a>