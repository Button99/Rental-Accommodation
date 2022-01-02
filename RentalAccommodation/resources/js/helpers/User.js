import {router, store} from '../app';
import AppStorage from './AppStorage';

class User {
    loginUser(data) {
        axios.get('/sanctum/csrf-cookie');

        axios.post('api/login', data)
            .then((res) => {
                if(res.status === 202) {
                    store.commit('loginUser');
                    const accessToken= res.data.token;
                    const usr_name= res.data.first_name;
                    const usr_last= res.data.last_name;
                    AppStorage.store([usr_name, usr_last], JSON.stringify(accessToken));
                    router.push({name: 'dashboard'});
                }
            }).catch((err) => {
                if(err) {
                    alert(err);
                }
            });
    }


    signup(data) {

        axios.post('api/signup', data)
            .then((res) => {
                if(res.status === 201) {
                    console.log('Signup done');
                    router.push({name: 'login'});
                }
            }).catch((err) => {
                if(err) {
                    alert(err);
                }
            });
    }

    logout() {
        store.commit('logoutUser');
        AppStorage.clear();
    }

    getName() {
        var usr= JSON.parse(AppStorage.getUser());
        return usr[0];
    }
}

export default User= new User();