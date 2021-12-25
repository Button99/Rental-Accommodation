import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import routes from './routes';
import User from './helpers/User';

require('./bootstrap');

window.Vue = require('vue');
window.User= User;

Vue.use(VueRouter);
Vue.use(Vuex);

export const router= new VueRouter({
    mode: 'history',
    routes
})

Vue.component('app-component', require('./components/App.vue').default);
Vue.component('index', require('./components/Index.vue'));
Vue.component('accommodations', require('./components/Accommodations.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('register', require('./components/Register.vue'));
Vue.component('dashboard', require('./components/Dashboard.vue'));

const app = new Vue({
    el: '#app',
    router
});

