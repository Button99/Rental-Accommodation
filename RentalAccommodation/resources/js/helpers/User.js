import axios from 'axios';
import {router, store} from '../app';
import AppStorage from './AppStorage';

class User {
    loginUser(data) {
        axios.get('/sanctum/csrf-cookie')
            .then((res) => {
                axios.post('api/login', data)
                    .then((res) => {
                        if(res.status === 202) {
                            store.commit('loginUser');
                            const accessToken= res.data.token;
                            const usr_name= res.data.first_name;
                            const usr_last= res.data.last_name;
                            AppStorage.store([usr_name, usr_last], JSON.stringify(accessToken));
                            this.setId();
                            router.push({name: 'dashboard'});                            
                        }
                    }).catch((err) => {
                        if(err) {
                            alert(err);
                        }
                    });
            }).catch((err) => {
                alert(err);
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

    setId() {
        axios.get('api/user', {
            headers: {
                Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken()) 
            }
        }).then((res) => {
            AppStorage.storeId(res.data.id);
        }).catch((err) => {
            alert(err);
        });
    }

    getId() {
        return AppStorage.getId();
    }

    deleteAcc(data) {
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

    verifyUser(vkey) {
        axios.get('api/verifyEmail/vkey/' + vkey)
            .then((res) => {
            }).catch((err) => {
                alert(err);
        });
    }
    
    forgotPassword(data) {
        axios.post('api/forgotPassword', data)
            .then((res) => {
            }).catch((err) => {
                console.log(err);
            });
    }

    resetPsw(data) {
        axios.post('api/resetPsw', data) 
            .then((res) => {
                router.push({name: 'login'});
            }).catch((err) => {
                console.log(err);
            });
    }

    addComment(comment, accommodationId) {
        axios({
            method: 'post',
            url: 'api/accommodations/createComment',
            headers: {
                Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
            },
            // Need to see how the data are passing to db
            data: {comment, accommodationId}
        }).then((res) => {
            router.go();
        }).catch((err) => {
            alert(err);
        });
    }
}

export default User= new User();