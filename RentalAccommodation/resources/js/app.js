import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import routes from './routes';
import User from './helpers/User';
import AppStorage from './helpers/AppStorage';

require('./bootstrap');

window.Vue = require('vue');
window.User= User;

Vue.use(VueRouter);
Vue.use(Vuex);

export const router= new VueRouter({
    mode: 'history',
    routes
});

router.beforeEach((to, from, next) => {
    if(to.matched.some(route => route.meta.requiresAuth) && !store.state.isLoggedIn) {
        next({name: 'login'});
        return ;
    }

    if(to.path === '/login' && store.state.isLoggedIn) {
        next({name: 'dashboard'});
        return ;
    }

    next();
})

export const store= new Vuex.Store({
    state: {
        isLoggedIn: !!AppStorage.getToken()
    },
    mutations: {
        loginUser(state) {
            state.isLoggedIn= true;
        },
        logoutUser(state) {
            state.isLoggedIn= false;
        }
    }
});

Vue.component('app-component', require('./components/App.vue').default);
Vue.component('index', require('./components/Index.vue'));
Vue.component('accommodations', require('./components/Accommodations.vue'));
Vue.component('login', require('./components/Login.vue'));
Vue.component('register', require('./components/Register.vue'));
Vue.component('dashboard', require('./components/Dashboard.vue'));
Vue.component('logout', require('./components/Logout.vue'));
Vue.component('myAccommodations', require('./components/MyAccommodations.vue'));
Vue.component('search', require('./components/Search.vue'));

const app = new Vue({
    el: '#app',
    router,
    store
});