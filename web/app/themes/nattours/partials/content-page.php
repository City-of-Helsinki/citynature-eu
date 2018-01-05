<?php

/**
 * The main template for page
 *
 * @package Nattours
 *
 */

get_header();
?>

<header class="header header--location" id="locationHeader">
    <!--<div class="header__overlay"></div>-->
	<?php get_template_part( 'partials/components/nav-default-page' ); ?>
    <div class="header__texts">
        <h3><?php the_title(); ?></h3>
    </div>
    <style>
        .header--location {
            background-image: linear-gradient(
                    to bottom,
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.1) 10%,
                    rgba(0, 0, 0, 0.1) 70%,
                    rgba(0, 0, 0, 0.6)
            ),
            url("<?php echo get_the_post_thumbnail_url(); ?>");
        }
    </style>

</header>
<?php if ( wp_get_img_caption( get_post_thumbnail_id() ) ): ?>
    <span class="img-caption"><?= wp_get_img_caption( get_post_thumbnail_id() ); ?></span>
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class="default-page-column">
            <article>
		        <?php the_content(); ?>
            </article>
        </div>
    </div>
</div>

<?php
get_footer();
?>
