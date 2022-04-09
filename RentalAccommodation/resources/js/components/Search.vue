<template>
    <div class="search-layout">
        <div class="container-fluid w-30 p-3 h-75">
            <div class="row d-flex justify-content-center align-items-center">
                <b-card header="Search" class="m-4 shadow-3-strong">
                    <b-card-body class="text-left h-75 m-5">
                        <b-form action="#" @submit.prevent="search()" method="GET">
                            <b-form-group label="Location: " label-for="location" class="md-4">
                                <b-form-input id="location" v-model="form.location" type="text" />
                            </b-form-group>
                            <b-form-group label="Check in:" label-for="checkIn" class="md-4">
                                <b-form-input id="checkIn" v-model="form.checkIn" type="date" />
                            </b-form-group>
                            <b-form-group label="Check out: " label-for="checkOut" class="md-4">
                                <b-form-input id="checkOut" v-model="form.checkOut" type="date" />
                            </b-form-group>
                            <b-form-group label="Rooms: " label-for="rooms" class="md-4">
                                <b-form-input id="rooms" v-model="form.rooms" type="number" />
                            </b-form-group>
                            <b-form-group >
                                <b-button type="submit" variant="submit btn btn-primary text-uppercase fw-bold">Search </b-button>
                            </b-form-group>
                        </b-form>
                    </b-card-body>
                </b-card>
            </div>
        </div>

    </div>
</template>

<script>
import Accommodation from '../helpers/Accommodation'
    export default {
        data() {
            return {
                form: {
                    location: '',
                    checkIn: '',
                    checkOut: '',
                    rooms: ''
                },
                errors: []
            }
        },

        methods: {
            search() {
                axios.get('api/search/accommodations',  {params: {keywords: this.form } })
                    .then((res) => {
                        this.$router.replace({name: 'resultsPage', query: {keywords: JSON.stringify(this.form)}, params: {data: '123'}}).catch(err => {});
                }).catch((err) => {
                    alert(err);
                });
            }
        }
    }
</script>