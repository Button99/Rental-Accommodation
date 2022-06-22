<template>
    <div class="search-layout">
        <div class="container-fluid w-30 p-3 h-75">
            <div class="row d-flex justify-content-center align-items-center">
                <b-card header="Search" class="m-4 shadow-3-strong">
                    <b-card-body class="text-left h-75 m-5">
                        <b-form action="#" @submit.prevent="search()" method="GET">
                            <b-form-group label="Location: "  label-for="location" class="md-4">
                                <div v-if="!$v.form.location.required" class="text-danger">Location required</div>
                                <div v-if="!$v.form.location.alpha" class="text-danger">Needs only alphabetic characters</div>
                                <b-form-input id="location" v-model="form.location" type="text" @input="onChange"/>
                                <b-list-group v-if="form.location.length" v-show="isOpen">
                                    <b-list-group-item v-for="place in places" :key="place.town" @click="setResult(place.town)" button> {{place.town}} </b-list-group-item>
                                </b-list-group>
                            </b-form-group>
                            <b-form-group label="Check in:" label-for="checkIn" class="md-4">
                                <div v-if="!$v.form.checkIn.required" class="text-danger">Check in required</div>
                                <div v-if="!$v.form.checkIn.isDate" class="text-danger">Needs to be date</div>
                                <div v-if="!$v.form.checkIn.greaterThanToday" class="text-danger">Greater than todat</div>
                                <b-form-input id="checkIn" v-model="form.checkIn" type="date" />
                            </b-form-group>
                            <b-form-group label="Check out: " label-for="checkOut" class="md-4">
                                <div v-if="!$v.form.checkOut.required" class="text-danger">Check out is required</div>
                                <div v-if="!$v.form.checkOut.isDate" class="text-danger">Needs to be date</div>
                                <div v-if="!$v.form.checkOut.greaterThanCheckIn" class="text-danger">Greater than checkin</div>
                                <b-form-input id="checkOut" v-model="form.checkOut" type="date" />
                            </b-form-group>
                            <b-form-group label="Rooms: " label-for="rooms" class="md-4">
                                <div v-if="!$v.form.rooms.required" class="text-danger">Rooms is required</div>
                                <div v-if="!$v.form.rooms.numeric" class="text-danger">Needs to be numeric</div>
                                <b-form-input id="rooms" v-model="form.rooms" type="number" />
                            </b-form-group>
                            <b-form-group >
                                <b-button type="submit" variant="submit btn btn-primary text-uppercase fw-bold">Search </b-button>
                            </b-form-group>
                        </b-form>
                    </b-card-body>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    import {required, alpha, numeric} from 'vuelidate/lib/validators';

    export default {
        data() {
            return {
                form: {
                    location: '',
                    checkIn: '',
                    checkOut: '',
                    rooms: ''
                },
                places: [],
                errors: [],
                isOpen: false
            }
        },

        watch: {
            'form.location': function(after, before) {
                this.getLocation();
            }
        },

        validations: {
            form: {
                location: {
                    required,
                    alpha
                },
                checkIn: {
                    required,
                    isDate(checkIn) {
                        return !isNaN(Date.parse(checkIn));
                    },
                    greaterThanToday(checkIn) {
                        return new Date(checkIn) > new Date();
                    }
                },
                checkOut: {
                    required,
                    isDate(checkOut) {
                        return !isNaN(Date.parse(checkOut));
                    },
                    greaterThanCheckIn(val, form) {
                        return new Date(form.checkIn) < new Date(form.checkOut);
                    }
                },
                rooms: {
                    required, 
                    numeric
                }
            }
        },

        methods: {
            search() {
                this.$router.push({name: 'resultsPage', params: {data: this.form}, query: {keywords: JSON.stringify(this.form)}});
            },

            getLocation() {
                axios.get('api/location', { params: {keyword: this.keyword}})
                    .then((res) => {
                        this.places= res.data.Location;
                    }).catch((err) => {});
            },

            onChange() {
                this.isOpen= true;
            },

            setResult(town) {
                this.form.location= town;
                this.isOpen= false;
            }
        }   
    }
</script>