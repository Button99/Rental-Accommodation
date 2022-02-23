<template>
    <div class="container">
        <h1>My Accommodations Page</h1>
        <section class="my-accommodations" v-if="accommodations.length > 0">
            <ul class="justify-content-center">
                <div class="col-md-7">
                    <li v-for="accommodation in accommodations" class="p-3 col-md-4 mt-5">
                        <router-link :to="{ name: 'accommodation', params: {id: accommodation.id}}">
                            <div class="card">
                                <img src="pictures/pexels-alex-azabache-3879160.jpg" style=" height: 30vh;" class="card-img-top" />
                                <div class="card-body">
                                    <h5 class="card-title">{{accommodation.name}}</h5>
                                    <p class="card-text">
                                        Rooms: {{accommodation.rooms}} <br />
                                        Town: {{accommodation.town}} <br />
                                        Description: {{accommodation.description}} <br />
                                    </p>
                                </div>
                            </div>
                        </router-link>
                    </li>
                </div>
            </ul>
        </section>
        <section class="my-accommodations-layout"  v-else>
            <h4>You do not have create any accommodation </h4>
            <router-link to="/createAccommodation" class="btn btn-primary">Create accommodation</router-link>
            <br />
        </section>
    </div>
</template>

<script>
import AppStorage from '../helpers/AppStorage';

    export default {
        data() {
            return {
                accommodations: []
            }
        },
    
    created() {
        this.fetchData();
    },

    methods: {
        fetchData() {
            axios.get('api/user', {
                headers: {
                    Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
                }
                }).then((res) => {
                    axios.get('api/'+ res.data.id + '/myAccommodations', {
                        headers: {
                            Authorization: 'Bearer ' + JSON.parse(AppStorage.getToken())
                        }
                    }).then((res) => {
                        this.accommodations= res.data;
                    }).catch((err) => {
                        alert(err);
                    })
                }).catch((err) => {
                    alert(err);
                });
            }
        }
    }
</script>