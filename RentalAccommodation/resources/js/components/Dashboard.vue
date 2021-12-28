<template>
    <div>
        <h3> Hello {{user.name}}</h3>
        <p> What would you like to do?</p>
        <ul>
            <!-- <li><router-link to="/createAccommodation" class="btn btn-primary"> Create an accommodation</router-link></li> -->
            <br />
            <li><router-link to="/Accommodations" class="btn btn-primary"> View Accommodations </router-link></li>
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
                    name: User.getName(),
                    data: ''
                },
                errors: []
            }
        },
        mounted() {
            axios.get('api/dashboard', {
                headers: {
                    Authorization: 'Bearer' + localStorage.getItem('token')
                }
            }).then(res => {
                this.name= res.data.data;
            }).catch(err => {
                alert(err);
            })
        }
    }
</script>