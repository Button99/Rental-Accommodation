import ExampleComponent from './components/ExampleComponent.vue';
import Accommodations from './components/Accommodations.vue';

const routes= [
    {
        path: '/',
        name: 'index',
        component: ExampleComponent
    },
    {
        path: '/accommodations',
        name: 'accommodations',
        component: Accommodations
    }

];

export default routes;