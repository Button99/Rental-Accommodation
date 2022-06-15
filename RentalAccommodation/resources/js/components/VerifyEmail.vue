<template>
<p>Your email has been verified!</p>
</template>

<script>
export default {

    created() {
        // , this.$route.query.vkey
        console.log(this.$route.query.vkey)
        User.verifyUser(this.$route.query.vkey);
    },
}
</script>