<template>
    <div class="create-accommodation-layout container-fluid">
        <section class="float-left m-3">
            <b-card header="Create Accommodation">
                <b-card-body class="m-3">
                    <b-form action="#" id="create-accommodation" @submit.prevent="createAccommodation()" enctype="multipart/form-data" method="POST">
                        <b-form-group label="Name: " label-for="name">
                            <b-form-input id="name" v-model="form.name" type="text" />
                        </b-form-group>
                        <b-form-group label="Rooms: " label-for="rooms">
                            <b-form-input id="rooms" v-model="form.rooms" type="number" />
                        </b-form-group>
                        <b-form-group label="Description: " label-for="description">
                            <b-form-input id="description" v-model="form.description" type="text" />
                        </b-form-group>
                        <b-form-group label="Accommodation type: " label-for="accommodation_type">
                            <b-form-select v-model="form.accommodation_type" id="accommodation_type" :options="options"></b-form-select>
                        </b-form-group>
                        <b-form-group label="Town: " label-for="town">
                            <b-form-input id="town" v-model="form.town" type="text" />
                        </b-form-group>
                        <b-form-group label="Latitude: ( Up to 6 digits )" label-for="latitude">
                        <b-form-input id="latitude" v-model="form.latitude" type="text" />
                        </b-form-group>
                        <b-form-group label="Longitude: ( Up to 6 digits )" label-for="longitude">
                            <b-form-input id="longitude" v-model="form.longitude" type="text" />
                        </b-form-group>
                        <b-form-group label="Address1 : ( Required)" label-for="address1">
                            <b-form-input id="address1" v-model="form.address1" type="text" />
                        </b-form-group>
                        <b-form-group label="Address2: ( Optional )" label-for="address2">
                            <b-form-input id="address2" v-model="form.address2" type="text" />
                        </b-form-group>
                        <b-form-group label="Price (per night)" label-for="price">
                            <b-form-input id="price" v-model="form.price" type="text" />
                        </b-form-group>
                    </b-form>
                </b-card-body>
            </b-card>
        </section>
        <section class="float-right m-4 features-layout">
            <div class="container border p-4">
                <b-form form="create-accommodation">
                    <b-row>
                        <b-col class="m-3">
                            <b-checkbox id="pool" v-model="form.pool" value="1">Pool</b-checkbox>
                        </b-col>
                        <b-col class="m-3">
                            <b-checkbox id="bbq" v-model="form.bbq" value="1"> BBQ</b-checkbox>
                        </b-col>
                        <b-col class="m-3">
                            <b-checkbox id="pool_table" v-model="form.pool_table" value="1"> Pool table</b-checkbox>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col class="m-3">
                            <b-checkbox id="wifi" v-model="form.wifi" value="1">Wifi</b-checkbox>
                        </b-col>
                        <b-col class="m-3">
                            <b-checkbox id="tv" v-model="form.tv" value="1">TV</b-checkbox>
                        </b-col>
                        <b-col class="m-3">
                            <b-checkbox id="kitchen" v-model="form.kitchen" value="1">kitchen</b-checkbox>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col class="m-3">
                            <b-checkbox id="parking" v-model="form.parking" value="1">Parking</b-checkbox>
                        </b-col>
                        <b-col class="m-3">
                            <b-checkbox id="air_conditioning" v-model="form.air_conditioning" value="1">Air Conditioning</b-checkbox>
                        </b-col>
                        <b-col class="m-3">
                            <b-checkbox id="washer" v-model="form.washer" value="1">Washer</b-checkbox>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col class="m-3">
                            <b-checkbox id="fire_extinguisher" v-model="form.fire_extinguisher" value="1">Fire extinguiser</b-checkbox>
                        </b-col>
                        <b-col class="m-3">
                            <b-checkbox id="smoke_alarm" v-model="form.smoke_alarm" value="1">Smoke alarm</b-checkbox>
                        </b-col>
                        <b-col class="m-3">
                            <b-checkbox id="hot_tub" v-model="form.hot_tub" value="1">Hot tub</b-checkbox>
                        </b-col>
                    </b-row>
                </b-form>
            </div>
            <br />
            <b-form-file v-model="files" id="file" multiple placeholder="Add Pictures" drop-placeholder="Drop your files here" accept=".jpg, .png, .gif"></b-form-file>
            <br />
            <br />
            <div class="form-group">
                <b-button type="submit" form="create-accommodation" class="btn">Create</b-button>
            </div>
        </section>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                form: {
                    id: '',
                    name: '',
                    rooms: '',
                    description: '',
                    town: '',
                    accommodation_type: '',
                    latitude: '',
                    longitude: '',
                    address1: '',
                    address2: '',
                    price: '',
                    pool: '0',
                    bbq: '0',
                    pool_table: '0',
                    wifi: '0',
                    tv: '0',
                    kitchen: '0',
                    parking: '0',
                    air_conditioning: '0',
                    washer: '0',
                    fire_extinguisher: '0',
                    smoke_alarm: '0',
                    hot_tub: '0',
                },
                files: [],
                options: [
                    {value: 'Apartment', text: 'Apartment'},
                    {value: 'House', text: 'House'},
                    {value: 'Unique space', text: 'Unique space'},
                    {value: 'Boutique Hotel', text: 'Boutique Hotel'}
                ]
            }
        },

        validations: {
            // Create Validations form createAccommodation
        },

        methods: {
            createAccommodation() {
                let formData= new FormData();
                $.each(this.files, function(key, img) {
                    formData.append(`images[${key}]`, img);
                });

                for(const i in this.form) {
                    formData.append(i, this.form[i]);
                }
                console.log(formData);
                Accommodation.createAccommodation(formData);
            },

            updateAccommodation(id) {
                let formData= new FormData();
                $.each(this.files, function(key, img) {
                    formData.append(`images[${key}]`, img);
                });

                for(const i in this.form) {
                    formData.append(i, this.form[i]);
                }
            }
        }
    }

</script>