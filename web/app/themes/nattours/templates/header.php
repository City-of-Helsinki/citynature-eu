<?php

/**
 * The main Header template
 *
 * @package Nattours
 */

$youtube = get_field( 'video_url' );
$url_arr = explode( '/', $youtube );
$video_id = end( $url_arr );

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
			<?= get_field( 'title' ); ?>
		</h1>
		<?php if ( $youtube ) : ?>
			<a href="<?= $youtube ?>" target="_blank">
				<div class="link-component">
					<div class="link-component__img" style="background-image: url(//img.youtube.com/vi/<?= $video_id ?>/0.jpg)"></div>
					<div class="link-component__text">
						<h5><?= get_field( 'video_title' ); ?></h5>
						<p><?= get_field( 'video_subtitle' ); ?></p>
					</div>
				</div>
			</a>
		<?php endif; ?>
	</div>
</header>
