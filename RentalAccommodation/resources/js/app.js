import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';

require('./bootstrap');

Vue.use(VueRouter);

window.Vue = require('vue').default;

const router= new VueRouter({
    mode: 'history',
    routes
});

Vue.component('app-component', require('./components/App.vue').default);
Vue.component('example', require('./components/ExampleComponent.vue'));
Vue.component('accommodations', require('./components/Accommodations.vue'));

const app = new Vue({
    el: '#app',
    router
});

