<template>
    <div>
        <h1> Accommodations </h1>
        <br />
        <section class="settings-menu">
            <b-list-group >
                <h2>Filter by</h2>
                <br />
                <h3> Budget (per night)</h3>
                <b-form-group>
                    <b-form-checkbox-group v-model="selected_budget" :options="budget_options" stacked>
                    </b-form-checkbox-group>
                    <br />
                    <h3>Features</h3>
                    <b-form-checkbox-group v-model="selected_features" :options="features_opt" stacked>
                    </b-form-checkbox-group>
                    <br />
                    <h3>Stars</h3>
                    <b-form-checkbox-group v-model="selected_stars" :options="stars_opt" stacked>
                    </b-form-checkbox-group>
                </b-form-group>
            </b-list-group>
        </section>
    
    <div class="container">
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
    </div>
</template>

<script>
    export default {
        data() {
            return {
                accommodations: [],
                pictures: [],
                budget_options: [
                    {text: '0-50', value:'50'},
                    {text: '50-100', value: '100'},
                    {text: '100-150', value: '150'},
                    {text: '150-200', value: '200'},
                    {text: '200+', value: '250'}
                ],
                stars_opt: [
                    {text: '2 Stars', value: '2'},
                    {text: '3 Stars', value: '3'},
                    {text: '4 Stars', value: '4'},
                    {text: '5 Stars', value: '5'}
                ], 
                features_opt: [
                    {text: 'BBQ', value: 'bbq'},
                    {text: 'Wifi', value: 'wifi'},
                    {text: 'Air Conditioning', value: 'air_conditioning'},
                    {text: 'TV', value: 'tv'},
                    {text: 'Parking', value: 'parking'}
                ],
                selected_budget: [],
                selected_stars: [],
                selected_features: [],
            }
        },

        created() {
            this.fetchData();
        },

        methods: {
            fetchData() {
                axios.get('api/accommodations')
                    .then((res) => {
                        this.accommodations= res.data.accommodations;
                        this.pictures= res.data.pictures;
                    }).catch((err) => {
                        alert(err);
                    })
            }
        }
    }
</script>