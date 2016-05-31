/*
    Dependencies
*/
window.$ = window.jQuery = require('jquery')
require('bootstrap-sass');
window.Spinner = require('spin.js');
window.moment = require('moment'); moment.locale('cs'); // Moment.js

var nprogress = require('nprogress');
window.progress = {
    bar: nprogress.configure({ parent: '#app' }),
    load: 0,
    total: 0,
}

window.modalProgress = {
    bar: nprogress.configure({ parent: '#app' }),
    load: 0,
    total: 0,
}

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
var GuildHeroes = require('./views/guild/heroes.vue');
var GuildMembers = require('./views/guild/members.vue');

/*
    Vue routes
*/
var router = new VueRouter();

router.map({
    '/': {
        name: 'dashboard',
        component: Dashboard
    },
    '/guild-members': {
        name: 'guild-members',
        component: GuildMembers
    },
    '/guild-heroes': {
        name: 'guild-heroes',
        component: GuildHeroes
    }
});

router.start(App, '#vue')
