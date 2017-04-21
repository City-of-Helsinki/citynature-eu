export default {
  init() {
    const locationHeader = $('#locationHeader');

    const tabs = $('#tabNav a').get();
    const navLinks = $('.nav-link').get();

    // console.log(window.nattours_vars); //eslint-disable-line

    tabs.forEach(value => {
      $(value).click(e => {
        $(locationHeader).css(
          'background-image',
          `url(${window.nattours_vars[e.target.rel]})`,
        );
        $('html, body').animate({ scrollTop: 0 }, 400);
      });
    });

    navLinks.forEach(value => {
      $(value).click(e => {
        tabs.forEach(value => {
          e.target.href === value.href && $(value).click();
        });
      });
    });

    $('#introGallery').slick({
      arrows: false,
      centerMode: true,
      slidesToShow: 1,
      variableWidth: true,
      dots: true,
      initialSlide: 0,
    });

    const introPar = $('.location__intro .content--left .text-content p');
    $('#introGallery').insertAfter(introPar[0]);
  },
  finalize() {},
};
