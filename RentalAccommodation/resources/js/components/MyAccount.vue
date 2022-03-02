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
                    <b-list-group-item> Phone: <b>{{phone}}</b></b-list-group-item>
                    <b-list-group-item> Email: <b>{{email}}</b></b-list-group-item> <!-- Needs to go to security tab -->
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
                load: '0'
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

