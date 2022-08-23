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
                    <b-form-checkbox-group v-model="selected_budget" :options="budget_options" stacked @change="recompute">
                    </b-form-checkbox-group>
                    <br />
                    <h3>Features</h3>
                    <b-form-checkbox-group v-model="selected_features" :options="features_opt" stacked @change="recompute">
                    </b-form-checkbox-group>
                    <br />
                    <h3>Stars</h3>
                    <b-form-checkbox-group v-model="selected_stars" :options="stars_opt" stacked @change="recompute">
                    </b-form-checkbox-group>
                </b-form-group>
            </b-list-group>
        </section>
    
    <div class="container">
        <section class="my-accommodations" v-if="accommodations.length > 0">
            <b-pagination v-model="currentPage" :total-rows="filteredAccommodations.length" :per-page="perPage" aria-controls="accommodationList" align="center"></b-pagination>

            <ul class="justify-content-center">
                <div class="col-md-7">
                    <li v-for="accommodation in filteredAccommodations.slice((currentPage -1) * perPage, perPage * currentPage)" class="p-3 col-md-4 mt-5" id="accommodationList" :per-page="perPage" :current-page="currentPage">

                        <router-link :to="{ name: 'accommodation', params: {id: accommodation.id}}">
                            <div class="card">
                                <img :src="picture[0].path" v-for="picture in pictures" v-if="accommodation.id == picture[0].accommodation_id" style=" height: 30vh;" class="card-img-top" />
                                <div class="card-body">
                                    <h5 class="card-title">{{accommodation.name}}</h5>
                                    <p class="card-text">
                                        Rooms: {{accommodation.rooms}} <br />
                                        Town: {{accommodation.town}} <br />
                                        Description: {{accommodation.description}} <br />
                                        <b>Price: {{accommodation.price}}</b> <br />
                                    </p>
                                </div>
                            </div>
                        </router-link>
                    </li>
                </div>
            </ul>
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
                features: [],
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
                perPage: 5,
                currentPage: 0,
            }
        },
        created() {
            this.fetchData();
        },
        computed: {
            filteredAccommodations() {
                var filtered_accommodations= this.accommodations;
                if(this.selected_budget.length== 0 && this.selected_stars.length== 0  && this.selected_features.length== 0 ) {
                    return this.accommodations;
                }
                if(this.selected_budget.length > 0) {
                    var b= this.selected_budget;
                    filtered_accommodations= this.accommodations.filter(function(a) {
                        for(var i=0; i< b.length; i++ ) {
                            if(b[i] >= a.price) {
                                return a;
                            }
                        }
                    });
                }
                if(this.selected_stars.length > 0) {
                    var b= this.selected_stars;
                    filtered_accommodations= this.accommodations.filter(function(a) {
                        if(b === a.stars) {
                            return a;
                        }
                    });
                }
                if(this.selected_features.length > 0) {
                    var b= this.selected_features;
                    var f= this.features;
                    filtered_accommodations= this.accommodations.filter(function(a) {
                        console.log(f);
                        for(var i=0; i<b.length; i++) {
                            for(var j=0; j<f[i].length; j++) {
                                if(f[i][j][b[i]] == '0') {
                                }
                                if(a.id === f[i][j].accommodation_id && f[i][j].hasOwnProperty(b[i]) && f[i][j][b[i]] == '1') {
                                    return a;
                                }
                            }
                        }
                    });
                }
                return filtered_accommodations;
            }
        },
        methods: {
            fetchData() {
                axios.get('api/accommodations')
                    .then((res) => {
                        this.accommodations= res.data.accommodations;
                        this.features= res.data.features;
                        this.pictures= res.data.pictures;
                    }).catch((err) => {
                        alert(err);
                    })
            },
            
            recompute() {
                this.filteredAccommodations;
            },
        },
    }
</script>