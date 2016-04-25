<style lang="scss" scoped>

</style>

<template>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal-label">
        <div class="modal-dialog {{ size }}" role="document">
            <div class="modal-content">
                {{{ content }}}
            </div>
        </div>
    </div>

</template>

<script>
    module.exports = {
        data : function() {
            return {
                preloader: "Loading...",
                content: this.preloader,
                modal: {
                    event: {},
                    size: ''
                },
            }
        },
        computed: {
            path: function () {
                if(this.modal.event.target.pathname.substr(0,1) === '/') {
                    return this.modal.event.target.pathname.substr(1);
                }
                else { return this.modal.event.target.pathname; }
            },
            size: function () {
                if ( this.modal.size === "small" ) { return 'modal-sm'; }
                else if ( this.modal.size === "large" ) { return 'modal-lg'; }
                else { return ''; }
            }
        },
        http: {
            root: '/modal'
        },
        methods: {
            load: function() {
                this.$http.get(this.path).then(function (response) {
                    this.$set('content', response.data);
                    $('#modal').modal();
                }, function (response) {
                    console.log('error: ', response.status, response.headers(), response.data);
                });
            }
        },
        events: {
            'modal-open': function(modal) {
                this.$set('content', this.preloader);
                this.$set('modal', modal);
                this.load();
            }
        }
    }
</script>
