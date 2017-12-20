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
		the_content();
	}
}

get_footer();

?>
