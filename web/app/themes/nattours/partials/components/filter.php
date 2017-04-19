<?php
// $difficulties = wp_get_post_terms( $post->ID, 'difficulties' );
// $seasons = wp_get_post_terms( $post->ID, 'seasons' );
// $activities = wp_get_post_terms( $post->ID, 'activities' );
// $others = wp_get_post_terms( $post->ID, 'others' );

$terms = get_terms( [
  'taxonomy'    => ['difficulty', 'season', 'activity', 'other'],
  'hide_empty'  => 0,
] );
?>

<section class="filter" id="filterView">
  <div class="filter__header-container">
    <div class="filter__header">
      <span> <?= pll__('Filter locations') ?> </span>
      <i class="fa fa-times" id="filterClose" aria-hidden="true"></i>
    </div>
  </div>
  <div class="text-content">
    <!--<span>Vaikeus</span>
    <?php print_r( $difficulties ); ?>
    <span>Vuodenaikasuositus</span>
    <?php print_r( $seasons ); ?>
    <span>Aktiviteetit</span>
    <?php print_r( $activities ); ?>
    <span>Muut</span>
    <?php print_r( $others ); ?>-->
    <?php print_r( $terms ); ?>
  </div>
</section>