<template>
<div class="my-account-layout">
    <section class="settings-menu">
        <b-list-group >
            <h2>Settings</h2>
            <br />
            <b-list-group-item to="/myAccount/general"> General </b-list-group-item>
            <b-list-group-item to="/myAccount/security"> Security and Login </b-list-group-item>
            <b-list-group-item to="/myAccount/deleteAccount"> Delete Account </b-list-group-item>
        </b-list-group>
    </section>
    <section class="settings-options">
        <div class="container mx-auto mt-4">
            <h1>General Account Settings</h1>
            <br />
            <b-list-group>
                <b-list-group-item> Name: </b-list-group-item>
                <b-list-group-item> Phone: </b-list-group-item>
                <b-list-group-item> Email: </b-list-group-item> <!-- Needs to go to security tab -->
                <b-list-group-item> Gender: </b-list-group-item>
                <b-list-group-item> Goverment ID: </b-list-group-item>
            </b-list-group>
            <br />
        </div>
    </section>
</div>
</template>

<script>
    export default {
        data() {
            return {       
            }
        }
    }
</script>

