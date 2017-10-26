<?php
$route_location = get_field( 'route_location');
$service_location = get_field( 'service_location');
$map;

if ($route_location) $map = get_field( 'map_file', $route_location->ID );
if ($service_location) $map = get_field( 'map_file', $service_location->ID );
?>

<section class="sidemenu sidemenu--right" id="rightMenu">
  <div class="sidemenu__header-container">
    <div class="sidemenu__header">
      <span> <?= pll__('Map') ?> </span>
      <i class="fa fa-times close-modal" id="rightClose" aria-hidden="false"></i>
    </div>
  </div>
  <div class="graphic-content">
    <?= do_shortcode( "[leaflet-map fit_markers=1][leaflet-geojson src=$map fitbounds=1 popup_property=\"message\"]" ) ?>
  </div>
</section>
