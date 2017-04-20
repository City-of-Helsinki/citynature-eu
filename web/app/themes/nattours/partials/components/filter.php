<?php
$difficulty = get_terms( [ 'taxonomy' => 'difficulty', 'hide_empty' => 0 ] );
$season = get_terms( [ 'taxonomy' => 'season', 'hide_empty' => 0 ] );
$activity = get_terms( [ 'taxonomy' => 'activity', 'hide_empty' => 0 ] );
$other = get_terms( [ 'taxonomy' => 'other', 'hide_empty' => 0 ] );
?>

<section class="filter" id="filterView">
  <div class="filter__header-container">
    <div class="filter__header">
      <span> <?= pll__('Filter locations') ?> </span>
      <i class="fa fa-times close-modal" id="filterClose" aria-hidden="true"></i>
    </div>
  </div>
  <div class="text-content">
    <section class="filter-category">
      <span><?= pll__('Difficulty'); ?></span>
      <?php foreach ( $difficulty as $single_difficulty ) :  // print_r( $difficulty ); ?>
        <input id="<?= $single_difficulty->slug ?>" type="checkbox" value="<?= $single_difficulty->name ?>">
        <label for="<?= $single_difficulty->slug ?>">
          <span class="hyphenate"><?= $single_difficulty->name ?></span>
        </label>
      <?php endforeach; ?>
    </section>
    <section class="filter-category">
      <span><?= pll__('Season'); ?></span>
      <?php foreach ( $season as $single_season ) :  // print_r( $season ); ?>
        <input id="<?= $single_season->slug ?>" type="checkbox" value="<?= $single_season->name ?>">
        <label for="<?= $single_season->slug ?>">
          <span class="hyphenate"><?= $single_season->name ?></span>
        </label>
      <?php endforeach; ?>
    </section>
    <section class="filter-category">
      <span><?= pll__('Activity'); ?></span>
      <?php foreach ( $activity as $single_activity ) :  // print_r( $activity ); ?>
        <input id="<?= $single_activity->slug ?>" type="checkbox" value="<?= $single_activity->name ?>">
        <label for="<?= $single_activity->slug ?>">
          <span class="hyphenate"><?= $single_activity->name ?></span>
        </label>
      <?php endforeach; ?>
    </section>
    <section class="filter-category">
      <span><?= pll__('Other'); ?></span>
      <?php foreach ( $other as $single_other ) :  // print_r( $other ); ?>
        <input id="<?= $single_other->slug ?>" type="checkbox" value="<?= $single_other->name ?>">
        <label for="<?= $single_other->slug ?>">
          <span class="hyphenate"><?= $single_other->name ?></span>
        </label>
      <?php endforeach; ?>
    </section>
  </div>
  <button class="filter__btn" id="filterBtn"><?= pll__('Display locations'); ?></button>
</section>