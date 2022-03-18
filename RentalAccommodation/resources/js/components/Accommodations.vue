<template>
    <div class="accommodations-layout">
        <h3>Here you can find the best accommodations</h3>
        
        <!-- I should implement with v-for  (just like myAccommodations) -->
        <section>
            <!-- Create a card just like the myAccommodations -->
            <!-- Also, create a menu where user can choose -->
            <!-- ex. cost, number of rooms etc.. -->
        </section>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                accommodations: []
            }
        },

        created() {
            this.fetchData();
        },

        methods: {
            fetchData() {
                axios.get('api/accommodations')
                    .then((res) => {
                        this.accommodations= res.data;
                        console.log(this.accommodations);
                    }).catch((err) => {
                        alert(err);
                    })
            }
        }
    }
</script>