import axios from 'axios';
import {router, store} from '../app';
import AppStorage from './AppStorage';
import Validations from './Validations';

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
                    router.push({name: 'login'});
                }
            }).catch((err) => {
                alert(err);
            });
    }

    logout() {
        axios({
            method: 'post',
            url: 'api/logout',
            headers: {
                Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
            }
        }).then((res) => {
            AppStorage.clear();
            store.commit('logoutUser');
        }).catch((err) => {
            alert(err);
        });
    }

    getName() {
        var usr= JSON.parse(AppStorage.getUser());
        return usr[0];
    }

    getLastName() {
        var usr= JSON.parse(AppStorage.getUser());
        return usr[1];
    }

    deleteAcc(data) {
        if(Validations.deleteAccountVal(data) === true) {
            axios.get('/api/user', {
                headers: {
                    Authorization: 'Bearer '+ JSON.parse(AppStorage.getToken()) 
                }
            }).then((res) => {
                axios.delete('api/settings/user/'+ res.data.id + '/delete', {
                    headers: {
                        Authorization: 'Bearer '+ JSON.parse(AppStorage.getToken())
                    }
                }).then((res) => {
                    if(res.status === 201) {
                        AppStorage.clear();
                        store.commit('logoutUser');
                        router.push({name: 'index'});
                    }
                }).catch((err) => {
                    alert(err);
                })
            }).catch((err) => {
                alert(err);
            });
        }
        else {
            alert('Please enter your name correctly!');
        }
    }

    changePassword(data) {
        axios.get('api/user', {
            headers: {
                Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken()),
            }
        }).then((res) => {
            axios({
                method: 'put',
                url: 'api/settings/user/' + res.data.id + '/changePassword',
                headers: {
                    Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
                },
                data
            }).then((res) => {
                alert('Password changed Successfully!');
            }).catch((err) => {
                alert(err);
            });
        }).catch((err) => {
            alert(err);
        });
    }
}

export default User= new User();