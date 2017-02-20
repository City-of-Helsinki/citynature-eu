<?php

/**
 * The main Header template
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

<header class="header header--main">
	<div class="sidenavs">
		<span class="glyphicon glyphicon-menu-hamburger"></span>
		&ensp;
		<span>hel.fi/luonto</span>
	</div>
	<h2>
		Explore the urban nature of Helsinki
	</h2>
	<h4>
		Explore the urban nature of Helsinki
	</h4>
	<div class="filter">
		<span class="glyphicon glyphicon-filter"></span>
		&ensp;
		<span class="filter__text">Suodata listausta</span>
	</div>
</header>