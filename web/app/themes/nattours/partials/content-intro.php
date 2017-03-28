<style>
  .header--location {
    background-image:
      linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
      url("<?php the_field('introduction_image'); ?>");
    }
</style>

<article class="location__intro">
  <section class="location__intro__content">
    <div class="location__intro__content__text"> 
      <h4><?= pll__( 'Header for introduction text' ) ?></h4>
      <?php the_content(); ?>
    </div>
    <div id="introGallery">
      <?php foreach ( get_field( 'introduction_gallery' ) as $pic ) { ?>
        <img src="<?= $pic['sizes']['thumbnail']; ?>" />
      <?php } ?>
    </div>
    <div id="introImages">
      <?php foreach ( get_field( 'introduction_gallery' ) as $pic ) { ?>
        <img src="<?= $pic['sizes']['thumbnail']; ?>" />
      <?php } ?>
    </div>
  </section>
</article>
