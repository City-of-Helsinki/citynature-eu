<?php

/**
 * The main 404-wrapper
 *
 * @package Nattours
 */

get_header();

?>

<?php do_action( 'nattours_before_page' ); ?>
<?php get_template_part( 'partials/no-results', '404' ); ?>
<?php get_footer(); ?>
