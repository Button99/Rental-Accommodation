<template>
    <div class="login-layout">
        <div class="container p-5">
            <div class="row d-flex justify-content-center align-items-center m-5">
                <b-card class="shadow-3-strong m-4 color-light border-0 d-flex" header-class="h3" header="Login" >
                    <b-card-body class="text-center m-5">
                        <b-form @submit.prevent="loginUser()" @reset="onReset()" action="#" method="POST">
                            <b-form-group label="Email: " label-for="email" class="mb-4 ">
                                <div v-if="!$v.form.email.required" class="text-danger">Email is required</div>
                                <div v-if="!$v.form.email.email" class="text-danger">Not valid email type</div>
                                <b-form-input id="email" v-model="form.email" type="email" placeholder="Enter email" required> </b-form-input>
                            </b-form-group>

                            <b-form-group label="Password: " label-for="password" class="mb-4">
                                <div v-if="!$v.form.password.required" class="text-danger">Password is required</div>
                                <div v-if="!$v.form.password.minLength" class="text-danger">Password must be over 8 characters</div>
                                <b-form-input id="password" v-model="form.password" type="password" placeholder="Enter password" required></b-form-input>
                            </b-form-group>

                            <b-form-group class="mb-4">
                                <router-link to="/forgotPassword">Forgot password? </router-link>
                                <br />
                                <router-link to="/register">Create account </router-link>
                            </b-form-group>

                            <b-button type="submit" variant="submit btn btn-primary text-uppercase fw-bold">Login</b-button>
                        </b-form>
                    </b-card-body>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    import {required, minLength, email} from 'vuelidate/lib/validators';
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: ''
                },
                errors: []
            }
        },

        validations: {
            form: {
                email: {
                    required,
                    email
                },
                password: {
                    required,
                    minLength: minLength(8)
                }
            }
        },

        methods: {
            loginUser() {
                User.loginUser(this.form);
            }
        }
    }
</script>
