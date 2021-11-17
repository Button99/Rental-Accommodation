import Index from './components/Index.vue';
import Accommodations from './components/Accommodations.vue';

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
    }

];

export default routes;