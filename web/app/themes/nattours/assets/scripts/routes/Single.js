export default {
  init() {
    const tabs = $('#tabNav a').get();
    const navLinks = $('.nav-link').get();

    navLinks.forEach(value => {
      $(value).click(e => {
        tabs.forEach(value => {
          e.target.href === value.href && $(value).click();
          $('html, body').animate({ scrollTop: 0 }, 400);
        });
      });
    });

    $('#introGallery').slick({
      arrows: false,
      centerMode: true,
      slidesToShow: 1,
      variableWidth: true,
      dots: true,
      initialSlide: 1,
    });

    const introPar = $('.location__intro .location__text-content p');
    $('#introGallery').insertAfter(introPar[0]);
  },
  finalize() {},
};
