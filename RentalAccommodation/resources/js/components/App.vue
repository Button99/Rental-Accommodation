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
    import AppStorage from '../helpers/AppStorage';

    export default {
        components: {navbar, footerbar},

        mounted() {

        },

        created() {
            if(AppStorage.tokenExists()) {
                axios.get('api/user', {
                    headers: {
                        Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
                    }
                }).then(res => {
                    this.$store.commit('loginUser');
                }).catch(err => {
                    if(err.response.status === 401 || err.response.status === 403) {
                        console.log(JSON.parse(AppStorage.getToken()));
                        this.$store.commit('logoutUser');
                        router.push({name: 'login'});
                    }
                });
            }
        }
    }
</script>