<template>
<div class="delete-account-layout">
    <section class="settings-menu">
        <b-list-group >
            <h2>Settings</h2>
            <br />
            <b-list-group-item to="/myAccount/general"> General </b-list-group-item>
            <b-list-group-item to="/myAccount/security"> Security and Login </b-list-group-item>
            <b-list-group-item to="/myAccount/deleteAccount"> Delete Account </b-list-group-item>
        </b-list-group>
    </section>

    <!-- To implement this page I need to make a validation:<template>
        User needs to type their first_name so they can confirm the action -->
    <section class="delete-account">
        <div class="container mx-auto mt-4">
            <h3> To delete the account you need to write your First name</h3>
            <br />
            <b-form @submit.prevent="deleteAccount()"  @reset="onReset()" action="#" method="POST">
                <b-form-input type="text" v-model="form.first_name" placeholder="Enter your first name"></b-form-input>
                <br />
                <b-button type="submit" variant="danger">Delete Account </b-button>
            </b-form>
        </div>
    </section>
</div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    first_name: ''
                }
            }
        },

        methods: {
            deleteAccount() {

                User.deleteAcc(this.form);
            }
        }
    }
</script>
