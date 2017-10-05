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

    const rightOpen = $('#rightOpen');
    const rightMenu = $('#rightMenu');
    const rightClose = $('#rightClose');

    rightOpen.click(() => {
      rightMenu.css('transform', 'translateX(0)');
      rightMenu.css('overflow', 'auto');
      $('body').css('overflow', 'hidden');
    });
    rightClose.click(() => {
      rightMenu.css('transform', 'translateX(100%)');
      rightMenu.css('overflow', 'hidden');
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

    $.urlParam = function(name) {
      var results = new RegExp('[?&]' + name + '=([^&#]*)').exec(
        window.location.href
      );
      // console.log(name, results); //eslint-disable-line
      return results ? results[1] : 0;
    };
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
