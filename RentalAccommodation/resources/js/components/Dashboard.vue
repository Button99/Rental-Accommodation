<template>
    <div>
        <h3> Hello {{user.name}}</h3>
        <p> What would you like to do?</p>
        <ul style="min-height: 70vh;">
            <li><router-link to="/createAccommodation" class="btn btn-primary"> Be a host</router-link></li>
            <br />
            <li><router-link to="/accommodations" class="btn btn-primary"> View Accommodations </router-link></li>
            <br />
            <li><router-link to="/myAccommodations" class="btn btn-primary"> View your accommodations</router-link></li>
            <br />
        </ul>
    </div>
</template>

<script>
    import User from '../helpers/User';
    
    export default {
        
        data() {
            return {
                user: {
                    name: JSON.parse(JSON.stringify(User.getName())),
                },
                errors: []
            }
        },
    }
</script>