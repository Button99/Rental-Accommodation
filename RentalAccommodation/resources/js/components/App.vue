<template>
    <div id="container">
        <navbar></navbar> 
        <router-view></router-view>
        <footerbar></footerbar>
    </div>
</template>

<style lang="sass">
    @import 'resources/sass/app.scss'
</style>

<script>
    import navbar from './Navbar.vue';
    import footerbar from './Footer.vue';

    export default {
        components: {navbar, footerbar},

        mounted() {

        },

        created() {
            if(localStorage.token) {
                axios.get('api/user', {
                    headers: {
                        Authorization: 'Bearer' + localStorage.setItem('token')
                    }
                }).then(res => {
                    store.commit('loginUser');
                }).catch(err => {
                    if(err.response.status === 401 || err.response.status === 403) {
                        store.commit('logoutUser');
                        localStorage.setItem('token', '');
                        router.push({name: 'login'});
                    }
                });
            }
        }
    }
</script>