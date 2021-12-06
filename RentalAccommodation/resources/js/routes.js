import Index from './components/Index.vue';
import Accommodations from './components/Accommodations.vue';
import Login from './components/Login.vue';

const routes= [
    {
        path: '/',
        name: 'index',
        component: Index
    },
    {
        path: '/accommodations',
        name: 'accommodations',
        component: Accommodations
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    }

];

export default routes;