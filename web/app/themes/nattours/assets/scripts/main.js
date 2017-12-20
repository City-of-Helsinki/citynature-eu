// import external dependencies
import 'jquery';
import 'slick-carousel';
import 'bootstrap-sass/assets/javascripts/bootstrap';
import 'fastclick';
import 'jquery-match-height';

// import local dependencies
import Router from './util/router';
import common from './routes/Common';
import pageTemplateLocationsFrontPage from './routes/pageTemplateLocationsFrontPage';
import single from './routes/Single';

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
const routes = {
  // All pages
  common,
    pageTemplateLocationsFrontPage,
  single,
};

// Load Events
document.addEventListener('DOMContentLoaded', () =>
  new Router(routes).loadEvents()
);
