<?php $location = get_field( 'route_location'); ?>

<section class="sidemenu sidemenu--right" id="rightMenu">
  <div class="sidemenu__header-container">
    <div class="sidemenu__header">
      <span> <?= pll__('Map') ?> </span>
      <i class="fa fa-times close-modal" id="rightClose" aria-hidden="false"></i>
    </div>
  </div>
  <div class="graphic-content">
    <?= do_shortcode( get_field( 'map_shortcodes', $location->ID ) ); ?>
  </div>
</section>