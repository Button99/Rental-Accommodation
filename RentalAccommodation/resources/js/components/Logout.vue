<template>
    <div class="container">
        <p>Logged out successfully!</p>
    </div>
</template>

<script>
import AppStorage from '../helpers/AppStorage';
    export default {
        
        mounted () {
            AppStorage.clear();
            this.$store.commit('logoutUser')
            this.$router.push({name: 'index'});
        }
    }
</script>
