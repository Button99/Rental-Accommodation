<template>
    <section class="container-fluid">
        <div class="card" id="accommodation-page">
            <div id="card-norm" class="accommodation-card-layout">
                <b-carousel controls fade indicators :interval="4000" id="carousel">
                    <b-carousel-slide v-for="(item, index) in pictures[0]" :img-src="'/' + item.path"   :key="index" :index="index"></b-carousel-slide>
                </b-carousel>
      
                <div class="card-body">
                    <div id="data">    
                        <h5 class="card-title">Name: {{accommodation.name}} </h5>
                        <p class="card-text">
                            Type: {{accommodation.accommodation_type}} <br />
                            Rooms: {{accommodation.rooms}} <br />
                            Town: {{accommodation.town}} <br />
                            Address: {{accommodation.address1}}, {{accommodation.address2}} <br />
                            Description: {{accommodation.description}} <br />
                            <b v-if="accommodationRate == null ">
                                Rate: Not available
                            </b>
                            <b v-else class="inline" inline>
                                Rate:
                                <b-form-rating v-model="accommodationRate" size="sm" class="w-25 m-1 inline" precision="2" inline disabled no-border></b-form-rating>
                            </b>
                            <br />
                            Price: <b> {{accommodation.price}} </b> 
                        </p>
                    </div>      
                    <div id="opinion">
                        <b-form v-if="accommodation.user_id != usr_id" @submit.prevent="createComment()" size="md" method="POST" action="#" style="margin: 2rem;">
                            <h3>Your opinion values!</h3>
                            <p>Rate the accommodation:<br/>
                                <b-input-group>
                                    <b-form-rating v-model="rate" variant="danger" ></b-form-rating>
                                    <b-input-group-append>
                                        <b-button @click="addRate(rate)">Add Rate</b-button>
                                    </b-input-group-append>
                                </b-input-group>
                            </p>
                            <p>Share your experience: </p>
                            <b-form-textarea id="create-comment" size="sm" v-model="text.comment" rows="3" max-rows="5"/> <br/>
                            <b-button type="submit" size="sm">Submit</b-button>
                        </b-form>
                    </div>
                    <div class="map">
                        <h4>Location: </h4>
                        <l-map :zoom="zoom" :center="center">
                            <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
                            <l-marker :lat-lng="markerLatLng"></l-marker>
                        </l-map>  
                    </div>
                    <div class="features-style" stacked>
                        <h4>Accommodation Features</h4>
                        <b-row>
                            <b-col class="m-1">
                                <b-checkbox id="pool" v-model="features[0].pool" value="1" disabled>Pool</b-checkbox>
                            </b-col>
                            <b-col class="m-1">
                                <b-checkbox id="bbq" v-model="features[0].bbq" value="1" disabled> BBQ</b-checkbox>
                            </b-col>
                            <b-col class="m-1">
                                <b-checkbox id="pool_table" v-model="features[0].pool_table" value="1" disabled> Pool table</b-checkbox>
                            </b-col>
                        </b-row>
                            <b-row>
                                <b-col class="m-1">
                                    <b-checkbox id="wifi" v-model="features[0].wifi" value="1" disabled>Wifi</b-checkbox>
                                </b-col>
                                <b-col class="m-1">
                                    <b-checkbox id="tv" v-model="features[0].tv" value="1" disabled>TV</b-checkbox>
                                </b-col>
                                <b-col class="m-1">
                                    <b-checkbox id="kitchen" v-model="features[0].kitchen" value="1" disabled>kitchen</b-checkbox>
                                </b-col>
                            </b-row>
                            <b-row>
                                <b-col class="m-1">
                                    <b-checkbox id="parking" v-model="features[0].parking" value="1" disabled>Parking</b-checkbox>
                                </b-col>
                                <b-col class="m-1">
                                    <b-checkbox id="air_conditioning" v-model="features[0].air_conditioning" value="1" disabled>AC</b-checkbox>
                                </b-col>
                                <b-col class="m-1">
                                    <b-checkbox id="washer" v-model="features[0].washer" value="1" disabled>Washer</b-checkbox>
                                </b-col>
                            </b-row>
                            <b-row>
                                <b-col class="m-1">
                                    <b-checkbox id="fire_extinguisher" v-model="features[0].fire_extinguisher" value="1" disabled>Fire extinguisher</b-checkbox>
                                </b-col>
                                <b-col class="m-1">
                                    <b-checkbox id="smoke_alarm" v-model="features[0].smoke_alarm" value="1" disabled>Smoke alarm</b-checkbox>
                                </b-col>
                                <b-col class="m-1">
                                    <b-checkbox id="hot_tub" v-model="features[0].hot_tub" value="1" disabled>Hot tub</b-checkbox>
                                </b-col>
                            </b-row>
                        </div>
                        <br />
                    </div>
                </div>                                    
                <b-list-group v-if=" accommodation.user_id == usr_id" horizontal="md" id="button-list">
                    <b-list-group-item >
                        <router-link :to="/updateAccommodation/ + accommodation.id"> <b-button variant="warning" type="submit"> Update </b-button> </router-link>
                    </b-list-group-item>
                    <b-list-group-item>
                        <b-form @submit.prevent="deleteAccommodation()" method="DELETE" action="#">
                            <b-button variant="danger" type="submit">Delete</b-button> 
                        </b-form>
                    </b-list-group-item>
                </b-list-group>
            </div>
        </div>
        <br />
        <div>
            <b-card title="Comments">
                <b-pagination v-model="current_page" :total-rows="rows" :per-page="per_page" aria-controls="my-table" align="fill"></b-pagination>
                <b-table id="data-table" :items="comments" :per-page="per_page" :current-page="current_page" small></b-table>
            </b-card>
        </div>
    </section>
</template>

<script>
import Accommodation from '../helpers/Accommodation';
import AppStorage from '../helpers/AppStorage';
import {LMap, LTileLayer, LMarker} from 'vue2-leaflet';
import 'leaflet/dist/leaflet.css';

export default {
        components: {
            LMap,
            LTileLayer,
            LMarker,
        },
        
        data() {
            return {
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                attribution:
                    '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors',
                center: [0.00, 0.00],
                zoom: 15,
                markerLatLng: [0.00, 0.00],
                accommodation: [],
                usr_id: '',
                pictures: 'null',
                rate: '',
                text: {
                    comment: ''
                },
                current_page: 1,
                per_page: 5,
                comments: [],
                features: [],
                accommodationRate: ''
            }
        },

        mounted() {
            this.getResults();
        },

        created() {
            this.fetchData();
        },

        computed: {
            rows() {
                return this.comments.length;
            }
        },

        methods: {
            fetchData() {
                axios.get('api/accommodations/'+ this.$route.params.id)
                    .then((res) => {
                        this.accommodation= res.data.accommodation;
                        this.pictures= res.data.pictures;
                        this.features= res.data.features;
                        this.markerLatLng= [this.accommodation.latitude, this.accommodation.longitude];
                        this.center= this.markerLatLng;
                    }).catch((err) => {
                        alert(err);
                    });
                
                this.usr_id= AppStorage.getId();
                
                axios.get('api/accommodations/' + this.$route.params.id + '/getRate')
                    .then((res) => {
                        this.accommodationRate= res.data;
                        console.log(res.data);
                        console.log(this.accommodationRate);
                    }).catch((err) => {
                        alert(err);
                    })
            },

            deleteAccommodation() {
                Accommodation.deleteAccommodation(this.accommodation.id);
            },

            createComment() {
                User.addComment(this.text, this.accommodation.id);
            },

            getResults(page=1) {
                axios.get('api/' + this.$route.params.id + '/showComments?page='+ page)
                    .then((res) => {
                        this.comments= res.data;
                    }).catch((err) => {
                        // If accommodation has no comments -> do nothing
                    });
            },
            
            addRate(value) {
                Rate.addRate(this.accommodation.id, value);
            },
        
        }
    }
</script>
