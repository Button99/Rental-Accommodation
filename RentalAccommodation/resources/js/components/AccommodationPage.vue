<template>
    <section class="container-fluid">
        <div class="card" id="accommodation-page">
            <div id="card-norm" class="accommodation-card-layout">
                <b-carousel controls fade indicators :interval="4000">
                    <b-carousel-slide v-for="(item, index) in pictures[0]" :img-src="'/' + item.path"   :key="index" :index="index"></b-carousel-slide>
                </b-carousel>

                <div class="card-body">
                    <div class="float-left" style="width: 40%;">
                        <h5 class="card-title">Name: {{accommodation.name}} </h5>
                        <p class="card-text">
                            Type: {{accommodation.accommodation_type}} <br />
                            Rooms: {{accommodation.rooms}} <br />
                            Town: {{accommodation.town}} <br />
                            Address: {{accommodation.address1}}, {{accommodation.address2}} <br />
                            Description: {{accommodation.description}} <br />
                            <b v-if="accommodation.stars == null ">
                                Rate: Not available
                            </b>
                            <b v-else>
                                Rate: {{accommodation.stars}}
                            </b>
                            <br />
                            Price: <b> {{accommodation.price}} </b> 
                        </p>                  
                        <b-list-group v-if=" accommodation.user_id == usr_id" horizontal="md" id="button-list">
                            <b-list-group-item>
                                <router-link :to="/updateAccommodation/ + accommodation.id"> <b-button variant="warning" type="submit"> Update </b-button> </router-link>
                            </b-list-group-item>
                            <b-list-group-item>
                                <b-form @submit.prevent="deleteAccommodation()" method="DELETE" action="#">
                                    <b-button variant="danger" type="submit"> Delete</b-button> 
                                </b-form>

                            </b-list-group-item>
                        </b-list-group>
                        <br />
                        <b-form v-if="accommodation.user_id != usr_id" @submit.prevent="createComment()" size="md" method="POST" action="#" style="margin: 2rem;">
                            <h3>Your opinion values!</h3>
                            <p>Make a comment</p>
                            <b-form-textarea id="create-comment" size="sm" v-model="text.comment" rows="3" max-rows="5"/>
                            <b-button type="submit" size="sm">Submit comment</b-button>
                        </b-form>
                        </div>
                        <div class="map">
                            <h4>Location: </h4>
                            <l-map style="height: 50vh;" :zoom="zoom" :center="center">
                                <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
                                <l-marker :lat-lng="markerLatLng"></l-marker>
                            </l-map>  
                        </div>
                    </div>
                    <b-table id="test-table" :items="comments" :per-page="per_page" :current-page="current_page" small></b-table>
                    <b-pagination v-model="current_page" :total_rows="total_rows" :per-page="per_page" aria-controls="test-table"></b-pagination>
                </div>
            </div>
        </div>
        <br />
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
                text: {
                    comment: ''
                },
                current_page: '',
                total_rows: '',
                per_page: '',
                comments: []
            }
        },

        mounted() {
            this.getResults();
        },

        created() {
            this.fetchData();
        },

        methods: {
            fetchData() {
                axios.get('api/accommodations/'+ this.$route.params.id)
                    .then((res) => {
                        this.accommodation= res.data.accommodation;
                        this.pictures= res.data.pictures;
                        this.markerLatLng= [this.accommodation.latitude, this.accommodation.longitude];
                        this.center= this.markerLatLng;
                    }).catch((err) => {
                        alert(err);
                    });
                
                this.usr_id= AppStorage.getId();
            },

            deleteAccommodation() {
                Accommodation.deleteAccommodation(this.accommodation.id);
            },

            createComment() {
                User.addComment(this.text, this.accommodation.id);
            },

            getResults(page=1) {
                axios.get('api/showComments?page='+ page)
                    .then((res) => {
                        console.log(res.data);
                        this.current_page= res.data.current_page;
                        this.per_page= res.data.per_page;
                        this.total_rows= res.data.per_page;
                        this.comments= res.data.data;
                    }).catch((err) => {
                        alert(err);
                    });
            } 
        }
    }
</script>
