<template>
    <section class="container-fluid">
        <div class="card">
            <img src="pictures/pexels-alex-azabache-3879160.jpg" style=" height: 30vh;" class="card-img-top float-left" />
            <div class="card-body">
                <h5 class="card-title">Name: {{accommodation.name}} </h5>
                <p class="card-text">
                    Type: {{accommodation.accommodation_type}} <br />
                    Rooms: {{accommodation.rooms}} <br />
                    Town: {{accommodation.town}} <br />
                    Description: {{accommodation.description}} <br />
                    <b v-if="stars == null ">
                        Stars: Not available
                    </b>
                    <b v-else>
                        Stars: {{accommodation.stars}}
                    </b>
                </p>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        data() {
            return {
                accommodation: []
            }
        },

        created() {
            this.fetchData();
        },

        methods: {
            fetchData() {
                axios.get('api/accommodation/'+ this.$route.params.id)
                    .then((res) => {
                        this.accommodation= res.data;
                    })
            }
        }
    }
</script>
