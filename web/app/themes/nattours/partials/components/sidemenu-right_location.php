<?php $map_file = get_field( 'map_file' ); ?>

<section class="sidemenu sidemenu--right" id="rightMenu">
  <div class="sidemenu__header-container">
    <div class="sidemenu__header">
      <span> <?= pll__('Map') ?> </span>
      <i class="fa fa-times close-modal" id="rightClose" aria-hidden="false"></i>
    </div>
  </div>
  <div class="graphic-content">
    <?php
    $map = "[leaflet-map fit_markers=1][leaflet-geojson src=$map_file fitbounds=1]";
    $map_arr = [];
    array_push($map_arr, $map);
    if ( have_rows( 'markers' ) ): while ( have_rows( 'markers' ) ): the_row();
      $location = get_sub_field( 'location' );
      $lat = $location['lat'];
      $lng = $location['lng'];
      $icon = get_sub_field( 'icon' )['sizes']['map_marker'];
      $width =  get_sub_field( 'width' );
      $height =  get_sub_field( 'height' );
      $content = get_sub_field( 'content' );
      array_push($map_arr, "[leaflet-marker iconUrl=\"$icon\" iconSize=\"$width,$height\" lat=\"$lat\" lng=\"$lng\"] $content [/leaflet-marker]" );
    endwhile; endif;
    echo do_shortcode( implode( $map_arr ) );
    ?>
  </div>
</section>
