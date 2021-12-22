<template>
    <div>
        <h3> Hello {{user.name}}</h3>
    </div>
</template>

<script>
    import User from '../helpers/User';
    console.log(User.getName());
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