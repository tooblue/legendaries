/*
    Dependencies
*/
window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');
window.Spinner = require('spin.js');
window.moment = require('moment'); moment.locale('cs'); // Moment.js

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
var GuildHeroes = require('./views/guild-heroes.vue');
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
    '/guild-heroes': {
        name: 'guild-heroes',
        component: GuildHeroes
    },
    '/calc': {
        name: 'calculator',
        component: Calculator
    }
});

router.start(App, '#vue')
