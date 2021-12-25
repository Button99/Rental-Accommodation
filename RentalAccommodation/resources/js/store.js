import AppStorage from './helpers/AppStorage';

export default new Vuex.Store({
    state: {
        status: '',
        user: null
    },

    mutations: {
        setAuthUser(state, user) {
            state.user= user;
        },

        logout(state) {
            state.status= '';
            state.token= '';
        }
    },

    actions: {

    },
    
    getters: {
        isLoggedIn(state) {
            return state.user !== null;
        }
    }
})