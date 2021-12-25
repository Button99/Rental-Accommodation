<template>
    <div>
        <h3> Hello {{user.name}}</h3>
        <p> What would you like to do?</p>
        <ul>
            <li><button> Create an accommodation</button></li>
            <br />
            <li><button> View Accommodations </button></li>
            <br />
            <li><button> View your accommodations</button></li>
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
        }
    }
</script>