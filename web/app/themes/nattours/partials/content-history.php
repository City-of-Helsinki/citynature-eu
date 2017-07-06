<?php $intro_bg = get_field('history_image'); ?>

<article class="location__history">
  <section class="content--left">
    <div class="text-content">
      <?= get_field( 'history_text' ); ?>
      <div id="historyGallery" class="location__gallery">
        <?php foreach ( get_field( 'history_gallery' ) as $pic ) { ?>
          <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="content--right location__images" id="historyImages">
    <?php if ( get_field( 'history_gallery' ) ) : foreach ( get_field( 'history_gallery' ) as $pic ) : ?>
      <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
    <?php endforeach;  endif; ?>
  </section>
</article>
