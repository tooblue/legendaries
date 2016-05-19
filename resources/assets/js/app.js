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
var Calculator = require('./views/calculator.vue');

/*
    Vue routes
*/
var router = new VueRouter();

router.map({
    '/': {
        name: 'dashboard',
        component: Dashboard
    },
    '/calc': {
        name: 'calculator',
        component: Calculator
    }
});

router.start(App, '#vue')
