<template>
    <div class="login-layout">
        <div class="container p-5">
            <div class="row d-flex justify-content-center align-items-center m-5">
                <b-card class="shadow-3-strong m-4 color-light border-0 d-flex" header-class="h3" header="Book" >
                    <b-card-body class="text-center m-5">
                        <b-form @submit.prevent="book()" @reset="onReset()" action="#" method="POST">
                            <b-form-group label="Card holder name: " label-for="card-holder-name" class="mb-4 ">
                                <b-form-input id="card-holder-name" v-model="form.cardHolder" type="text" placeholder="Your full name" required> </b-form-input>
                            </b-form-group>

                            <b-form-group label="Card number: " label-for="card-number" class="mb-4">
                                <b-form-input id="card-number" v-model="form.cardNumber" type="text" placeholder="Your card number" required></b-form-input>
                            </b-form-group>
                            <b-form-row id="row">
                                <b-col><b-form-input id="mm" v-model="form.mm" type="text" placeholder="MM" required ></b-form-input></b-col>
                                <b-col><b-form-input id="yy" v-model="form.yy" type="text" placeholder="YY" required ></b-form-input></b-col>
                            </b-form-row><br />
                            <b-form-group label="CVV" label-for="cvv" class="mb-4">
                                <b-form-input id="cvv" v-model="form.cvv" type="text" placeholder="CVV" required></b-form-input>
                            </b-form-group>

                            <b-button type="submit" variant="submit btn btn-primary text-uppercase fw-bold">Confirm</b-button>
                        </b-form>
                    </b-card-body>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    import {required, minLength, email} from 'vuelidate/lib/validators';
    export default {
        data() {
            return {
                form: {
                    cardHolder: '',
                    cardNumber: '',
                    expiration: ''
                },
                errors: []
            }
        },
    }
</script>