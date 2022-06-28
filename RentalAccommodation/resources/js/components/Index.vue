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
                                    Lorem ipsum in Paris
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
                                    Lorem ipsum in Athens
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
                                    Lorem ipsum in Rome
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
                                    Lorem ipsum in London
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <br />
        <br />
        <div class="container">
            <div class="row text-center">
                <p class="col-md-5 border-right border-bottom" id="how-to-book"> How to book
                    <br />
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
                <p class="col-md-5 border-bottom" id="about-us"> About us
                    <br />
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
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