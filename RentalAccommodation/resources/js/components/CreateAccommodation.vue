<template>
    <div class="create-accommodation-layout">
        <div class="container-fluid w-100 p-4 h-90">
            <div class="row d-flex justify-content-left align-items-left">
                <b-card header="Create Accommodation" class="w-40" >
                    <b-card-body class="text-center">
                        <b-form-group action="#" @submit.prevent="createAccommodation()" method="POST">
                            <b-form-group label="Name: " label-for="name">
                                <b-form-input id="name" v-model="form.name" type="text" />
                            </b-form-group>
                            <b-form-group label="Rooms: " label-for="rooms">
                                <b-form-input id="rooms" v-model="form.rooms" type="number" />
                            </b-form-group>
                            <b-form-group label="Description: " label-for="description">
                                <b-form-input id="description" v-model="form.description" type="text" />
                            </b-form-group>
                            <b-form-group label="Town: " label-for="town">
                                <b-form-input id="town" v-model="form.town" type="text" />
                            </b-form-group>
                            <b-form-group label="Type: " label-for="type">
                                <b-form-input id="type" v-model="form.type" type="text" />
                            </b-form-group>
                        </b-form-group>
                    </b-card-body>
                </b-card>
            </div>
            <div>
                <b-form-group label="Features">
                    <b-form-row name="group1">
                        <b-col><b-form-checkbox value="1" v-model="form.pool" name="pool">Pool</b-form-checkbox></b-col>
                        <b-col><b-form-checkbox value="1" v-model="form.bbq" name="bbq">BBQ</b-form-checkbox></b-col>
                        <b-col><b-form-checkbox value="1" v-model="form.pool_table" name="pool_table">Pool table</b-form-checkbox></b-col>
                    </b-form-row>
                    <b-form-checkbox-group name="group2">
                        <b-form-checkbox value="1" v-model="form.wifi" name="wifi">Wifi</b-form-checkbox>
                        <b-form-checkbox value="1" v-model="form.tv" name="tv">TV</b-form-checkbox>
                        <b-form-checkbox value="1" v-model="form.kitchen" name="kitchen">Kitchen</b-form-checkbox>
                    </b-form-checkbox-group>
                    <b-form-checkbox-group name="group3">
                        <b-form-checkbox value="1" v-model="form.parking" name="parking">Parking</b-form-checkbox>
                        <b-form-checkbox value="1" v-model="form.air_conditioning" name="air_conditioning">Air conditioning</b-form-checkbox>
                        <b-form-checkbox value="1" v-model="form.washer" name="washer">Washer</b-form-checkbox>
                    </b-form-checkbox-group>
                    <b-form-checkbox-group name="group4">
                        <b-form-checkbox value="1" v-model="form.fire_extinguisher" name="fire_extinguisher">Fire extinguisher</b-form-checkbox>
                        <b-form-checkbox value="2" v-model="form.smoke_alarm" name="smoke_alarm">Smoke alarm</b-form-checkbox>
                        <b-form-checkbox value="1" v-model="form.hot_tub" name="hot_tub">Hot tub</b-form-checkbox>
                    </b-form-checkbox-group>
                </b-form-group>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    name: '',
                    rooms: '',
                    description: '',
                    town: '',
                    type: '',
                    pool: '',
                    bbq: '',
                    pool_table: '',
                    wifi: '',
                    tv: '',
                    kitchen: '',
                    parking: '',
                    air_conditioning: '',
                    washer: '',
                    fire_extinguisher: '',
                    smoke_alarm: '',
                    hot_tub: '',
                },
            }
        },

        methods: {
            createAccommodation() {
                return 123;
            }
        }
    }

</script>