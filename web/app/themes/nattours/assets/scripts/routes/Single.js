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
