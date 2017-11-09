export default {
  init() {
    const tabs = $('#tabNav li').get();
    const navLinks = $('.nav-link').get();

    tabs.forEach(value => {
      $(value).removeClass('active');
    });

    const activeTab = tabs.filter(
      value =>
        $(value)
          .children('a')
          .data('target') == $.urlParam('section')
    );

    activeTab.length > 0
      ? $(activeTab).addClass('active')
      : $(tabs[0]).addClass('active');

    navLinks.forEach(value => {
      $(value).click(e => {
        tabs.forEach(value => {
          e.target.href === value.href && $(value).click();
        });
      });
    });

    gallerize('#natureGallery', '.location__nature');
    gallerize('#historyGallery', '.location__history');

    $('a[data-toggle="tab"]').on('shown.bs.tab', () => {
      window.WPLeafletMapPlugin.maps.forEach(value => {
        value._leaflet_id !== 2 && value.setZoom(15);
        value.invalidateSize();
      });
    });

    $('.species-wrapper .link-component').matchHeight();

    $(window).scroll(() => {
      let scroll = $('main')[0].scrollTop();
      console.log('test: ' + scroll); //eslint-disable-line
    });
  },
  finalize() {},
};

function gallerize(galleryId, locationTab) {
  $(galleryId).slick({
    centerMode: true,
    slidesToShow: 1,
    variableWidth: true,
    dots: true,
    initialSlide: 0,
    adaptiveHeight: true,
  });

  const introPar = $(`${locationTab} .content--center .text-content p`)[0];

  $(galleryId).insertAfter(introPar);
}
