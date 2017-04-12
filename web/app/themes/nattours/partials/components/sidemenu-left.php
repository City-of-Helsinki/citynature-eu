<?php
$locations = new WP_Query( [
  'post_type' => 'location',
  'order'     => 'asc',
] );
?>

<section class="sidemenu--left" id="leftMenu">
  <div class="sidemenu__header-container">
    <div class="sidemenu__header">
      <span> <?= pll__('Menu') ?> </span>
      <i class="fa fa-times" id="leftClose" aria-hidden="true"></i>
    </div>
  </div>
  <div class="content--left">
    <h6 class="sidemenu__location"><?= pll__('Helsinki') ?></h6><span class="sidemenu__all"><?= pll__('All locations') ?></span>
    <div class="graphic-content visible-xs" id="locationGallery">
      <?php if ( $locations->have_posts() ) : while ( $locations->have_posts() ) : $locations->the_post();
        get_template_part( 'partials/content', 'excerpt-sidemenu' );
      endwhile; endif; ?>
    </div>
    <div class="graphic-content hidden-xs">
      <?php if ( $locations->have_posts() ) : while ( $locations->have_posts() ) : $locations->the_post();
        get_template_part( 'partials/content', 'excerpt-sidemenu' );
      endwhile; endif; ?>
    </div>
  </div>
  <div class="content--right">
    <span> <?= pll__('Language') ?> </span>
  </div>
</section>