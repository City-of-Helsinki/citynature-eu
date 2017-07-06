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

    $(window).on('load', () => {
      if (
        $('body').hasClass('single-service') ||
        $('body').hasClass('single-route')
      ) {
        const map = window.WPLeafletMapPlugin.maps[1];

        let circle;

        map.locate({
          setView: true,
          maxZoom: 16,
        });

        map.on('locationfound', e => {
          circle = window.L.circleMarker(e.latlng, { radius: 5 });
          circle.addTo(map);
        });

        setInterval(() => {
          map.locate({
            setView: true,
            maxZoom: 16,
          });

          map.on('locationfound', e => {
            circle.removeFrom(map).setLatLng(e.latlng);
          });
        }, 5000);
      }
    });
  },
  finalize() {},
};

function gallerize(galleryId, locationTab) {
  $(galleryId).slick({
    arrows: false,
    centerMode: true,
    slidesToShow: 1,
    variableWidth: true,
    dots: true,
    initialSlide: 0,
  });

  const introPar = $(`${locationTab} .content--left .text-content p`);
  $(galleryId).insertAfter(introPar[0]);
}
