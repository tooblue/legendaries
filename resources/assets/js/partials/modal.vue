<template>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-label">
        <div class="modal-dialog {{ size }}" role="document">
            <div class="modal-content">
                <component :is="view"></component>
            </div>
        </div>
    </div>

</template>

<script>
    var Hero = require('./hero.vue');

    module.exports = {
        data : function() {
            return {
                view: 'hero',
                size: ''
            }
        },
        components: {
            hero: Hero
        },
        methods: {
            setSize: function (size) {
                if ( size === "small" ) { this.$set('size', 'modal-sm'); }
                else if ( size === "large" ) { this.$set('size', 'modal-lg');  }
                else { this.$set('size', '');  }
            }
        },
        events: {
            'modal-open-global': function(view, size = '') {
                console.log('modal.vue');
                this.$set('view', view);
                this.setSize(size);
            }
        }
    }
</script>
