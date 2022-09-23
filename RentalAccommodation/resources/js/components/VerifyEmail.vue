<template>
    <div class="verify-layout">
        <h2>Your email has been verified!</h2>
        <p>You can now Log in</p>
    </div>
</template>

<script>
export default {

    created() {
        User.verifyUser(this.$route.query.vkey);
    },
}
</script>