<template>
    <div class="login-layout">
        <div class="container p-5">
            <div class="row d-flex justify-content-center align-items-center m-5">
                <b-card shadow-3-strong m-4>
                    <h3 class="card-header d-flex border-0 color-light"> Log in</h3>
                    <div class="card-body text-center m-5">
                        <form action="#" @submit.prevent="loginUser()" method="POST">
                            <div class="form-outline mb-4">
                                <label for="email" class="form-label">
                                    Email:
                                </label>
                                <br />
                                <input type="text" name="email" v-model="form.email" id="email" class="form-control" />
                                <br />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="password" class="form-label">
                                    Password:
                                </label>
                                <br />
                                <input type="password" name="password" v-model="form.password" id="password" class="form-control" />
                                <br />
                            </div>

                            <div class="form-outline mb-4">
                                <a href="#"> Forgot password? </a>
                                <br />
                                <a href="#"> Create account </a>
                            </div>
                            <div class="mb-6">
                                <button type="submit" class="submit btn btn-primary text-uppercase fw-bold">Login</button>
                            </div>
                        </form>
                    </div>
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
