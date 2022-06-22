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
                    <b-list-group-item><b-button v-b-toggle.collapse-changePhone block class="d-flex"><strong>Phone: {{phone}} (click to change)</strong>
                        <strong v-if="isVisible == true" aria-hidden="true" class="ml-auto">-</strong>
                        <strong v-else aria-hidden="true" class="ml-auto">+</strong>
                        </b-button><b-collapse id="collapse-changePhone" @hide="isVisible = false" @show="isVisible = true" v-model="isVisible">
                            <b-card title="Change Phone">
                                <br />
                                <b-form  @submit.prevent="changePhone()" @reset="onReset()" action="#" method="POST">
                                    <b-form-group label="New phone: " label-for="new-phone" class="mb-4">
                                        <b-form-input id="new-phone" v-model="new_phone" type="text" required> </b-form-input>
                                    </b-form-group>
                                    <b-button type="submit">Change Phone number </b-button>

                                </b-form>
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
                id: '',
                first_name: User.getName(),
                last_name: User.getLastName(),
                phone: '',
                new_phone: '',
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
                    this.id= res.data.id;
                    this.last_name= res.data.last_name;
                    this.phone=res.data.phone;
                    this.email= res.data.email;
                    this.gender= res.data.gender;
                    this.load= '1';
                });
            },

            changePhone() {

                axios({
                    method: 'post',
                    url: 'api/settings/user/'+ this.id + '/changePhone',
                    headers: {
                        Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
                    },
                    data: {'phone':  this.new_phone}
                }).then((res) => {
                        this.$router.go();
                }).catch((err) => {
                    alert(err);
                });
        }
        }
    }
</script>

