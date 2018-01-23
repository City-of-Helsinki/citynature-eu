<?php

$nature_bg = get_field( 'nature_image' );

?>

<style>
    .header--location {
        background: linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0.5),
                rgba(0, 0, 0, 0.1) 10%,
                rgba(0, 0, 0, 0.1) 70%,
                rgba(0, 0, 0, 0.6)
        ),
        url(<?= $nature_bg['url'] ?>) center/cover no-repeat;
    }
</style>

</header>
<?php if ( wp_get_img_caption( $nature_bg['id'] ) ): ?>
    <span class="img-caption"><?= wp_get_img_caption( $nature_bg['id'] ); ?></span>
<?php endif; ?>

<main class="location__nature">
    <section class="content--center">
        <div class="text-content">
			<?php
			get_template_part( 'partials/content-audio-player', 'nature' );
			the_content();
			?>
        </div>
		<?php if ( get_field( 'nature_gallery' ) ) : ?>
            <div class="graphic-content location__gallery" id="natureGallery">
				<?php foreach ( get_field( 'nature_gallery' ) as $pic ) : ?>
                    <a href="<?= $pic['url']; ?>" data-rel="lightbox" rel="<?= wp_get_img_caption( $pic['id'] ) ?>">
                        <img src="<?= $pic['sizes']['location_thumb']; ?>"/>
                    </a>
				<?php endforeach; ?>
            </div>
		<?php endif; ?>
    </section>
</main>
