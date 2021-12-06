import Index from './components/Index.vue';
import Accommodations from './components/Accommodations.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';

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
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    }

];

export default routes;