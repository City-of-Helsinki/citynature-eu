<a href="<?php the_permalink(); ?>">
  <article class="menu-box-container">
    <div class="menu-box" style="background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url(<?php the_post_thumbnail_url('location_thumb'); ?>);">
      <span><?php the_title(); ?></span>
    </div>
  </article>
</a>