export default {
  init() {
    const tabs = $('#tabNav a').get();
    const navLinks = $('.nav-link').get();

    navLinks.forEach((value, index) => {
      $(value).click(() => {
        $(tabs[index + 1]).click();
      });
    });
  },
  finalize() {
  },
};
