<template>
    <div>
        <h3> Hello {{user.name}}</h3>
        <p> What would you like to do?</p>
        <ul>
            <li><router-link to="/#" class="btn btn-default"> Create an accommodation</router-link></li>
            <br />
            <li><router-link to="/#" class="btn btn-default"> View Accommodations </router-link></li>
            <br />
            <li><router-link to="/#" class="btn btn-default"> View your accommodations</router-link></li>
            <li><router-link to="/logout">Logout</router-link></li>
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
                    password: ''
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