import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import {BootstrapVue, BootstrapVueIcons} from 'bootstrap-vue';
import routes from './routes';
import User from './helpers/User';
import Accommodation from './helpers/Accommodation';
import Rate from './helpers/Rate';
import AppStorage from './helpers/AppStorage';
import Vuelidate from 'vuelidate';
import LaravelVuePagination from 'laravel-vue-pagination';

require('./bootstrap');

window.Vue = require('vue');
window.User= User;
window.Accommodation= Accommodation;
window.Rate= Rate;

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);
Vue.use(Vuelidate);
Vue.use(LaravelVuePagination);


export const router= new VueRouter({
    mode: 'history',
    routes,
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
            AppStorage.clear();
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
Vue.component('security', require('./components/AccountSecurity.vue'));
Vue.component('delete', require('./components/DeleteAccount.vue'));
Vue.component('createAccommodation', require('./components/CreateAccommodation.vue'));
Vue.component('accommodation', require('./components/AccommodationPage.vue'));
Vue.component('updateAccommodation', require('./components/UpdateAccommodation.vue'));
Vue.component('accommodationsSearchPage', require('./components/AccommodationsSearchPage.vue'));
Vue.component('resultsPage', require('./components/ResultsPage.vue'));
Vue.component('verifyEmail', require('./components/VerifyEmail.vue'));
Vue.component('creditCardPage', require('./components/CreditCardPage.vue'));
Vue.component('forgotPassword', require('./components/ForgotPassword.vue'));
Vue.component('LaravelVuePagination', LaravelVuePagination);

const app = new Vue({
    el: '#app',
    router,
    store
});