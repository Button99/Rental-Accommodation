<template>
    <h1>aa</h1>
</template>

<script>

export default {
    data() {
        return {
            accommodations: []
        }
    },

    created() {
        console.log(this.$router.params.data);
    }
}
</script>
