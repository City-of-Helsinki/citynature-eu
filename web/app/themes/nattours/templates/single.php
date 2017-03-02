<?php

/**
 * The main post-template-wrapper
 *
 * @package Nattours
 */

get_header('place');

?>

<?php do_action( 'nattours_before_page' ); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div class="header__texts">
			<h3><?php the_title(); ?></h3>
			<?php the_excerpt(); ?>
		</div>

		<ul class="place__tabs" role="tablist" id="tabNav">
			<li role="presentation" class="active" data-target="#preview">
				<a href="#preview" role="tab" data-toggle="tab">Preview</a>
			</li>
			<li role="presentation" data-target="#intro">
				<a href="#intro" role="tab" data-toggle="tab">Intro</a>
			</li>
			<li role="presentation" data-target="#services">
				<a href="#services" role="tab" data-toggle="tab">Services</a>
			</li>
			<li role="presentation" data-target="#nature">
				<a href="#nature" role="tab" data-toggle="tab">Nature</a>
			</li>
		</ul>
	</header>
	
	<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="preview">
			<?php get_template_part( 'partials/content', 'preview' ); ?>
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
  </div>
<?php endwhile; endif; ?>

<?php
if ( comments_open() || '0' != get_comments_number() ) :
	comments_template();
endif;
?>

<?php get_footer(); ?>
