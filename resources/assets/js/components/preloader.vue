<style lang="scss">
</style>

<template>
    <div class="preloader fade in"></div>
</template>

<script>
    module.exports = {
        data : function() {
            return {
                msg: "hello from sidebar! :D"
            }
        },
        events: {
            'preloader-remove': function() {
                this.$remove();
            }
        }
    }
</script>
