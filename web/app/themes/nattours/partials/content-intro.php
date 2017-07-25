<?php $intro_bg = get_field('introduction_image'); ?>

<article class="location__intro">
  <section class="content--left">
    <div class="text-content">
      <?php the_content(); ?>
      <?php if ( get_field( 'introduction_gallery' ) ) : ?>
        <div id="introGallery" class="location__gallery">
          <?php foreach ( get_field( 'introduction_gallery' ) as $pic ) { ?>
            <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
          <?php } ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
  <?php if ( get_field( 'introduction_gallery' ) ) : ?>
    <section class="content--right location__images" id="introImages">
      <?php foreach ( get_field( 'introduction_gallery' ) as $pic ) { ?>
        <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
      <?php } ?>
    </section>
  <?php endif; ?>
</article>
