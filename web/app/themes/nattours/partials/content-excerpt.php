<?php

/**
 * The main template for listing articles on index.php
 *
 * @package Nattours
 *
 */

?>

<article>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php the_excerpt(); ?>
</article>
