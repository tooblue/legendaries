<template>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-label">
        <div v-show="progress.load"><spinner></spinner></div>

        <div v-show="!progress.load" class="modal-dialog {{ size }}" role="document">
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
    var HeroAdd = require('./hero-add.vue');

    module.exports = {
        data : function() {
            return {
                progress: modalProgress,
                view: '',
                size: '',
                data: {},
            }
        },
        components: {
            spinner: Spinner,
            hero: Hero,
            'hero-edit': HeroEdit,
            'hero-add': HeroAdd
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
                this.$set('view', '');
                this.$set('view', view);
                this.$set('data', data);
                this.setSize(size);
                $(this.$el).modal('show');
            }
        }
    }
</script>
