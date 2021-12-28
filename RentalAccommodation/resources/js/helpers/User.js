import {router, store} from '../app';
import AppStorage from './AppStorage';
import Token from './Token';

class User {
    loginUser(data) {
        axios.get('/sanctum/csrf-cookie');

        axios.post('api/login', data)
            .then((res) => {
                if(res.status === 202) {
                    store.commit('loginUser');
                    // AppStorage.store(res.data.user, accessToken);
                    const accessToken= res.data.token;
                    const usr_data= res.data.user;
                    localStorage.setItem('user', JSON.stringify(res.data));
                    // if(accessToken.isValid(accessToken)) {
                    //     AppStorage.store(usr_data);
                    // }
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
        console.log('try that');
    }

    getName() {
        var usr= AppStorage.getUser();
        let dat= JSON.parse(usr);
        return dat.first_name;
    }
}

export default User= new User();