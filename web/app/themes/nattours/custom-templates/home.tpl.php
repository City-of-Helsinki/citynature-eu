<?php

/**
 * Front page template
 *
 * @package Nattours
 *
 * Template Name: Front page
 * Description: Front page template
 */

get_header();

echo '</header>';

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		?>
		<div class="logos-wrapper">
			<img src="<?php echo \UTILS()->get_image_uri() . '/interreg_logo.jpg' ?>" alt="Interreg logo" />
            <img src="<?php echo \UTILS()->get_image_uri() . '/eu_logo.jpg' ?>" alt="EU logo" />
            <img src="<?php echo \UTILS()->get_image_uri() . '/nattours_logo.jpg' ?>" alt="Nattours logo" />
		</div>
		<?php
	}
}

get_footer();

?>
