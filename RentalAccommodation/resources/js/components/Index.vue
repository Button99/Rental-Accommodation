<template>
    <div class="index-layout">
        <h1> Welcome to Rental RentalAccommodation</h1>
        <br />
        <p>
            Here you can find every accommodation for you and your family so you can stay !
        </p>
        <div class="container mx-auto mt-4">
            <div class="row">
                <div class="col-md-5">
                    <div class="card" style="width: 18em; cursor: pointer;" @click="searchParis()" >
                        <div class="bg-image hover-overlay ripple">
                            <img class="card-img-top img-fluid rounded" style=" height: 30vh;" :src=" getPhoto() +'pexels-alex-azabache-3879160.jpg'" />
                        </div>
                        <div class="card-body">
                            <div class="card-title">Paris</div>
                                <p class="card-text">
                                    Find a place to stay in Paris!
                                </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card" style="width: 18em; cursor: pointer;" @click="searchAthens()">
                        <div class="bg-image hover-overlay ripple">
                            <img class="card-img-top img-fluid rounded" style=" height: 30vh;" :src=" getPhoto() +'pexels-jimmy-teoh-951539.jpg'" />
                        </div>
                        <div class="card-body">
                            <div class="card-title">Athens</div>
                                <p class="card-text">
                                    Find a place to stay in Athens!
                                </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card" style="width: 18em; cursor: pointer;" @click="searchRome()">
                        <div class="bg-image hover-overlay ripple">
                            <img class="card-img-top img-fluid rounded" style=" height: 30vh;" :src=" getPhoto() +'pexels-chait-goli-1797161.jpg'" />
                        </div>
                        <div class="card-body">
                            <div class="card-title">Rome</div>
                                <p class="card-text">
                                    Find a place to stay in Rome!
                                </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card" style="width: 18em; cursor: pointer;" @click="searchLondon()">
                        <div class="bg-image hover-overlay ripple">
                            <img class="card-img-top img-fluid rounded" style=" height: 30vh;" :src=" getPhoto() + 'pexels-lina-kivaka-3336154.jpg'" />
                        </div>
                        <div class="card-body">
                            <div class="card-title">UK</div>
                                <p class="card-text">
                                    Find a place to stay in London!
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
    </div>
</template>

<script>
export default {
    methods: {
        getPhoto() {
            return 'pictures/';
        },

        searchParis() {
            this.$router.push({name: 'resultsPage', params: {data: {form: {'location': 'paris', 'checkIn': '22/6/22', 'checkOut': '23/6/22', 'rooms': '1'}}}, query: {keywords: JSON.stringify({'location': 'paris', 'checkIn': '22/6/22', 'checkOut': '23/6/22', 'rooms': '1'})}});
        },

        searchAthens() {
            this.$router.push({name: 'resultsPage', params: {data: {form: {'location': 'athens', 'checkIn': '22/6/22', 'checkOut': '23/6/22', 'rooms': '1'}}}, query: {keywords: JSON.stringify({'location': 'athens', 'checkIn': '22/6/22', 'checkOut': '23/6/22', 'rooms': '1'})}});
        },
        searchRome() {
            this.$router.push({name: 'resultsPage', params: {data: {form: {'location': 'rome', 'checkIn': '22/6/22', 'checkOut': '23/6/22', 'rooms': '1'}}}, query: {keywords: JSON.stringify({'location': 'rome', 'checkIn': '22/6/22', 'checkOut': '23/6/22', 'rooms': '1'})}});
        },
        searchLondon() {
            this.$router.push({name: 'resultsPage', params: {data: {form: {'location': 'london', 'checkIn': '22/6/22', 'checkOut': '23/6/22', 'rooms': '1'}}}, query: {keywords: JSON.stringify({'location': 'london', 'checkIn': '22/6/22', 'checkOut': '23/6/22', 'rooms': '1'})}});
        }
    }

}
</script>