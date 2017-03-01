// import external dependencies
import 'jquery';
import 'bootstrap-sass/assets/javascripts/bootstrap';
import 'fastclick';

// import local dependencies
import Router from './util/router';
import common from './routes/Common';
import single from './routes/Single';

// Use this variable to set up the common and page specific functions. If you
// rename this variable, you will also need to rename the namespace below.
const routes = {
  // All pages
  common,
  single,
};

// Load Events
document.addEventListener('DOMContentLoaded', () =>
  new Router(routes).loadEvents());
