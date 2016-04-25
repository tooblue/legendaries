<style lang="scss" scoped>

</style>

<template>
    <h1>Dashboard</h1>

    <div class="row">
        <div class="col-sm-4">
            <h2>Currently Playing</h2>
            <tcgs></tcgs>
        </div>
        <div class="col-sm-4">
            <h2>Stash Updates</h2>
            <stash-updates></stash-updates>
        </div>
        <div class="col-sm-4">
            <h2>Trade Finder</h2>
            <trade-finder></trade-finder>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <h2>Friend Activity</h2>
            <feed-private></feed-private>
        </div>
        <div class="col-sm-4">
            <h2>Forum Topics</h2>
            <forum-topics></forum-topics>
        </div>
    </div>
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
