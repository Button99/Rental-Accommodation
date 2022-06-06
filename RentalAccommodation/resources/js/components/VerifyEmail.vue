<template>
<p>Your email has been verified!</p>
</template>

<script>
export default {
    created() {
        axios.post('/verifyEmail?vkey=', this.$route.query.vkey)
            .then((res) => {
                console.log(res);
                console.log('user is verified');
            }).catch((err) => {
                console.log(err);
            })
    }

}
</script>