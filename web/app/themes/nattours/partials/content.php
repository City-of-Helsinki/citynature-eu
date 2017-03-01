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

	<div class="header__texts">
		<h3><?php the_title(); ?></h3>
		<?php the_excerpt(); ?>
	</div>

</header>

<article <?php post_class( 'post-container post-' . sanitize_title( get_the_title() ) ); ?>>
	
	<?php

	$introduction_arr = [];
	$services_arr = [];
	$nature_arr = [];

	foreach ( get_fields() as $field_name => $value ) {
		// print_r($value);
		if ( strpos( $field_name, 'introduction_image' ) !== false ) {
			$introduction_arr[$field_name] = $value;
		} elseif ( strpos( $field_name, 'services' ) !== false && $field_name !== 'services_image' ) {
			$services_arr[$field_name] = $value;
		} elseif ( strpos( $field_name, 'nature' ) !== false ) {
			$nature_arr[$field_name] = $value;
		}
	}

	// print_r( $nature_arr );

	function print_arr($arr) {
		foreach ($arr as $field_name => $value) {
			if ( strpos( $field_name, '_text' ) !== false ) {
				echo get_first_paragraph($value);
			} elseif ( strpos( $field_name, '_image' ) !== false ) {
				echo "</div><img src=\"$value\" />";
			} else {
				echo '</div>' . $value;
			}
		}
	}

	// $terms = wp_get_post_terms( $post->ID, 'birds' );
	// print_r($terms);

	?>
	
	<section class="place__content">
		<div class="place__content__text">
			<?php 
			echo '<h5>' . pll__('Esittelytekstin otsikko') . '</h5>';
			echo get_first_paragraph( get_the_content() );
			echo print_arr( $introduction_arr );
			?>
	</section>

	<section class="place__content">
		<div class="place__content__text">
			<?php 
			echo '<h5>' . pll__('Services and routes') . '</h5>';
			echo print_arr($services_arr);
			?>
	</section>

	<section class="place__content">
		<div class="place__content__text">
			<?php 
			echo '<h5>' . pll__('Nature') . '</h5>';
			echo print_arr($nature_arr);
			?>
	</section>

</article>