<script>
    module.exports = {
        read: function(val) {
            return Math.floor(val * 100);
        },
        write: function(val, oldVal) {
            return val / 100;
        }
    }
</script>
