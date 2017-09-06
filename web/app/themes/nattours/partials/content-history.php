<article class="location__history">
  <section class="content--left">
    <div class="text-content">
      <?= get_field( 'history_text' ); ?>
    </div>
  </section>
  <?php if ( get_field( 'history_gallery' ) ) : ?>
    <section class="content--right location__gallery" id="historyGallery">
      <?php if ( get_field( 'history_gallery' ) ) : foreach ( get_field( 'history_gallery' ) as $pic ) : ?>
        <a href="<?= $pic['url']; ?>" rel="lightbox"><img src="<?= $pic['sizes']['location_thumb']; ?>" /></a>
      <?php endforeach;  endif; ?>
    </section>
  <?php endif; ?>
</article>
