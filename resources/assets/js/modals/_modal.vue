<template>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-label">
        <div v-show="loading"><spinner></spinner></div>

        <div v-show="!loading" class="modal-dialog {{ size }}" role="document">
            <div class="modal-content">
                <component :is="view" :data="data"></component>
            </div>
        </div>
    </div>

</template>

<script>
    var Spinner = require('../components/spinner.vue');

    var Hero = require('./hero.vue');
    var HeroEdit = require('./hero-edit.vue');

    module.exports = {
        data : function() {
            return {
                view: '',
                size: '',
                data: {},
                loading: true
            }
        },
        components: {
            spinner: Spinner,
            hero: Hero,
            'hero-edit': HeroEdit
        },
        methods: {
            setSize: function (size) {
                if ( size === "small" ) { this.$set('size', 'modal-sm'); }
                else if ( size === "large" ) { this.$set('size', 'modal-lg'); }
                else { this.$set('size', ''); }
            }
        },
        events: {
            'modal-open-global': function(view, data = {}, size = '') {
                this.loading = true;
                this.$set('view', '');
                this.$set('view', view);
                this.$set('data', data);
                this.setSize(size);
                $(this.$el).modal('show');
            }
        }
    }
</script>
