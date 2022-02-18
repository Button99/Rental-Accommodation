<template>
    <div class="create-accommodation-layout">
        <section class="float-left">
            <b-card header="Create Accommodation">
                <b-card-body class="m-3">
                    <b-form action="#" @submit.prevent="create()" method="POST">
                        <b-form-group label="Name: " label-for="name">
                            <b-form-input id="name" v-model="form.name" type="text" />
                        </b-form-group>
                        <b-form-group label="Rooms: " label-for="rooms">
                            <b-form-input id="rooms" v-model="form.rooms" type="number" />
                        </b-form-group>
                    </b-form>
                    <b-form-group label="Description: " label-for="description">
                        <b-form-input id="description" v-model="form.description" type="text" />
                    </b-form-group>
                    <b-form-group label="Accommodation type: " label-for="accommodation_type">
                        <b-form-input id="accommodation_type" v-model="form.accommodation_type" type="text" />
                    </b-form-group>
                    <b-form-group label="Town: " label-for="town">
                        <b-form-input id="town" v-model="form.town" type="text" />
                    </b-form-group>
                </b-card-body>
            </b-card>
        </section>
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