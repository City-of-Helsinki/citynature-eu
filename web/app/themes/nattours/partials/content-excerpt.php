<?php

/**
 * The main template for listing articles on index.php
 *
 * @package Nattours
 *
 */

$taxonomies = wp_get_post_terms( get_the_ID(), ['activity', 'season', 'difficulty', 'other'] );

// if ( !empty( $taxonomies ) ) print_r( $taxonomies );

$terms_arr = [];

foreach ( $taxonomies as $taxonomy ) {
	array_push( $terms_arr, $taxonomy->name );
}

// print_r( $terms_arr );

?>

<article
	class="box-container"
	data-terms="<?= implode( ', ', $terms_arr ) ?>"
>
	<a href="<?php the_permalink(); ?>">
		<div class="box" style="background-image: url(<?php the_post_thumbnail_url('location_thumb'); ?>);">
			<h3><?php the_title(); ?></h3>
			 <p class="subtitle hyphenate"><?= wp_strip_all_tags( get_the_excerpt() ); ?></p>
		</div>
	</a>
</article>
