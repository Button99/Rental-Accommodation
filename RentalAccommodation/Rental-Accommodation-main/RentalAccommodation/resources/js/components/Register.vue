<template>
    <div class="login-layout">
        <div class="container p-5">
            <div class="row d-flex justify-content-center align-items-center m-5">
                <div class="card shadow-3-strong m-4">
                    <h3 class="card-header d-flex border-0 color-light"> Register</h3>
                    <div class="card-body text-center m-5">
                        <form action="#" @submit.prevent="signup()" method="POST">
                            <div class="form-outline mb-1">
                                <label for="first_name" class="form-label">
                                    First name:
                                </label>
                                <br />
                                <input type="text" name="first_name" v-model="form.first_name" id="first_name" class="form-control" />
                                <br />
                            </div>
                            <div class="form-outline mb-1">
                                <label for="last_name" class="form-label">
                                    Last name:
                                </label>
                                <br />
                                <input type="text" name="last_name" v-model="form.last_name" id="last_name" class="form-control" />
                                <br />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="date_of_birth" class="form-label">
                                    Date of birth:
                                </label>
                                <br />
                                <input type="date" name="date_of_birth" v-model="form.date_of_birth" id="date_of_birth" class="form-control" />
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
                                <label for="confirmPassword" class="form-label">
                                    Confirm password:
                                </label>
                                <br />
                                <input type="password" name="confirmPassword" v-model="form.confirmPassword" id="confirmPassword" class="form-control" />
                                <br />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="email" class="form-label">
                                    Email:
                                </label>
                                <br />
                                <input type="text" name="email" v-model="form.email" id="email" class="form-control" />
                                <br />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="phone" class="form-label">
                                    Phone:
                                </label>
                                <br />
                                <input type="text" name="phone" v-model="form.phone" id="phone" class="form-control" />
                                <br />
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <label for="male" class="form-check-label">
                                    Gender:
                                </label>
                                <select name="gender" v-model="form.gender" id="gender" class="form-check-input">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Non binary">Non binary</option>
                                </select>
                            </div>
                            <div class="mb-6">
                                <button type="submit" class="submit btn btn-primary text-uppercase fw-bold">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
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
                    password: ''
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
