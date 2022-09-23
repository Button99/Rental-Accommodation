class AppStorage {

    storeToken(token) {
        localStorage.setItem('token', token);
    }

    storeUser(usr_data) {
        localStorage.setItem('user', JSON.stringify(usr_data));
    }

    storeId(usr_id) {
        localStorage.setItem('user_id', JSON.stringify(usr_id));
    }

    getToken() {
        return localStorage.getItem('token')
    }

    getUser() {
        return localStorage.getItem('user');
    }

    getId() {
        return localStorage.getItem('user_id');
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
        window.localStorage.removeItem('user_id');
    }
}

export default AppStorage= new AppStorage();