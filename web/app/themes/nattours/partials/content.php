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
			background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url("<?php the_post_thumbnail_url(); ?>");
		}
	</style>

	<h3><?php the_title(); ?></h3>
	<?php the_excerpt(); ?>

</header>

<article <?php post_class( 'post-container post-' . sanitize_title( get_the_title() ) ); ?>>
	<?php
	
	echo get_first_paragraph();

	foreach ( get_field_objects() as $field_name => $value ) {
		echo $field_name . '<br />';
		// if ( strpos( $field_name, 'text' ) !== false || strpos( $field_name, 'map' ) !== false ) {
		// 	echo $value;
		// } elseif ( strpos( $field_name, 'image' ) !== false ) {
		// 	echo "<img src=\"$value\">";
		// }
	}
	
	// $terms = wp_get_post_terms( $post->ID, 'birds' );
	// print_r($terms);

	?>
</article>