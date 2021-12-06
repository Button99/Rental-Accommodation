<template>
    <div class="login-layout">
        <div class="container p-5">
            <div class="row d-flex justify-content-center align-items-center m-5">
                <div class="card shadow-3-strong m-4">
                    <h3 class="card-header d-flex border-0 color-light"> Log in</h3>
                    <div class="card-body text-center m-5">
                        <form action="#" @submit.prevent="register()" method="POST">
                            <div class="form-outline mb-1">
                                <label for="firstName" class="form-label">
                                    First name:
                                </label>
                                <br />
                                <input type="text" name="firstName" v-model="form.firstName" id="firstName" class="form-control" />
                                <br />
                            </div>
                            <div class="form-outline mb-1">
                                <label for="lastName" class="form-label">
                                    Last name:
                                </label>
                                <br />
                                <input type="text" name="lastName" v-model="form.lastName" id="lastName" class="form-control" />
                                <br />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="dateOfBirth" class="form-label">
                                    Date of birth:
                                </label>
                                <br />
                                <input type="text" name="dateOfBirth" v-model="form.dateOfBirth" id="dateOfBirth" class="form-control" />
                                <br />
                            </div>
                            <div class="form-outline mb-4">
                                <label for="password" class="form-label">
                                    Password:
                                </label>
                                <br />
                                <input type="text" name="password" v-model="form.password" id="password" class="form-control" />
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
                                    Male:
                                </label>
                                <input type="checkbox" name="male" v-model="form.gender" id="gender" class="form-check-input" value='1'/>
                            </div>
                            <div class="form-check form-check-inline">
                                <label for="female" class="form-check-label">
                                    female:
                                </label>
                                <input type="checkbox" name="female" v-model="form.gender" id="gender" class="form-check-input"  value='1'/>
                            </div>
                            <div class="form-check form-check-inline">
                                <label for="nonBinary" class="form-check-label">
                                    Non Binary:
                                </label>
                                <br />
                                <input type="checkbox" name="nonBinary" v-model="form.gender" id="nonBinary" class="form-check-input"  value='1'/>
                                <br />
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
                    firstName: '',
                    lastName: '',
                    dateOfBirth: '',
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

        }
    }
</script>
