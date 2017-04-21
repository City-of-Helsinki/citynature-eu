<style>
  .header--location {
    background-image:
      linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
      url("<?php the_field('introduction_image'); ?>");
    }
</style>

<article class="location__intro">
  <section class="content--left">
    <div class="text-content"> 
      <h4><?= pll__( 'Header for introduction text' ) ?></h4>
      <?php the_content(); ?>
      <div id="introGallery">
        <?php foreach ( get_field( 'introduction_gallery' ) as $pic ) { ?>
          <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['thumbnail']; ?>" /></a>
        <?php } ?>
      </div>
    </div>
  </section>
  <section class="content--right" id="introImages">
    <?php foreach ( get_field( 'introduction_gallery' ) as $pic ) { ?>
      <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['thumbnail']; ?>" /></a>
    <?php } ?>
  </section>
</article>
