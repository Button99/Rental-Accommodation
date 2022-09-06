<template>
    <div class="login-layout">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center m-5">
                <b-card class="shadow-3-strong m-4" header-class="h3" header="Register">
                    <b-card-body class="text-center fixed-height">
                        <b-form action="#" @submit.prevent="signup()" method="POST">
                            <b-form-group label="First name: " label-for="first_name" class="md-4">
                                <div v-if="!$v.form.first_name.required" class="text-danger">First name is required</div>
                                <div v-if="!$v.form.first_name.minLength" class="text-danger">Needs to be over than 2characters</div>
                                <div v-if="!$v.form.first_name.maxLength" class="text-danger">Needs to be lower than 40</div>
                                <div v-if="!$v.form.first_name.alpha" class="text-danger">Only alphabetic characters</div>
                                <b-form-input id="first_name" v-model="form.first_name" type="text" placeholder="First name" required/>
                            </b-form-group>
                            <b-form-group label="Last name: " label-for="last_name" class="md-4">
                                <div v-if="!$v.form.last_name.required" class="text-danger">Last name is required</div>
                                <div v-if="!$v.form.last_name.minLength" class="text-danger">Needs to be over than 2characters</div>
                                <div v-if="!$v.form.last_name.maxLength" class="text-danger">Needs to be lower than 40</div>
                                <div v-if="!$v.form.last_name.alpha" class="text-danger">Only alphabetic characters</div>
                                <b-form-input id="last_name" v-model="form.last_name" type="text" placeholder="Last name" required />
                            </b-form-group>
                            <b-form-group label="Date of Birth: " label-for="date" class="md-4">
                                <div v-if="!$v.form.date_of_birth.required" class="text-danger">Date of birth is required</div>
                                <div v-if="form.date_of_birth">
                                    <div v-if="!$v.form.date_of_birth.minValue" class="text-danger">Invalid date</div>
                                    <div v-if="!$v.form.date_of_birth.maxValue" class="text-danger">Invalid date</div>
                                </div>
                                <b-form-input id="date" v-model="form.date_of_birth" type="date" required />
                            </b-form-group>
                            <b-form-group label="Password: " label-for="password" class="md-4">
                                <div v-if="!$v.form.password.required" class="text-danger">Password is required</div>
                                <div v-if="!$v.form.password.minLength" class="text-danger">Needs to be over 8 characters</div>
                                <b-form-input id="password" v-model="form.password" type="password" placeholder="Password" required />
                            </b-form-group>
                            <b-form-group label="Confirm password: " label-for="confirmPassword" class="md-4">
                                <div v-if="!$v.form.confirmPassword.required" class="text-danger">Password is required</div>
                                <div v-if="!$v.form.confirmPassword.sameAsPassword" class="text-danger">Needs to be the same as the above field</div>
                                <b-form-input id="confirmPassword" v-model="form.confirmPassword" type="password" placeholder="Confirm password" required />
                            </b-form-group>
                            <b-form-group label="Email: " label-for="email" class="md-4">
                                <div v-if="!$v.form.email.required" class="text-danger">Email is required</div>
                                <div v-if="!$v.form.email.email" class="text-danger">Invalid email type</div>
                                <b-form-input id="email" v-model="form.email" type="email" placeholder="Email" required />
                            </b-form-group>
                            <b-form-group label="Phone: " label-for="phone" class="md-4">
                                <div v-if="!$v.form.phone.required" class="text-danger">Phone is required</div>
                                <div v-if="!$v.form.phone.numeric" class="text-danger">Only numerics</div>
                                <b-form-input id="phone" v-model="form.phone" type="text" placeholder="Phone" required />
                            </b-form-group>
                            <b-form-group label="Gender" label-for="gender" class="md-4">
                                <div v-if="!$v.form.gender.required" class="text-danger">Gender is required</div>
                                <div v-if="!$v.form.gender.alpha" class="text-danger">Needs to be numeric</div>
                                <b-form-select v-model="form.gender" id="gender" name="gender">
                                    <b-form-select-option value="Male">Male</b-form-select-option>
                                    <b-form-select-option value="Female">Female</b-form-select-option>
                                    <b-form-select-option value="Non binary">Non binary</b-form-select-option>
                                </b-form-select>
                            </b-form-group>
                            <b-form-group class="md-4">
                                <div v-if="!$v.form.accept.required" class="text-danger">Agree with the rules</div>
                                <b-form-checkbox id="accept_rules" v-model="form.accept" value="true" unchecked-value="false" >Accept with the rules</b-form-checkbox>
                            </b-form-group>
                            <div class="mb-6">
                                <b-button type="submit" variant="submit btn btn-primary text-uppercase fw-bold">Register</b-button>
                            </div>
                        </b-form>
                    </b-card-body>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    import {required, minLength, email, maxLength, alpha, sameAs, numeric} from 'vuelidate/lib/validators';

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
                    accept: '',
                },
                errors: []
            }
        },

        validations: {
            form: {
                first_name: {
                    required,
                    minLength: minLength(2),
                    maxLength: maxLength(40),
                    alpha
                },
                last_name: {
                    required,
                    minLength: minLength(2),
                    maxLength: maxLength(40),
                    alpha
                },
                date_of_birth: {
                    required,
                    maxValue(date_of_birth) {
                        return new Date('01/01/2003').getFullYear() > new Date(date_of_birth).getFullYear();
                    },
                    minValue(date_of_birth) {
                        return new Date('01/01/1950').getFullYear() < new Date(date_of_birth).getFullYear();
                    }
                },
                password: {
                    required,
                    minLength: minLength(8)
                },
                confirmPassword: {
                    required,
                    sameAsPassword: sameAs('password')
                },
                phone: {
                    required,
                    numeric
                },
                gender: {
                    required,
                    alpha
                },
                email: {
                    required,
                    email
                },
                accept: {
                    required,
                    sameAs: sameAs(() => true)
                }
            }
        },

        methods: {
            signup() {
                User.signup(this.form);
            }
        }
    }
</script>
