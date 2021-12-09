class User {
    loginUser(data) {
        axios.get('/sanctum/csrf-cookie');

        axios.post('api/login', data)
            .then((res) => {
                if(res.status === 200) {
                    localStorage.setItem('user', JSON.stringify(res.data));
                //    this.$router.push({name: 'dash'})
                    console.log('works');
                }
            }).catch((err) => {
                if(err.res.fail) {
                    alert(err.res.data.errors);
                }
            });
    }
}

export default User= new User();