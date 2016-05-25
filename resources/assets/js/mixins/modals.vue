<script>
    module.exports = {
        methods: {
            openModal: function (view, size = '') {
                console.log('beep beep');
                this.$dispatch('modal-open', view, size)
            },
        },
    }
</script>
