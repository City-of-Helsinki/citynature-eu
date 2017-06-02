<?php $intro_bg = get_field('introduction_image'); ?>

<article class="location__intro">
  <section class="content--left">
    <div class="text-content"> 
      <?php the_content(); ?>
      <div id="introGallery" class="location__gallery">
        <?php foreach ( get_field( 'introduction_gallery' ) as $pic ) { ?>
          <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="content--right location__images" id="introImages">
    <?php foreach ( get_field( 'introduction_gallery' ) as $pic ) { ?>
      <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
    <?php } ?>
  </section>
</article>
