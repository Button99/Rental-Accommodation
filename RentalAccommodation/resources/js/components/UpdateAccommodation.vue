<template>
    <div class="create-accommodation-layout container-fluid">
        <section class="float-left m-3">
            <b-card header="Update Accommodation">
                <b-card-body class="m-3">
                    <b-form action="#" id="create-accommodation" @submit.prevent="updateAccommodation()" enctype="multipart/form-data" method="POST">
                        <b-form-group label="Name: " label-for="name">
                            <div v-if="!$v.form.name.required" class="text-danger">Name is required</div>
                            <div v-if="!$v.form.name.minLength" class="text-danger">Needs to be greater than 3 characters</div> 
                            <b-form-input id="name" v-model="form.name" type="text" />
                        </b-form-group>
                        <b-form-group label="Rooms: " label-for="rooms">
                            <div v-if="!$v.form.rooms.required" class="text-danger">Field is required</div>
                            <div v-if="!$v.form.rooms.numeric" class="text-danger">Needs to be numeric</div>
                            <b-form-input id="rooms" v-model="form.rooms" type="number" />
                        </b-form-group>
                            <div v-if="!$v.form.description.required" class="text-danger">Description is required</div>
                        <b-form-group label="Description: " label-for="description">
                            <b-form-input id="description" v-model="form.description" type="text" />
                        </b-form-group>
                        <b-form-group label="Accommodation type: " label-for="accommodation_type">
                            <div v-if="!$v.form.accommodation_type.required" class="text-danger">Field is required</div>
                            <b-form-select v-model="form.accommodation_type" id="accommodation_type" :options="options"></b-form-select>
                        </b-form-group>
                        <b-form-group label="Town: " label-for="town">
                            <div v-if="!$v.form.town.required" class="text-danger">Field is required</div>
                            <b-form-input id="town" v-model="form.town" type="text" />
                        </b-form-group>
                        <b-form-group label="Latitude: ( Up to 6 digits )" label-for="latitude">
                            <div v-if="!$v.form.latitude.required" class="text-danger">Field is required</div>
                            <div v-if="!$v.form.latitude.latitudeValidation" class="text-danger">Invalid type</div>
                            <b-form-input id="latitude" v-model="form.latitude" type="text" />
                        </b-form-group>
                        <b-form-group label="Longitude: ( Up to 6 digits )" label-for="longitude">
                            <div v-if="!$v.form.longitude.required" class="text-danger">Field is required</div>
                            <div v-if="!$v.form.longitude.longitudeValidation" class="text-danger">Invalid type</div>
                            <b-form-input id="longitude" v-model="form.longitude" type="text" />
                        </b-form-group>
                        <b-form-group label="Address1 : ( Required)" label-for="address1">
                            <div v-if="!$v.form.address1.required" class="text-danger">Address is required</div>
                            <b-form-input id="address1" v-model="form.address1" type="text" />
                        </b-form-group>
                        <b-form-group label="Address2: ( Optional )" label-for="address2">
                            <b-form-input id="address2" v-model="form.address2" type="text" />
                        </b-form-group>
                        <b-form-group label="Price (per night)" label-for="price">
                            <div v-if="!$v.form.price.required" class="text-danger">Field is required</div>
                            <div v-if="!$v.form.price.numeric" class="text-danger">Needs to be numeric</div>
                            <b-form-input id="price" v-model="form.price" type="text" />
                        </b-form-group>
                    </b-form>
                </b-card-body>
            </b-card>
        </section>
        <section class="features-layout">
            <div class="container border">
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
                <b-button type="submit" form="create-accommodation" class="btn">Update</b-button>
            </div>
        </section>
    </div>
</template>
<script>
    import {required, minLength, between, maxLength, numeric} from 'vuelidate/lib/validators';

    export default {
        data() {
            return {
                form: {
                    id: this.$route.params.id,
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

        created() {
            this.fetchData(this.$route.params.id);
        },

        validations: {
            form: {
                name: {
                    required,
                    minLength: minLength(3),
                    maxLength: maxLength(50)
                },
                rooms: {
                    required,
                    numeric
                },
                description: {
                    required,
                    maxLength: maxLength(250)
                },
                town: {
                    required,
                },
                accommodation_type: {
                    required,
                },
                latitude: {
                    required,
                    latitudeValidation(latitude) {
                        var reg= new RegExp(/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{6})?))$/);
                        if(reg.test(latitude)) {
                            return true;
                        }
                        return false;
                    }
                },
                longitude: {
                    required,
                    longitudeValidation(longitude) {
                        var reg= new RegExp(/^(\+|-)?(?:180(?:(?:\.0{1,6})?)|(?:[0-9]|[1-9][0-9]|1[0-7][0-9])(?:(?:\.[0-9]{1,7})?))$/);
                        
                        if(reg.test(longitude)) {
                            return true;
                        }
                        return false;
                    }
                },
                address1: {
                    required
                },
                address2: {

                },
                price: {
                    required,
                    numeric,
                    between: between('0', '5000')
                },
                pool: {
                    between: between(0, 1)
                },
                bbq: {
                    between: between(0, 1)

                },
                pool_table: {
                    between: between(0, 1)

                },
                wifi: {
                    between: between(0, 1)

                },
                tv: {
                    between: between(0, 1)

                },
                kitchen: {
                    between: between(0, 1)

                },
                parking: {
                    between: between(0, 1)
                    
                },
                air_conditioning: {
                    between: between(0, 1)

                },
                washer: {
                    between: between(0, 1)

                },
                fire_extinguisher: {
                    between: between(0, 1)

                },
                smoke_alarm: {
                    between: between(0, 1)

                },
                hot_tub: {
                    between: between(0, 1)

                }
            }
        },

        methods: {
            updateAccommodation() {
                let formData= new FormData();
                $.each(this.files, function(key, img) {
                    formData.append(`images[${key}]`, img);
                });

                for(const i in this.form) {
                    formData.append(i, this.form[i]);
                }
                /* Symfony error (also PHP problem) Cant handle PUT method with multipart/form-data
                /* Possible solutions-> 2
                /* A) Use POST and pass _method inside the file
                /* B) Use server-side packages that handle the problem (illuminatech/multipart-middleware || pecll/apfd) 
                */
                formData.append('_method', 'PUT');
                Accommodation.updateAccommodation(formData, this.$route.params.id);
            },

            fetchData(id) {
                axios.get('api/accommodations/'+ this.$route.params.id)
                    .then((res) => {
                        this.form.name= res.data.accommodation.name;
                        this.form.rooms= res.data.accommodation.rooms;
                        this.form.description= res.data.accommodation.description;
                        this.form.town= res.data.accommodation.town;
                        this.form.latitude= res.data.accommodation.latitude;
                        this.form.longitude= res.data.accommodation.longitude;
                        this.form.address1= res.data.accommodation.address1;
                        this.form.address2= res.data.accommodation.address2;
                        this.form.price= res.data.accommodation.price;
                        this.form.accommodation_type= res.data.accommodation.accommodation_type;
                        this.form.pool= res.data.features[0].pool;
                        this.form.bbq= res.data.features[0].bbq;
                        this.form.pool_table= res.data.features[0].pool_table;
                        this.form.wifi= res.data.features[0].wifi;
                        this.form.tv= res.data.features[0].tv;
                        this.form.kitchen= res.data.features[0].kitchen;
                        this.form.parking= res.data.features[0].parking;
                        this.form.air_conditioning= res.data.features[0].air_conditioning;
                        this.form.washer= res.data.features[0].washer;
                        this.form.fire_extinguisher= res.data.features[0].fire_extinguisher;
                        this.form.smoke_alarm= res.data.features[0].smoke_alarm;
                        this.form.hot_tub= res.data.features[0].hot_tub;
                        this.files= res.data.pictures[0][0].path;

                    }).catch((err) => {
                        alert(err);
                    });
            }
        }
    }

</script>