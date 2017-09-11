<?php $nature_bg = get_field('nature_image'); ?>

<style>
  .header--location {
    background: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.5),
      rgba(0, 0, 0, 0.1) 10%,
      rgba(0, 0, 0, 0.1) 70%,
      rgba(0, 0, 0, 0.6)
    ),
    url(<?= $nature_bg ?>) center/cover no-repeat;
  }
</style>

<main class="location__nature">
  <section class="content--left">
    <div class="text-content">
      <?php the_content(); ?>
    </div>
  </section>
  <?php if ( get_field( 'nature_gallery' ) ) : ?>
    <section class="content--right location__gallery" id="natureGallery">
      <?php foreach ( get_field( 'nature_gallery' ) as $pic ) : ?>
        <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
      <?php endforeach; ?>
    </section>
  <?php endif; ?>
</main>
