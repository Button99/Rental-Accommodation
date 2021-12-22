import {router} from '../app';
import AppStorage from './AppStorage';

class User {
    loginUser(data) {
        axios.get('/sanctum/csrf-cookie');

        axios.post('api/login', data)
            .then((res) => {
                if(res.status === 202) {                    console.log('works');

                    localStorage.setItem('user', JSON.stringify(res.data));
                    router.push({name: 'dashboard'});
                    console.log('works');
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

    getName() {
        var usr= AppStorage.getUser();
        console.log(usr.first_name);
        return usr.first_name;
    }
}

export default User= new User();