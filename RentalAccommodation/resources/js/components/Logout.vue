<template>
    <div class="container">
        <p>Logged out successfully!</p>
    </div>
</template>

<script>
    import AppStorage from '../helpers/AppStorage';
    import User from '../helpers/User';

    export default {
        
        mounted () {
            User.logout();
            this.$router.push({name: 'index'});
        }

    }
</script>
