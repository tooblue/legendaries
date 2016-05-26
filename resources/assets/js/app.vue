<template>
    <div class="content">
        <div class="row">
            <div class="col-sm-9 content-left">

                <router-view></router-view>

            </div>
            <div class="col-sm-3">

                <sidebar></sidebar>

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
        ready: function () {
            // Initialize Bootstrap tooltips
            $('#app').tooltip({selector: '[data-toggle="tooltip"]'});
        },
        events: {
            'modal-open': function(view, data = {}, size = '') {
                this.$broadcast('modal-open-global', view, data, size)
            }
        }
    }
</script>
