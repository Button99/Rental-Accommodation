import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import User from './helpers/User';

require('./bootstrap');

Vue.use(VueRouter);

window.Vue = require('vue').default;
window.User= User;

const router= new VueRouter({
    mode: 'history',
    routes
});

Vue.component('app-component', require('./components/App.vue').default);
Vue.component('index', require('./components/Index.vue'));
Vue.component('accommodations', require('./components/Accommodations.vue'));
Vue.component('login', require('./components/Login.vue'));

const app = new Vue({
    el: '#app',
    router
});

