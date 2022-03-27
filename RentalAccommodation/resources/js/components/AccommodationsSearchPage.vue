<template>
    <div class="container">
        <h1>These are the free accommodations you can find!</h1>
        <section class="my-accommodations" v-if="accommodations.length > 0">
            <ul class="justify-content-center">
                <div class="col-md-7">
                    <li v-for="accommodation in accommodations" class="p-3 col-md-4 mt-5">
                        <router-link :to="{ name: 'accommodation', params: {id: accommodation.id}}">
                            <div class="card">
                                <img :src="picture[0].path" v-for="picture in pictures" v-if="accommodation.id == picture[0].accommodation_id" style=" height: 30vh;" class="card-img-top" />
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
        <section class="my-accommodations-layout"  v-else-if="show == true">
            <h4>You do not have create any accommodation </h4>
            <router-link to="/createAccommodation" class="btn btn-primary">Create accommodation</router-link>
            <br />
        </section>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                accommodations: [],
                pictures: [],
                show: false
            }
        },
    
    created() {
        this.fetchData();
    },

    methods: {
        fetchData() {
            
            }
        }
    }
</script>