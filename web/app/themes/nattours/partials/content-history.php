<?php $bg_img = get_field( 'history_image' ); ?>

<style>
	.header--location {
		background-image: linear-gradient(
      to bottom,
      rgba(0, 0, 0, 0.5),
      rgba(0, 0, 0, 0.1) 10%,
      rgba(0, 0, 0, 0.1) 70%,
      rgba(0, 0, 0, 0.6)
		),
		url("<?= $bg_img; ?>");
	}
</style>

<main class="location__history">
  <section class="content--center">
    <div class="text-content">
      <?= get_field( 'history_text' ); ?>
    </div>
    <?php if ( get_field( 'history_gallery' ) ) : ?>
      <div class="graphic-content location__gallery" id="historyGallery">
        <?php if ( get_field( 'history_gallery' ) ) : foreach ( get_field( 'history_gallery' ) as $pic ) : ?>
          <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
        <?php endforeach;  endif; ?>
      </div>
    <?php endif; ?>
  </section>
</main>
