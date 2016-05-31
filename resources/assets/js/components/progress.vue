<script>
    module.exports = {
        data: function() {
            return {
                progress: progress
            }
        },
        watch: {
            'progress.load': function (val, oldVal) {
                if ( val == 0 ) {
                    this.progress.bar.done();
                } else {
                    if ( val > oldVal )
                        this.progress.total++;

                    this.progress.bar.set( val / this.progress.total );
                }
            }
        }
    }
</script>
