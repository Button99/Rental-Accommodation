<template>
    <div class="container">
        <h1>Accommodations</h1>
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
            console.log(this.$route.query.keywords);
            const data= this.$route.query.keywords;
            axios.get('api/search/accommodations',  {params: {keywords: data } })
            .then((res) => {
                console.log(res.data);
                this.accommodations= res.data.accommodations;
                this.pictures= res.data.pictures;
            }).catch((err) => {
                alert(err);
            });
        },

        methods: {
            fetchData(data) {
            }
        }
    }
</script>