<template>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-label">
        <div class="modal-dialog {{ size }}" role="document">
            <div class="modal-content">
                <component :is="view" :data="data"></component>
            </div>
        </div>
    </div>

</template>

<script>
    var Hero = require('./hero.vue');

    module.exports = {
        data : function() {
            return {
                view: '',
                size: '',
                data: {}
            }
        },
        components: {
            hero: Hero
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
                this.$set('view', view);
                this.$set('data', data);
                this.setSize(size);
                $(this.$el).modal('show');
            }
        }
    }
</script>
