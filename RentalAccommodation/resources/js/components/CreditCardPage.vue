<template>
    <div class="login-layout">
        <div class="container p-5">
            <div class="row d-flex justify-content-center align-items-center m-5">
                <b-card class="shadow-3-strong m-4 color-light border-0 d-flex" header-class="h3" header="Book" >
                    <b-card-body class="text-center m-5">
                        <b-form @submit.prevent="book()" @reset="onReset()" action="#" method="POST">
                            <b-form-group label="Card holder name: " label-for="card-holder-name" class="mb-4 ">
                                <div v-if="!$v.form.cardHolder.minLength" class="text-danger">Needs to be more than 3 characters</div>
                                <div v-if="!$v.form.cardHolder.maxLength" class="text-danger">Needs to be less than 40</div>
                                <b-form-input id="card-holder-name" v-model="form.cardHolder" type="text" placeholder="Your full name" required> </b-form-input>
                            </b-form-group>
                            <b-form-group label="Card number: " label-for="card-number" class="mb-4">
                                <div v-if="!$v.form.cardNumber.minLength" class="text-danger">Invalid card number</div>
                                <div v-if="!$v.form.cardNumber.numeric" class="text-danger">Accepts only numerics</div>
                                <b-form-input id="card-number" v-model="form.cardNumber" type="text" placeholder="0000 0000 0000 0000" required></b-form-input>
                            </b-form-group>
                            <b-form-row id="row">
                                    <div v-if="!$v.form.expirationMM.numeric" class="text-danger">Needs to be numeric</div>
                                    <div v-if="!$v.form.expirationMM.between" class="text-danger">Invalid date</div>
                                    <b-col>
                                    <b-form-input id="mm" v-model="form.mm" type="text" placeholder="MM" required ></b-form-input>
                                </b-col>
                                <b-col>
                                    <div v-if="!$v.form.expirationYY.numeric" class="text-danger">Needs to be numeric</div>
                                    <div v-if="!$v.form.expirationYY.between" class="text-danger">Invalid date</div>                                    
                                    <b-form-input id="yy" v-model="form.yy" type="text" placeholder="YY" required ></b-form-input>
                                </b-col>
                            </b-form-row><br />
                            <b-form-group label="CVV" label-for="cvv" class="mb-4">
                                    <div v-if="!$v.form.cvv.numeric" class="text-danger">Needs to be numeric</div>
                                    <div v-if="!$v.form.cvv.between" class="text-danger">Invalid type</div>
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
    import {between, minLength, numeric, maxLength} from 'vuelidate/lib/validators';

    export default {
        data() {
            return {
                form: {
                    cardHolder: '',
                    cardNumber: '',
                    expirationMM: '',
                    expirationYY: '',
                    cvv: ''
                },
                errors: []
            }
        },

        validations: {
            form: {
                cardHolder: {
                    minLength: minLength(3),
                    maxLength: maxLength(40)
                },
                cardNumber: {
                    minLength: minLength(16),
                    maxLength: maxLength(16),
                    numeric
                },
                expirationMM: {
                    numeric,
                    between: between('01', '12')
                },
                expirationYY: {
                    numeric,
                    between: between('23', '25')
                    
                },
                cvv: {
                    numeric,
                    between: between('100', '999')
                }
            }
        }
    }
</script>