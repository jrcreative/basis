// import external dependencies
import 'jquery';
import 'slick-carousel'
import 'bootstrap';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
