<template>
    <div class="login-layout">
        <div class="container p-5">
            <div class="row d-flex justify-content-center align-items-center m-5">
                <b-card class="shadow-3-strong m-4 color-light border-0 d-flex" header-class="h3" header="Login" >
                    <b-card-body class="text-center m-5">
                        <b-form @submit.prevent="loginUser()" @reset="onReset()" action="#" method="POST">
                            <b-form-group label="Email: " label-for="email" class="mb-4 ">
                                <b-form-input id="email" v-model="form.email" type="email" placeholder="Enter email" required> </b-form-input>
                            </b-form-group>

                            <b-form-group label="Password: " label-for="password" class="mb-4">
                                <b-form-input id="password" v-model="form.password" type="password" placeholder="Enter password" required></b-form-input>
                            </b-form-group>

                            <b-form-group class="mb-4">
                                <router-link to="#">Forgot password? </router-link>
                                <br />
                                <router-link to="#">Create account </router-link>
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

        methods: {
            loginUser() {
                User.loginUser(this.form);
            }
        }
    }
</script>
