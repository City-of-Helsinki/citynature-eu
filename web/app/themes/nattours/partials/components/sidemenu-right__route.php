<?php
$location = get_field( 'route_location'); 
$map = get_field( 'map_file', $location->ID ); 
?>

<section class="sidemenu sidemenu--right" id="rightMenu">
  <div class="sidemenu__header-container">
    <div class="sidemenu__header">
      <span> <?= pll__('Map') ?> </span>
      <i class="fa fa-times close-modal" id="rightClose" aria-hidden="false"></i>
    </div>
  </div>
  <div class="graphic-content">
    <?= do_shortcode( "[leaflet-map][leaflet-geojson src=$map fitbounds=1 popup_property=\"popup-text\"]" ) ?>
  </div>
</section>