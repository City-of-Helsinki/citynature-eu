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
	<?php get_template_part( 'partials/components/nav' ); ?>
	<div class="header__texts">
		<h1>
			<?php echo pll__( 'Explore the urban nature of Helsinki' ); ?>
		</h1>
		<h4>
			<?php echo pll__( 'Explore the urban nature of Helsinki' ); ?>
		</h4>
	</div>
</header>