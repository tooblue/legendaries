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
    var Sidebar = require('./components/sidebar.vue');
    var Modal = require('./modals/_modal.vue');

    module.exports = {
        data: function() {
            return {
                session: session,
                progress: progress
            }
        },
        components: {
            sidebar: Sidebar,
            modal: Modal
        },
        watch: {
            'progress.load': function (val, oldVal) {
                if ( !val ) {
                    this.progress.total = 0;
                    this.progress.bar.done();
                } else {
                    if ( val > oldVal )
                        this.progress.total++;
                    this.progress.bar.set( (this.progress.total - val) / this.progress.total );
                }
            }
        },
        ready: function () {
            // Initialize Bootstrap tooltips
            $('#app').tooltip({selector: '[data-toggle="tooltip"]', container: 'body'});
        },
        events: {
            'modal-open': function(view, data = {}, size = '') {
                this.$broadcast('modal-open-global', view, data, size)
            },
            'hero-add': function(hero) {
                this.$broadcast('hero-add-global', hero)
            },
            'hero-update': function(hero_id, hero) {
                this.$broadcast('hero-update-global', hero_id, hero)
            },
            'hero-delete': function(hero_id) {
                this.$broadcast('hero-delete-global', hero_id)
            }
        }
    }
</script>
