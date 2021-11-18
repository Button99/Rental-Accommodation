<template>
    <div class="index-layout">
        <h1> Welcome to Rental RentalAccommodation
        </h1>
        <br />

        <p>
            Here you can find every accommodation for you and your family so you can stay !
        </p>
        <ul class="container">
            <div class="row">
                <div class="col-md-3">
                    <li class="list-group-item-action">
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
                    </li>
                </div>
                <div class="col-md-3">
                    <li class="list-group-item-action">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple">
                                <img class="card-img-top img-fluid rounded" :src="getPhoto() + 'pexels-chait-goli-1797161.jpg'" />
                            </div>
                            <div class="card-body">
                                <div class="card-title">Rome</div>
                                <p class="card-text">
                                    Lorem ipsum in Rome
                                </p>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="col-md-3">
                    <li class=" list-group-item-action">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple">
                                <img class="card-img-top img-fluid rounded" :src="getPhoto() + 'pexels-jimmy-teoh-951539.jpg'" />
                            </div>
                            <div class="card-body">
                                <div class="card-title">Athens</div>
                                <p class="card-text">
                                    Lorem ipsum in Athens
                                </p>
                            </div>
                        </div>
                    </li>
                </div>
                <div class="col-md-3">
                    <li class="list-group-item-action">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple">
                                <img class="img-fluid" :src="getPhoto() + 'pexels-lina-kivaka-3336154.jpg'" />
                            </div>
                            <div class="card-body">
                                <div class="card-title">London</div>
                                <p class="card-text">
                                    Lorem ipsum in London
                                </p>
                            </div>
                        </div>
                    </li>
                </div>
            </div>
        </ul>
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