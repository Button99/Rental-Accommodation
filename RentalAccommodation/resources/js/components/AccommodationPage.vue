<template>
    <section class="container-fluid">
        <div class="card" style="height: 70vh;">
            <div id="card-norm">
                <b-carousel controls fade indicators :interval="4000">
                    <b-carousel-slide v-for="(item, index) in pictures[0]" :img-src="'/' + item.path"   :key="index" :index="index"></b-carousel-slide>
                </b-carousel>

                <div class="card-body">
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
                    </p>                  
                    <b-list-group v-if=" accommodation.user_id == usr_id" horizontal="md">
                        <b-list-group-item>
                            <router-link :to="/updateAccommodation/ + accommodation.id"> <b-button variant="warning" type="submit"> Update </b-button> </router-link>
                        </b-list-group-item>
                        <b-list-group-item>
                            <b-form @submit.prevent="deleteAccommodation()" method="DELETE" action="#">
                                <b-button variant="danger" type="submit"> Delete</b-button> 
                            </b-form>
                        </b-list-group-item>
                    </b-list-group>

                </div>
            </div>
        </div>
        <br />
        <div style="">
            <l-map style="height: 80vh; width: 50%" :zoom="zoom" :center="center">
                <l-tile-layer :url="url" :attribution="attribution"></l-tile-layer>
                <l-marker :lat-lng="markerLatLng"></l-marker>
            </l-map>  
        </div>
    </section>
</template>

<script>
import Accommodation from '../helpers/Accommodation';
import AppStorage from '../helpers/AppStorage';
import {LMap, LTileLayer, LMarker} from 'vue2-leaflet';
import 'leaflet/dist/leaflet.css';
import icon from 'leaflet/dist/images/marker-icon.png';
import iconShadow from 'leaflet/dist/images/marker-shadow.png';
 

export default {
        components: {
            LMap,
            LTileLayer,
            LMarker
        },
        
        data() {
            return {
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                attribution:
                    '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors',
                center: [51.505, -0.159],
                zoom: 15,
                markerLatLng: [51.504, -0.159],
                accommodation: [],
                usr_id: '',
                pictures: 'null',
            }
        },

        created() {
            this.fetchData();
        },

        methods: {
            fetchData() {
                axios.get('api/accommodations/'+ this.$route.params.id)
                    .then((res) => {
                        this.accommodation= res.data.accommodation;
                        console.log(res.data.accommodation);
                        this.pictures= res.data.pictures;
                        console.log(this.pictures[0]);
                    }).catch((err) => {
                        alert(err);
                    });
                
                this.usr_id= AppStorage.getId();
            },

            deleteAccommodation() {
                Accommodation.deleteAccommodation(this.accommodation.id);
            }
        }
    }
</script>
