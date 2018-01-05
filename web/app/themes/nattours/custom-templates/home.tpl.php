<?php

/**
 * Front page template
 *
 * @package Nattours
 *
 * Template Name: Front page
 * Description: Front page template
 */

get_header();

echo '</header>';

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		?>
        <div class="logos-wrapper">
            <img src="<?php echo \UTILS()->get_image_uri() . '/interreg_logo.jpg' ?>" alt="Interreg logo"/>
            <img src="<?php echo \UTILS()->get_image_uri() . '/eu_logo.jpg' ?>" alt="EU logo"/>
            <img src="<?php echo \UTILS()->get_image_uri() . '/nattours_logo.jpg' ?>" alt="Nattours logo"/>
        </div>
        <h1 class="text-center"><?php the_field( 'front_page_title' ) ?></h1>
		<?php
		if ( have_rows( 'locations' ) ) {
			?>
            <div class="front-page-locations">
				<?php
				while ( have_rows( 'locations' ) ) {
					the_row();
					$image = get_sub_field( 'background_image' );
					?>
                    <a href="<?php the_sub_field( 'location_url' ) ?>">
                        <div class="front-page-location"
                             style="background: linear-gradient( to bottom, rgba(0,0,0,0.1) 60%, rgba(0,0,0,0.6) ), url('<?php echo $image['url'] ?>') bottom right/cover no-repeat">
                            <img class="logo-img"
                                 src="<?php echo \UTILS()->get_image_uri() . '/' . get_sub_field( 'logo' ) . '_logo.png' ?>"/>
                            <span class="image-caption">
                            <?php echo $image['caption'] ?>
                        </span>
                        </div>
                    </a>
					<?php
				}
				?>
            </div>
			<?php
		}
	}
}

get_footer();

?>
