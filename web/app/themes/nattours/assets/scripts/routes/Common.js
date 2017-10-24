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

    $(window).on('load', () => {
      const markers = window.WPLeafletMapPlugin.markers;

      document.documentElement.lang === 'fi'
        ? window.responsiveVoice.setDefaultVoice('Finnish Female')
        : window.responsiveVoice.setDefaultVoice('US English Female');

      // console.log(document.documentElement.lang); //eslint-disable-line

      markers.forEach(value => {
        $(value).click(e => {
          const contentNode = e.target._popup._contentNode;
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
          $(e.target._popup).on('remove', () => {
            window.responsiveVoice.cancel();
          });
        });
      });

      if (
        $('body').hasClass('single-service') ||
        $('body').hasClass('single-route')
      ) {
        const map = window.WPLeafletMapPlugin.maps[1];

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
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
