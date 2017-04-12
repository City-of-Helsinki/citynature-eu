export default {
  init() {
    $('body').show();
    const leftOpen = $('#leftOpen');
    const leftMenu = $('#leftMenu');
    const leftClose = $('#leftClose');

    leftOpen.click(() => {
      leftMenu.css('transform', 'translateX(0)');
      leftMenu.css('overflow', 'auto');
      $('body').css('overflow', 'hidden');
    });
    leftClose.click(() => {
      leftMenu.css('transform', 'translateX(-100%)');
      leftMenu.css('overflow', 'hidden');
      $('body').css('overflow', 'auto');
    });

    $('#locationGallery').slick({
      arrows: false,
      centerMode: true,
      slidesToShow: 2,
      variableWidth: false,
      dots: false,
      initialSlide: 0,
      centerPadding: 0,
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
