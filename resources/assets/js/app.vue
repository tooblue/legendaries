<style lang="scss" scoped>
    .content {
        position: relative;
    }
</style>

<template>
    <div class="content">
        <div class="row">
            <div class="col-sm-9">

                <router-view></router-view>

            </div>
            <div class="col-sm-3">

                <sidebar :user="user"></sidebar>

            </div>
        </div>
    </div>

    <modal></modal>
</template>

<script>
    var nprogress = require('nprogress');

    var Sidebar = require('./partials/sidebar.vue');
    var Modal = require('./partials/modal.vue');

    module.exports = {
        data: function() {
            return {
                session: session,
                progress: nprogress.configure({ parent: '#app' })
            }
        },
        components: {
            sidebar: Sidebar,
            modal: Modal
        },        
        methods: {
            modal: function(event, size) {
                this.$broadcast('modal-open', {event: event, size: size})
            }
        }
    }
</script>
