class AppStorage {
    storeToken(token) {
        console.log(token);
        localStorage.setItem('token', token);
    }

    storeUser(user) {
        localStorage.setItem('user', user);
    }

    getToken() {
        return localStorage.getItem('token')
    }

    getUser() {
        return localStorage.getItem('user');
    }

    store(token, user) {
        this.storeToken(token);
        this.storeUser(user);
    }

    clear() {
        localStorage.removeItem('token');
        localStorage.removeItem('user');
    }
}

export default AppStorage= new AppStorage();