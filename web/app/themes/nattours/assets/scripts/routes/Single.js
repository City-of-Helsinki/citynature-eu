export default {
  init() {
    const locationHeader = $('#locationHeader');

    const tabs = $('#tabNav a').get();
    const navLinks = $('.nav-link').get();

    tabs.forEach(value => {
      $(value).click(e => {
        $(locationHeader).css(
          'background-image',
          `linear-gradient(
            to bottom,
            rgba(0, 0, 0, 0.5),
            rgba(0, 0, 0, 0.1) 10%,
            rgba(0, 0, 0, 0.1) 70%,
            rgba(0, 0, 0, 0.6)
          ),
          url(${window.nattours_vars[e.target.rel]})`
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

    gallerize('#natureGallery', '.location__nature');
    gallerize('#historyGallery', '.location__history');

    $('a[data-toggle="tab"]').on('shown.bs.tab', () => {
      window.WPLeafletMapPlugin.maps.forEach(value => {
        value._leaflet_id !== 2 && value.setZoom(15);
        value.invalidateSize();
      });
    });

    $(window).on('load', () => {
      const maps = window.WPLeafletMapPlugin.maps;

      document.documentElement.lang === 'fi'
        ? window.responsiveVoice.setDefaultVoice('Finnish Female')
        : window.responsiveVoice.setDefaultVoice('US English Female');

      // console.log(document.documentElement.lang); //eslint-disable-line

      maps.forEach(value => {
        value.on('popupopen', e => {
          const contentNode = e.popup._contentNode;
          const innerText = contentNode.innerText.replace(
            /\.?\r?\n|\r|\n/g,
            '. '
          );

          $(contentNode).prepend(
            `<span
              class="glyphicon
              glyphicon-volume-up"
              aria-hidden="true"
              style="display: block; font-size: 24px; margin-bottom: 1rem; cursor: pointer"
              onclick="window.responsiveVoice.speak('${innerText}');"
            </span>`
          );
        });
        value.on('popupclose', () => {
          window.responsiveVoice.cancel();
        });
      });

      if (
        $('body').hasClass('single-service') ||
        $('body').hasClass('single-route')
      ) {
        const map = maps[1];

        let circle;

        map.locate();

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

  const introPar = $(`${locationTab} .content--left .text-content p`)[0];
  const contentLeft = $(`${locationTab} .content--left`)[0];
  const mediaQuery = window.matchMedia('(max-width: 768px)');

  if (mediaQuery.matches) {
    $(galleryId).insertAfter(introPar);
  }

  mediaQuery.addListener(mql => {
    if (mql.matches) {
      $(galleryId).insertAfter(introPar);
    } else {
      $(galleryId).insertAfter(contentLeft);
    }
  });
}
