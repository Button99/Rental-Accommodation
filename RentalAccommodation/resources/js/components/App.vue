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
        components: {navbar, footerbar}
    }
</script>