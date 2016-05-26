<script>
    module.exports = {
        methods: {
            openModal: function (view, data = {}, size = '') {
                this.$dispatch('modal-open', view, data, size)
            },
        },
    }
</script>
