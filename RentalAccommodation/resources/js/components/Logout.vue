<template>
    
</template>

<script>
import { defineComponent } from '@vue/composition-api'

export default {
    mounted () {
        localStorage.removeItem('token');
        store.commit('logoutUser');
        router.push({name: 'login'});
    }
}
</script>
