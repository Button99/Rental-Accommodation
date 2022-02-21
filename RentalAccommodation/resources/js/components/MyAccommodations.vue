<template>
    <div class="container">
        <h1>My Accommodations Page</h1>
        <!-- here should i implement a if -->
        <section class="my-accommodations">
            <h1> {{test}} </h1>
            <ul class="justify-content-center">
                <div class="col-md-7">
                <!-- here i should implement a for !-->
                    <li v-for="accommodation in accommodations" class="p-3 col-md-4 mt-5">
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
                    </li>
                </div>
            </ul>
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