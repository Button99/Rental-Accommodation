<template>
    <div class="login-layout">
        <div class="container p-5">
            <div class="row d-flex justify-content-center align-items-center m-5">
                <b-card class="shadow-3-strong m-4 color-light" header-class="h3" header="Register">
                    <b-card-body class=" text-center m-5">
                        <b-form action="#" @submit.prevent="signup()" method="POST">
                            <b-form-group label="First name: " label-for="first_name" class="mb-4">
                                <b-form-input id="first_name" v-model="form.first_name" type="text" placeholder="First name" required />
                            </b-form-group>
                            <b-form-group label="Last name: " label-for="last_name" class="mb-4">
                                <b-form-input id="last_name" v-model="form.last_name" type="text" placeholder="Last name" required />
                            </b-form-group>
                            <b-form-group label="Date of Birth: " label-for="date" class="md-4">
                                <b-form-input id="date" v-model="form.date_of_birth" type="date" required />
                            </b-form-group>
                            <b-form-group label="Password: " label-for="password" class="md-4">
                                <b-form-input id="password" v-model="form.password" type="password" required />
                            </b-form-group>
                            <b-form-group label="Confirm password: " label-for="confirmPassword" class="md-4">
                                <b-form-input id="confirmPassword" v-model="form.confirmPassword" type="password" required />
                            </b-form-group>
                            <b-form-group label="Email: " label-for="email" class="md-4">
                                <b-form-input id="email" v-model="form.email" type="text" required />
                            </b-form-group>
                            <b-form-group label="Phone: " label-for="phone" class="md-4">
                                <b-form-input id="phone" v-model="form.phone" type="text" required />
                            </b-form-group>
                            <b-form-group label="Gender" label-for="gender" class="md-4">
                                <b-form-select v-model="form.gender" id="gender" name="gender">
                                    <b-form-select-option value="Male">Male</b-form-select-option>
                                    <b-form-select-option value="Female">Female</b-form-select-option>
                                    <b-form-select-option value="Non binary">Non binary</b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="md-4">
                                <b-form-checkbox id="accept_rules" v-model="form.accept" value="true" unchecked-value="false" >Accept with the rules</b-form-checkbox>
                            </b-form-group>
                            <div class="mb-6">
                                <button type="submit" class="submit btn btn-primary text-uppercase fw-bold">Login</button>
                            </div>
                        </b-form>
                    </b-card-body>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                form: {
                    first_name: '',
                    last_name: '',
                    date_of_birth: '',
                    password: '',
                    confirmPassword: '',
                    phone: '',
                    gender: '',
                    email: '',
                    password: '',
                    accept: '',
                },
                errors: []
            }
        },

        methods: {
            signup() {
                User.signup(this.form);
            }
        }
    }
</script>
