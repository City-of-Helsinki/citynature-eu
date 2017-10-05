<a href="<?php the_permalink(); ?>">
  <article class="menu-box-container">
    <div class="menu-box" style="background-image: linear-gradient(to bottom, rgba(0,0,0,.1) 60%,rgba(0,0,0,.2), 70%,rgba(0,0,0,.3)), url(<?php the_post_thumbnail_url('location_thumb'); ?>);">
      <span><?php the_title(); ?></span>
    </div>
  </article>
</a>
