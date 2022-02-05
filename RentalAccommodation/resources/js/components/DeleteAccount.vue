<template>
<div class="container">
    <br />
    <h2>Delete account page </h2>
    <!-- To implement this page I need to make a validation:<template>
        User needs to type their first_name so they can confirm the action -->
    <section class="delete-account">
        <p> To delete the account you need to write your First name</p>
        <b-form @submit.prevent="deleteAccount()"  @reset="onReset()" action="#" method="POST">
            <b-form-input type="text" v-model="form.first_name" placeholder="Enter your first name"></b-form-input>
            <br />
            <b-button type="submit" variant="danger">Delete Account </b-button>
        </b-form>
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
