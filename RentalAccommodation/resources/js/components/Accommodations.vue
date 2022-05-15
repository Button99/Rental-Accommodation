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
                    <b-form-checkbox-group>
                        <b-form-checkbox :options="budget_options"></b-form-checkbox>
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
                ]
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