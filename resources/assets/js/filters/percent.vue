<script>
    module.exports = {
        read: function(val) {
            return val * 100;
        },
        write: function(val, oldVal) {
            return val / 100;
        }
    }
</script>
