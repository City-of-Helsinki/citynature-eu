<?php $intro_bg = get_field('nature_image'); ?>

<article class="location__nature">
  <section class="content--left">
    <div class="text-content">
      <?php the_content(); ?>
    </div>
  </section>
  <?php if ( get_field( 'nature_gallery' ) ) : ?>
    <section class="content--right location__gallery" id="natureGallery">
      <?php foreach ( get_field( 'nature_gallery' ) as $pic ) { ?>
        <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
      <?php } ?>
    </section>
  <?php endif; ?>
</article>
