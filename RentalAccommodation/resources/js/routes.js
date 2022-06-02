import Index from './components/Index.vue';
import Accommodations from './components/Accommodations.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';
import Dashboard from './components/Dashboard.vue';
import Logout from './components/Logout.vue';
import MyAccommodations from './components/MyAccommodations.vue';
import MyAccount from './components/MyAccount.vue';
import Search from './components/Search.vue';
import AccountSecurity from './components/AccountSecurity.vue';
import DeleteAccount from './components/DeleteAccount.vue';
import CreateAccommodation from './components/CreateAccommodation.vue';
import AccommodationPage from './components/AccommodationPage.vue';
import UpdateAccommodation from './components/UpdateAccommodation.vue';
import AccommodationsSearchPage from './components/AccommodationsSearchPage.vue';
import ResultsPage from './components/ResultsPage.vue';
import VerifyEmail from './components/VerifyEmail.vue';

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
        path: '/myAccount/general',
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
    },
    {
        path: '/myAccount/security',
        name: 'security',
        component: AccountSecurity,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/myAccount/deleteAccount',
        name: 'delete',
        component: DeleteAccount,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/createAccommodation',
        name: 'createAccommodation',
        component: CreateAccommodation,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/accommodation/:id',
        name: 'accommodation',
        component: AccommodationPage
    },
    {
        path: '/updateAccommodation/:id',
        name: 'updateAccommodation',
        component: UpdateAccommodation,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/AccommodationsSearchPage',
        name: 'accommodationsSearchPage',
        component: AccommodationsSearchPage
    },
    {
        path: '/ResultsPage',
        name: 'resultsPage',
        component: ResultsPage,
    },
    {
        path: '/verifyEmail',
        name: 'verifyEmail',
        component: VerifyEmail
    }
];

export default routes;