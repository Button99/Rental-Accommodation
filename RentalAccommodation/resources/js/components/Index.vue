<template>
    <div class="index-layout">
        <h1> Welcome to Rental RentalAccommodation
        </h1>
        <br />

        <p>
            Here you can find every accommodation for you and your family so you can stay !
        </p>
        <div class="container mx-auto mt-4">
            <div class="row">
                <div class="col-md-5">
                    <div class="card" style="width: 18em;">
                        <div class="bg-image hover-overlay ripple">
                            <img class="card-img-top img-fluid rounded" style=" height: 30vh;" :src=" getPhoto() +'pexels-alex-azabache-3879160.jpg'" />
                        </div>
                        <div class="card-body">
                            <div class="card-title">Paris</div>
                                <p class="card-text">
                                    Lorem ipsum in France
                                </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card" style="width: 18em;">
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
                    <div class="card" style="width: 18em;">
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
                    <div class="card" style="width: 18em;">
                        <div class="bg-image hover-overlay ripple">
                            <img class="card-img-top img-fluid rounded" style=" height: 30vh;" :src=" getPhoto() +'pexels-lina-kivaka-3336154.jpg'" />
                        </div>
                        <div class="card-body">
                            <div class="card-title">UK</div>
                                <p class="card-text">
                                    Lorem ipsum in UK
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

export default {
    methods: {
        getPhoto() {
            return 'pictures/';
        }
    }

}
</script>