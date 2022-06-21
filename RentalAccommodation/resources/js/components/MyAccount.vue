<template v-if="load === '1'">
    <div class="my-account-layout">
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
                <h1>General Account Settings</h1>
                <br />
                <b-list-group>
                    <b-list-group-item> Name: <b>{{first_name}}  {{last_name}}</b></b-list-group-item>
                    <b-list-group-item> Phone: <b>{{phone}}</b><b-collapse id="collapse-changePhone" @hide="isVisible = false" @show="isVisible = true" v-model="visible">
                            <b-card title="Change Phone">
                                <br />
                                <b-form @submit.prevent="#" @reset="onReset()" action="#" method="POST">
                                    <b-form-group label="New password: " label-for="new-password" class="mb-4">
                                        <b-form-input id="old-password" v-model="form.phone" type="text" required> </b-form-input>
                                    </b-form-group>
                            </b-card>
                        </b-collapse>
                    </b-list-group-item>
                    <b-list-group-item> Email: <b>{{email}}</b></b-list-group-item>
                    <b-list-group-item> Gender: <b>{{gender}}</b></b-list-group-item>
                </b-list-group>
                <br />
            </div>
        </section>
    </div>
</template>
<script>
    import AppStorage from '../helpers/AppStorage';

    export default {
        data() {
            return {
                first_name: User.getName(),
                last_name: User.getLastName(),
                phone: '',
                email: '',
                gender: '',
                load: '0',
                isVisible: false 
            }
        },

        created() {
            this.fetchData();
        },

        methods: {
            fetchData() {
                axios.get('/api/user', {
                    headers: {
                        Authorization: 'Bearer '+ JSON.parse(AppStorage.getToken())
                    }
                }).then((res) => {
                    this.last_name= res.data.last_name;
                    this.phone=res.data.phone;
                    this.email= res.data.email;
                    this.gender= res.data.gender;
                    this.load= '1';
                });
            }
        }
    }
</script>

