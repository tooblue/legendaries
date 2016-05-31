<script>
    module.exports = {
        data : function() {
            return {
                bookResource: this.$resource('//' + session.api + '/book',{},{},{ xhr: { withCredentials: true } }),
                book: []
            }
        },
        methods: {
            bookGet: function(callback) {
                this.bookResource
                    .get().then(callback, function (response) {
                        console.log('error: ', response);
                    });
            },
        }
    }
</script>
