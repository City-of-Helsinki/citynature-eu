<?php $map_file = get_field( 'map_file' ); ?>

<section class="sidemenu sidemenu--right" id="rightMenu">
  <div class="sidemenu__header-container">
    <div class="sidemenu__header">
      <span> <?= pll__('Map') ?> </span>
      <i class="fa fa-times close-modal" id="rightClose" aria-hidden="false"></i>
    </div>
  </div>
  <div class="graphic-content">
    <?= do_shortcode( "[leaflet-map boxZoom=false doubleClickZoom=false dragging=false keyboard=false scrollwheel=0 attribution=0][leaflet-geojson src=$map_file fitbounds=1 popup_property=\"message\"]" ) ?>
  </div>
</section>
