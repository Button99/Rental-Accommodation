<template>
    <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top navbar-inverse" style=" background-image: linear-gradient(to right, #D4B8E9, #BD81BF);">
        <router-link class="navbar-brand" to="/">Rental Accommodations</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <router-link to="/" class="nav-link">Home <span class="sr-only">(current)</span></router-link>
                </li>
                <li class="nav-item active">
                    <router-link class="nav-link" to="/accommodations">Accommodations</router-link>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right" v-if="!this.user">
                <li class="nav-item active">
                    <router-link to="/login" class="nav-link">Log in</router-link>
                </li>
                <li class="nav-item active">
                    <router-link to="/register" class="nav-link">Create account</router-link>
                </li>
            </ul>
            <ul class="navbar-nav navbar-right" v-else>
                <li class="nav-item active">
                    <router-link to="/#" class="nav-link">My Accommodations</router-link>
                </li>
                <li class="nav-item active">
                    <router-link to="/#" class="nav-link">My Account</router-link>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    
    export default {
        mounted() {
            console.log(this.$user);
        }
    }
</script>