<?php

/**
 * The main post-template-wrapper
 *
 * @package Nattours
 */

get_header('location');

?>

<?php do_action( 'nattours_before_page' ); ?>

<?php if ( have_posts() ) : the_post(); ?>
		<div class="header__texts">
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
		</div>

		<ul class="location__tabs" role="tablist" id="tabNav">
			<li role="presentation" class="active" data-target="#home">
				<a href="#home" role="tab" data-toggle="tab"><?= pll__( 'Home' ); ?></a>
			</li>
			<li role="presentation" data-target="#intro">
				<a href="#intro" role="tab" data-toggle="tab"><?= pll__( 'Intro' ); ?></a>
			</li>
			<li role="presentation" data-target="#services">
				<a href="#services" role="tab" data-toggle="tab"><?= pll__( 'Services and routes' ); ?></a>
			</li>
			<li role="presentation" data-target="#nature">
				<a href="#nature" role="tab" data-toggle="tab"><?= pll__( 'Nature' ); ?></a>
			</li>
			<li role="presentation" data-target="#history">
				<a href="#history" role="tab" data-toggle="tab"><?= pll__( 'History' ); ?></a>
			</li>
		</ul>
	</header>
	
	<?php get_template_part( 'partials/components/sidemenu-left' ); ?>
	<?php get_template_part( 'partials/components/sidemenu-right' ); ?>

	<main class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
			<?php get_template_part( 'partials/content', 'home' ); ?>
		</div>
    <div role="tabpanel" class="tab-pane fade" id="intro">
			<?php get_template_part( 'partials/content', 'intro' ); ?>
		</div>
    <div role="tabpanel" class="tab-pane fade" id="services">
			<?php get_template_part( 'partials/content', 'services' ); ?>
		</div>
    <div role="tabpanel" class="tab-pane fade" id="nature">
			<?php get_template_part( 'partials/content', 'nature' ); ?>
		</div>
    <div role="tabpanel" class="tab-pane fade" id="history">
			<?php get_template_part( 'partials/content', 'history' ); ?>
		</div>
  </main>
<?php endif; ?>

<!--<?php
if ( comments_open() || '0' != get_comments_number() ) :
	comments_template();
endif;
?>-->

<?php get_footer(); ?>
