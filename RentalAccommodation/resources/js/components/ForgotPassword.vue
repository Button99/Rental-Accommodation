<template>
    <div class="login-layout">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center m-5">
                <b-card class="shadow-3-strong m-4 color-light border-0 d-flex" header-class="h3" header="Forgot Password" >
                    <b-card-body class="text-center fixed-height">
                        <div v-if="!this.$route.query.key">
                            <b-form @submit.prevent="forgotPassword()" @reset="onReset()" action="#" method="POST">
                                <b-form-group label="Email: " label-for="email" class="mb-4 ">
                                    <div v-if="!$v.form.email.required" class="text-danger">Email is required</div>
                                    <div v-if="!$v.form.email.email" class="text-danger">Not valid email type</div>
                                    <b-form-input id="email" v-model="form.email" type="email" placeholder="Enter your email" required> </b-form-input>
                                </b-form-group>
                                <b-button type="submit" variant="submit btn btn-primary text-uppercase fw-bold">Send Email</b-button>
                            </b-form>
                        </div>
                        <div v-if="this.$route.query.key">
                            <b-form @submit.prevent="resetPassword()" @reset="onReset()" action="#" method="POST">
                                <b-form-group label="Password: " label-for="password" class="mb-4 ">
                                    <div v-if="!$v.form.password.required" class="text-danger">Field is required</div>
                                    <div v-if="!$v.form.password.minLength" class="text-danger">Not valid password type</div>
                                    <b-form-input id="password" v-model="form.password" type="password" placeholder="Enter password" required> </b-form-input>
                                </b-form-group>
                                <b-form-group label="Password Retype: " label-for="password-retype" class="mb-4 ">
                                    <div v-if="!$v.form.passwordRetype.required" class="text-danger">Field is required</div>
                                    <div v-if="!$v.form.passwordRetype.sameAsPassword" class="text-danger">Not valid password type</div>
                                    <b-form-input id="password-retype" v-model="form.passwordRetype" type="password" placeholder="Retype your new password" required> </b-form-input>
                                </b-form-group>
                                <b-button type="submit" variant="submit btn btn-primary text-uppercase fw-bold">Reset Password</b-button>
                            </b-form>
                        </div>
                    </b-card-body>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    import {required, minLength, sameAs, email} from 'vuelidate/lib/validators';
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                    passwordRetype: '',
                    token: this.$route.query.key
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
                },

                passwordRetype: {
                    required,
                    sameAsPassword: sameAs('password')
                },
            }
        },

        methods: {
            forgotPassword() {
                User.forgotPassword(this.form);
            },

            resetPassword() {
                User.resetPsw(this.form);
            }
        }
    }
</script>
