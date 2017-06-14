<?php
$sidemenu_locations = new WP_Query( [
  'post_type' => 'location',
  'order'     => 'asc',
] );
?>

<section class="sidemenu sidemenu--left" id="leftMenu">
  <div class="sidemenu__header-container">
    <div class="sidemenu__header">
      <span> <?= pll__('Menu') ?> </span>
      <i class="fa fa-times close-modal" id="leftClose" aria-hidden="false"></i>
    </div>
  </div>
  <div class="container-fluid">
    <div class="content--left">
      <h6 class="sidemenu__location"><?= pll__('Helsinki') ?></h6><a href="/" class="sidemenu__all"><?= pll__('All locations') ?></a>
      <div class="graphic-content visible-xs" id="locationGallery">
        <?php if ( $sidemenu_locations->have_posts() ) : while ( $sidemenu_locations->have_posts() ) : $sidemenu_locations->the_post();
          get_template_part( 'partials/content', 'excerpt-sidemenu' );
        endwhile; endif; ?>
      </div>
      <div class="graphic-content hidden-xs">
        <?php if ( $sidemenu_locations->have_posts() ) : while ( $sidemenu_locations->have_posts() ) : $sidemenu_locations->the_post();
          get_template_part( 'partials/content', 'excerpt-sidemenu' );
        endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
    <div class="content--right">
      <span> <?= pll__('Language') ?> </span>
      <?php nattours_main_menu(); ?>
    </div>
  </div>
</section>