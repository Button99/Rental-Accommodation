<template>
    <div class="container">
        <p>Logged out successfully!</p>
    </div>
</template>

<script>
    export default {
        
        mounted () {
            this.$store.commit('logoutUser');
            this.$router.push({name: 'login'});
        }
    }
</script>
