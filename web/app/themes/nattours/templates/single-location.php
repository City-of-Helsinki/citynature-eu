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
      <p class="subtitle"><?= wp_strip_all_tags( get_the_excerpt() ); ?></p>
    </div>

    <ul class="location__tabs" role="tablist" id="tabNav">
      <li>
        <a href="?section=home" data-target="home"><?= pll__( 'Home' ); ?></a>
      </li>
      <li>
        <a href="?section=nature" data-target="nature"><?= pll__( 'Nature' ); ?></a>
      </li>
      <li>
        <a href="?section=services" data-target="services"><?= pll__( 'Routes' ); ?></a>
      </li>
      <li>
        <a href="?section=species" data-target="species"><?= pll__( 'Species' ); ?></a>
      </li>
      <li>
        <a href="?section=history" data-target="history"><?= pll__( 'History' ); ?></a>
      </li>
    </ul>


  <?php
  if ( !empty( $_GET ) ) {
    if ( $_GET['section'] === 'home' ) :
      get_template_part( 'partials/content', 'home' );
    elseif ( $_GET['section'] === 'nature' ) :
      get_template_part( 'partials/content', 'nature' );
    elseif ( $_GET['section'] === 'services' ) :
      get_template_part( 'partials/content', 'services' );
    elseif ( $_GET['section'] === 'species' ) :
      get_template_part( 'partials/content', 'species' );
    elseif ( $_GET['section'] === 'history' ) :
      get_template_part( 'partials/content', 'history' );
    else:
      get_template_part( 'partials/content', 'home' );
    endif;
  } else {
    get_template_part( 'partials/content', 'home' );
  }
endif;?>

<?php get_template_part( 'partials/components/sidemenu-left' ); ?>
<?php get_template_part( 'partials/components/sidemenu-right_location' ); ?>

<?php get_footer(); ?>
