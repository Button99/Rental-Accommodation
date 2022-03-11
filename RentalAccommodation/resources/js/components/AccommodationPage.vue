<template>
    <section class="container-fluid">
        <div class="card" style="height: 70vh;">
            <div id="card-norm">
                <b-carousel controls fade indicators :interval="4000">
                   <b-carousel-slide v-for="(item, index) in pictures[0]" :img-src="'/' + item.path"   :key="item" :index="index"></b-carousel-slide>
                </b-carousel>
                <div class="card-body">
                    <h5 class="card-title">Name: {{accommodation.name}} </h5>
                    <p class="card-text">
                        Type: {{accommodation.accommodation_type}} <br />
                        Rooms: {{accommodation.rooms}} <br />
                        Town: {{accommodation.town}} <br />
                        Description: {{accommodation.description}} <br />
                        <b v-if="accommodation.stars == null ">
                            Rate: Not available
                        </b>
                        <b v-else>
                            Rate: {{accommodation.stars}}
                        </b>
                    </p>
                    <!-- Add delete or update button -->
                    <p v-if=" accommodation.user_id == usr_id">
                        <b-form @submit.prevent="updateAccommodation()" method="PATCH" action="#">
                            <b-button variant="warning" type="submit"> Update </b-button>
                        </b-form>
                        <b-form @submit.prevent="deleteAccommodation()" method="DELETE" action="#">
                            <b-button variant="danger" type="submit"> Delete</b-button> 
                        </b-form>
                    </p>

                </div>
            </div>
        </div>
        <br />
    </section>
</template>

<script>
import Accommodation from '../helpers/Accommodation';
import AppStorage from '../helpers/AppStorage';

export default {
        data() {
            return {
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
                        this.pictures= res.data.pictures;
                    }).catch((err) => {
                        alert(err);
                    });
                
                this.usr_id= AppStorage.getId();
            },

            deleteAccommodation() {
                Accommodation.deleteAccommodation(this.accommodation.id);
            },

            updateAccommodation() {
                alert('Works!');
            }
        }
    }
</script>
