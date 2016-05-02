<style lang="scss" scoped>

</style>

<template>
    <h1>My Heroes</h1>

    <p><em>You haven't saved any heroes! ):</em></p>
</template>

<script>
    var Tcgs = require('../partials/user-tcgs-list.vue');

    module.exports = {
        data : function() {
            return {
                msg: ""
            }
        },
        components: {
            tcgs: Tcgs
        },
        created: function() {
            this.get();
        },
        methods: {
            get: function() {
                // ajax request to fetch resource
            },
            delete: function() {
                // ajax request to delete resource
            }
        }
    }
</script>
