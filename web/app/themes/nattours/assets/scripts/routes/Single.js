export default {
  init() {
    const tabs = $('#tabNav a').get();
    const navLinks = $('.nav-link').get();

    navLinks.forEach((value, index) => {
      $(value).click(() => {
        $(tabs[index + 1]).click();
      });
    });

    $('#introGallery').slick({
      arrows: false,
      // mobileFirst: true,
      adaptiveHeight: true,
      dots: true,
    });

    const introPar = $('.location__intro__content__text p');
    $('#introGallery').insertAfter(introPar[0]);
  },
  finalize() {},
};
