<template>
    <div id="container">
        <navbar></navbar>
        <router-view></router-view>
    </div>
</template>

<style lang="sass">
    @import 'resources/sass/app.scss'
</style>

<script>
    import navbar from './Navbar.vue';

    export default {
        components: {navbar}
    }
</script>