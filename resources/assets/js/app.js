/*
    Dependencies
*/
window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');

var Vue = require('vue');
var VueRouter = require('vue-router');

/*
    Vue Plugins
*/
Vue.use(VueRouter);
Vue.use(require('vue-resource'));

/*
    Views
*/
var App = require('./app.vue'); // base view
var Dashboard = require('./views/dashboard.vue');
var Collections = require('./views/collections.vue');

/*
    Vue routes
*/
var router = new VueRouter();

router.map({
    '/': {
        name: 'dashboard',
        component: Dashboard
    },
    '/inbox': {
        name: 'inbox',
        component: {}
    },
    '/collections': {
        name: 'collections',
        component: Collections
    },
    '/collection/:id': {
        name: 'collection',
        component: {}
    },
    '/friends': {
        name: 'friends',
        component: {}
    },
    '/settings': {
        name: 'settings',
        component: {}
    },
});

router.start(App, '#vue')
