<?php

/**
 * Locations template to show locations for the city
 *
 * @package Nattours
 *
 * Template Name: Locations
 *
 */

get_header();

$locations = new WP_Query( [
	'post_type'      => 'location',
	'orderby'        => 'title',
	'order'          => 'asc',
	'posts_per_page' => - 1,
	'tax_query'      => array(
		array(
			'taxonomy' => 'location-city',
			'field'    => 'term_id',
			'terms'    => get_field( 'city_location' ),
		),
	),
] );

$location_arr = [];

$youtube  = get_field( 'video_url' );
$url_arr  = explode( '/', $youtube );
$video_id = end( $url_arr );
?>
<header class="header header--main">
	<?php get_template_part( 'partials/components/nav' ); ?>
    <div class="header__texts">
        <h1>
			<?= get_field( 'title' ); ?>
        </h1>
		<?php if ( $youtube ) : ?>
            <div class="link-component" data-toggle="modal"
                 data-target="#myModal" <?= ! get_field( 'video_border' ) ?: 'style="border: 3px solid' . get_field( 'video_border' ) . '; padding: 1rem;"'; ?>>
                <div class="link-component__img"
                     style="background-image: url(//img.youtube.com/vi/<?= $video_id ?>/0.jpg)"></div>
                <div class="link-component__text">
                    <h5><?= get_field( 'video_title' ); ?></h5>
                    <p><?= get_field( 'video_subtitle' ); ?></p>
                </div>
            </div>
		<?php endif; ?>
    </div>
    <style>
        .header--main {
            background-image: linear-gradient(
                    to bottom,
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.1) 10%,
                    rgba(0, 0, 0, 0.1) 80%,
                    rgba(0, 0, 0, 0.5)
            ),
            url("<?= get_the_post_thumbnail_url() ?>");
            /* overflow: hidden; */
        }
    </style>
</header>
<?php if ( wp_get_img_caption( get_post_thumbnail_id() ) ): ?>
    <span class="img-caption"><?= wp_get_img_caption( get_post_thumbnail_id() ); ?></span>
<?php endif; ?>

<?php get_template_part( 'partials/components/sidemenu-left' ); ?>
<?php get_template_part( 'partials/components/sidemenu-right' ); ?>
<?php get_template_part( 'partials/components/filter' ); ?>

<main class="front">
    <div class="front__filter">
        <h6><?= pll__( 'Locations' ) ?></h6>
        <div class="front__filter__link" id="openFilter">
            <i class="fa fa-filter" aria-hidden="true"></i>
            <a><?= pll__( 'Filter locations' ) ?></a>
        </div>
    </div>
    <div class="front__filter-selections" id="filterSelections"></div>
    <div class="front__content">
		<?php
		if ( $locations->have_posts() ) : while ( $locations->have_posts() ) : $locations->the_post();
			get_template_part( 'partials/content', 'excerpt' );
			array_push( $location_arr, '<a href="' . get_permalink() . '">' . get_the_title() . '</a>' );
		endwhile;
			wp_reset_postdata();
		else :
			get_template_part( 'partials/no-results' );
		endif;
		?>
    </div>
    <div class="text-content">
        <h4><?php the_title(); ?></h4>
		<?php the_content(); ?>
    </div>
</main>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<?= do_shortcode( "[rve src=\"<iframe src=\"https://www.youtube.com/embed/$video_id\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe>\" ratio=\"16by9\"]" ); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
