<?php

/**
 * The Location Header template
 *
 * @package Nattours
 */

?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>

	<meta charset="<?php echo get_bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<!-- ============================================================ -->
	<?php wp_head(); ?>
	<!-- ============================================================ -->

</head>

<body <?php body_class(); ?>>
<?php do_action( 'nattours_after_body' ); ?>

<header class="header header--location" id="locationHeader">
	<!--<div class="header__overlay"></div>-->
	<?php get_template_part( 'partials/components/nav' ); ?>