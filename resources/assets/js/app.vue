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

    var Sidebar = require('./components/sidebar.vue');
    var Modal = require('./modals/_modal.vue');

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
        events: {
            'modal-open': function(view, size = '') {
                this.$broadcast('modal-open-global', view, size)
            }
        }
    }
</script>
