<template>
    <div class="search-layout">
        <div class="container-fluid w-25 p-3 h-75">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="card m-4">
                    <h3 class="card-header d-flex color-light h-75">Search</h3>
                    <div class="card-body text-left h-75 m-5">
                        <form action="#" @submit.prevent="search()">
                            <div class="form-outline mb-3">
                                <label for="Location" class="form-label"> 
                                    Location:
                                </label>
                                <br />
                            <!-- Should find a way to store the locations -->
                                <input type="text" name="Location" id="location" class="form-control" />
                            </div>
                            <div class="form-outline mb-3">
                                <label for="checkIn" class="form-label"> 
                                    Check in:
                                </label>
                                <br />
                            
                                <input type="text" name="checkIn" id="checkIn" class="form-control" />
                            </div>
                            <div class="form-outline mb-3">
                                <label for="checkOut" class="form-label"> 
                                    Check out:
                                </label>
                                <br />
                                <input type="text" name="checkOut" id="checkOut" class="form-control" />
                            </div>
                            <div class="form-outline mb-3">
                                <label for="guests" class="form-label"> 
                                    Guests:
                                </label>
                                <br />
                                <input type="text" name="guests" id="guests" class="form-control" />
                            </div>
                            <div class="form-outline mb-3">
                                <label for="rooms" class="form-label"> 
                                    Rooms:
                                </label>
                                <br />
                                <input type="text" name="rooms" id="rooms" class="form-control" />
                            </div>
                            <button type="submit" class="submit btn btn-primary text-uppercase fw-bold">Search </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    location: '',
                    checkIn: '',
                    checkOut: '',
                    guests: '',
                    rooms: ''
                },
                errors: []
            }
        }
    }
</script>