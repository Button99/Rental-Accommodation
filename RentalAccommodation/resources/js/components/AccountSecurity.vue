<template>
    <div class="security-and-login-layout">
        <section class="settings-menu">
            <b-list-group >
                <h2>Settings</h2>
                <br />
                <b-list-group-item to="/myAccount/general"> General </b-list-group-item>
                <b-list-group-item to="/myAccount/security"> Security and Login </b-list-group-item>
                <b-list-group-item to="/myAccount/deleteAccount"> Delete Account </b-list-group-item>
            </b-list-group>
        </section>
        <section class="settings-options">
            <div class="container mx-auto mt-4">
                <h1>Security and Login</h1>
                <br />
                <b-list-group>
                    <b-list-group-item><b-button v-b-toggle.collapse-changePassword block class="d-flex"><strong>Change password</strong>
                        <strong v-if="isVisible == true" aria-hidden="true" class="ml-auto">-</strong>
                        <strong v-else aria-hidden="true" class="ml-auto">+</strong>
                        </b-button>
                        <b-collapse id="collapse-changePassword" @hide="isVisible = false" @show="isVisible = true" v-model="visible">
                            <b-card title="Change Password">
                                <br />
                                <b-form @submit.prevent="changePassword()" @reset="onReset()" action="#" method="POST">
                                    <b-form-group label="Old password: " label-for="old-password" class="mb-4">
                                        <b-form-input id="old-password" v-model="form.old_password" type="password" required> </b-form-input>
                                    </b-form-group>
                                    <b-form-group label="New password: " label-for="new-password" class="mb-4">
                                        <b-form-input id="new-password" v-model="form.new_password" type="password" required> </b-form-input>
                                    </b-form-group>
                                    <b-form-group label-for="new-password-retype" label="New password (Retype): ">
                                        <b-form-input id="new-password-retype" v-model="form.new_passwordRetype" type="password" required> </b-form-input>
                                    </b-form-group>
                                    <b-button type="submit">Change Password</b-button>
                                </b-form>
                            </b-card>
                        </b-collapse>
                    </b-list-group-item>
                    <b-list-group-item> Last Log in: <strong>{{data.ip}}</strong></b-list-group-item>
                <br />
                </b-list-group>
            </div>
        </section>
    </div>
</template>

<script>
import AppStorage from '../helpers/AppStorage';
    import Validate from '../helpers/Validations';
    export default {
        data() {
            return {
                isVisible: false,
                success: false,

                form: {
                    old_password: '',
                    new_password: '',
                    new_passwordRetype: ''
                },
                
                data: {
                    ip: ''
                }
            }
        },

        created() {
            this.getLastIp();
        },

        methods: {

            changePassword() {
                if(Validate.changePasswordVal(this.form) === true) {
                    User.changePassword(this.form);
                }
            },

            getLastIp() {
                axios.get('api/user', {
                    headers: {
                        Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
                    }
                }).then((res) => {
                    console.log(res);
                    console.log(res.data.last_ip);
                    this.data.ip= res.data.last_ip;
                });
            }
        }
    }
</script>

