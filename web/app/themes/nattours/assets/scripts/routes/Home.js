export default {
  init() {
    $('body').show();

    const filterView = $('#filterView');

    $('#openFilter').click(() => {
      filterView.fadeToggle();
      filterView.css('overflow', 'auto');
      $('body').css('overflow', 'hidden');
    });

    $('#filterClose').click(() => {
      filterView.fadeToggle();
      filterView.css('overflow', 'hidden');
      $('body').css('overflow', 'auto');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
