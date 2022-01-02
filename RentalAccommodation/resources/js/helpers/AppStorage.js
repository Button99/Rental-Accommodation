class AppStorage {

    storeToken(token) {
        localStorage.setItem('token', token);
    }

    storeUser(usr_data) {
        localStorage.setItem('user', JSON.stringify(usr_data));
    }

    getToken() {
        return localStorage.getItem('token')
    }

    getUser() {
        return localStorage.getItem('user');
    }

    tokenExists() {
        if(localStorage.getItem('token') && localStorage.getItem('token') !== undefined) {
            return true;
        }
        return false;
    }

    store(usr_data, token) {
        this.storeToken(token);
        this.storeUser(usr_data);
    }

    clear() {
        window.localStorage.removeItem('token');
        window.localStorage.removeItem('user');
    }
}

export default AppStorage= new AppStorage();