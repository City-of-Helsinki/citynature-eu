<style>
  .header--location {
    background-image: 
      -webkit-linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
      -moz-linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
      -o-linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
      linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),
      url("<?php the_field('introduction_image'); ?>");
    }
</style>

<article class="location__intro">
  <section class="location__intro__content">
    <div class="location__intro__content__text"> 
      <h4><?= pll__( 'Header for introduction text' ) ?></h4>
      <?php get_first_paragraph( the_content() ); ?>
    </div>
  </section>
</article>
