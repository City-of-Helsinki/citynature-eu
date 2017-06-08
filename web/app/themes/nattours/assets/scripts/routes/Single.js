export default {
  init() {
    const locationHeader = $('#locationHeader');

    const tabs = $('#tabNav a').get();
    const navLinks = $('.nav-link').get();

    tabs.forEach(value => {
      $(value).click(e => {
        $(locationHeader).css(
          'background-image',
          `url(${window.nattours_vars[e.target.rel]})`
        );
      });
    });

    navLinks.forEach(value => {
      $(value).click(e => {
        $('html, body').animate({ scrollTop: 0 }, 300, 'swing', () => {
          tabs.forEach(value => {
            e.target.href === value.href && $(value).click();
          });
        });
      });
    });

    gallerize('#introGallery', '.location__intro');
    gallerize('#historyGallery', '.location__history');

    $('a[data-toggle="tab"]').on('shown.bs.tab', () => {
      window.WPLeafletMapPlugin.maps.forEach(value => {
        value._leaflet_id !== 2 && value.setZoom(15);
        value.invalidateSize();
      });
    });
  },
  finalize() {},
};

function gallerize(galleryId, locatioTab) {
  $(galleryId).slick({
    arrows: false,
    centerMode: true,
    slidesToShow: 1,
    variableWidth: true,
    dots: true,
    initialSlide: 0,
  });

  const introPar = $(`${locatioTab} .content--left .text-content p`);
  $(galleryId).insertAfter(introPar[0]);
}
