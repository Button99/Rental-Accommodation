<template>
    <b-nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top navbar-inverse" style=" background-image: linear-gradient(to right, #D4B8E9, #BD81BF);">
        <b-navbar-brand to="/" active>Rental Accommodation</b-navbar-brand>
        <b-navbar-toggle target="navbarSupportedContent"></b-navbar-toggle>

        <b-collapse id="navbarSupportedContent" is-nav>
            <b-navbar-nav class="mr-auto">
                <b-nav-item active to="/">
                    Home
                </b-nav-item>
                <b-nav-item to="/dashboard" active v-if="this.$store.state.isLoggedIn === true">
                    Dashboard
                </b-nav-item>
                <b-nav-item to="/accommodations" active>
                    Accommodations
                </b-nav-item>
                <b-nav-item to="/search" active>
                    Search
                </b-nav-item>
            </b-navbar-nav>
            <b-navbar-nav v-if="this.$store.state.isLoggedIn === false ">
                    <b-nav-item to="/login" active>
                        Log in
                    </b-nav-item>
                    <b-nav-item to="/register" active>
                        Create account
                    </b-nav-item>
            </b-navbar-nav>
            <b-navbar-nav v-else>
                <b-nav-item to="/myAccommodations" active>
                    My Accommodations
                </b-nav-item>

                <b-nav-item-dropdown text="Account Settings" >
                    <b-dropdown-item to="/myAccount/general">My account</b-dropdown-item>
                    <b-dropdown-item to="/logout">Logout</b-dropdown-item>
                </b-nav-item-dropdown>
            </b-navbar-nav>
        </b-collapse>
    </b-nav>
</template>

<script>
    export default {
        mounted() {
            
        }
    }
</script>