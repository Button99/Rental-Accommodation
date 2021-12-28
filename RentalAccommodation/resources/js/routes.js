import Index from './components/Index.vue';
import Accommodations from './components/Accommodations.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import Dashboard from './components/Dashboard.vue';
import Logout from './components/Logout.vue';
import MyAccommodations from './components/MyAccommodations.vue';
import MyAccount from './components/MyAccount.vue';
import Search from './components/Search.vue';

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
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/logout',
        name: 'logout',
        component: Logout,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/myAccommodations',
        name: 'myAccommodations',
        component: MyAccommodations,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/myAccount',
        name: 'myAccount',
        component: MyAccount,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/search',
        name: 'search',
        component: Search
    }
];

export default routes;