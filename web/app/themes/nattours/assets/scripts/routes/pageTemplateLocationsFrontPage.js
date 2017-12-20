export default {
  init() {
    $('body').show();

    let filters = [];

    const openFilter = $('#openFilter');
    const filterClose = $('#filterClose');

    const filterBoxes = $('input[type=checkbox]');

    const filterView = $('#filterView');
    const filterBtn = $('#filterBtn');
    const filterSelections = $('#filterSelections');

    const locations = $('.box-container').get();

    openFilter.click(() => {
      filterView.fadeToggle();
      filterView.css('overflow', 'auto');
      $('body').css('overflow', 'hidden');
    });

    filterClose.click(() => {
      filterView.fadeToggle();
      filterView.css('overflow', 'hidden');
      $('body').css('overflow', 'auto');
    });

    filterBoxes.change(e => {
      e.target.checked
        ? (filters = [...filters, e.target.value].sort())
        : (filters = filterArr(filters, e.target.value));

      filters.length > 0
        ? filterBtn.css('display', 'block')
        : filterBtn.css('display', 'none');
    });

    filterBtn.click(() => {
      filterSelections.html(null);
      filterClose.click();

      filters.forEach(value => {
        let filterValue = $.parseHTML(
          `<span class="front__filter-value">${value}</span>`
        );
        filterSelections.append(filterValue);
        $(filterValue).click(e => {
          //eslint-disable-next-line
          $.grep(
            filterBoxes,
            value => value.value === e.target.innerHTML
          )[0].click();
          // filters = filterArr(filters, e.target.innerHTML);
          goThruLocations(locations, filters);
          $(e.target).remove();
        });
      });

      goThruLocations(locations, filters);
    });

    $('.box').matchHeight();
    $('.menu-box').matchHeight();

    $('#myModal').on('hidden.bs.modal', () => {
      $('#myModal iframe').attr('src', $('#myModal iframe').attr('src'));
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

const filterArr = (arr, target) => arr.filter(value => value !== target).sort();

const goThruLocations = (locations, filters) => {
  locations.forEach(value => {
    const terms = value.getAttribute('data-terms');
    filters.every(value => terms.includes(value))
      ? (value.style.display = 'block')
      : (value.style.display = 'none');
  });
};
