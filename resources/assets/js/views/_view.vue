<script>
    var Spinner = require('../components/spinner.vue');

    module.exports = {
        components: {
            spinner: Spinner
        },
        data : function() {
            return {
                session: session,
                progress: progress,
            }
        },
        ready: function() {
            this.init();
        },
        methods: {
            init: function () {},
            reset: function () { this.init(); }
        }
    }
</script>
