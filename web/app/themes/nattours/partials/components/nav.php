<div class="header__nav">
  <div class="header__nav__sidemenu">
    <i class="fa fa-bars" id="leftOpen" aria-hidden="true"></i>
  </div>
  <a href="/" class="header__nav__link">
    <span>hel.fi/luonto</span>
  </a>
  <span class="header__nav__map">
    <span class="hidden-xs">
      <?php 
      echo get_post_type() === 'location' ? pll__('Location on map') : pll__('Locations on map');
      ?>
    </span>
    <i class="fa fa-map-o" aria-hidden="true"></i>
  </span>
</div>