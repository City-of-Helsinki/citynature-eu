<?php $intro_bg = get_field('history_image'); ?>

<article class="location__history">
  <section class="content--left">
    <div class="text-content"> 
      <?php the_content(); ?>
      <div id="historyGallery" class="location__gallery">
        <?php foreach ( get_field( 'history_gallery' ) as $pic ) { ?>
          <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="content--right location__images" id="historyImages">
    <?php foreach ( get_field( 'history_gallery' ) as $pic ) { ?>
      <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
    <?php } ?>
  </section>
</article>
