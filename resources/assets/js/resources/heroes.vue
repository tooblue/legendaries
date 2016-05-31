<script>
    module.exports = {
        data : function() {
            return {
                heroesResource: this.$resource('//' + session.api + '/heroes{/id}',{},{},{ xhr: { withCredentials: true } })
            }
        },
        methods: {
            heroesGet: function(callback) {
                this.heroesResource
                    .get().then(callback, function (response) {
                        console.log('error: ', response);
                    });
            },
            heroesShow: function (id, callback) {
                this.heroesResource
                    .get({id:id}).then(callback, function (response) {
                        console.log('error: ', response);
                    });
            },
            heroesUpdate: function (id, data, callback) {
                this.heroesResource
                    .update({id:id},data).then(callback, function (response) {
                        console.log('error: ', response);
                    });
            },
            heroesDelete: function (id, callback) {
                this.heroesResource
                    .delete({id:id},{_token: this.session.token}).then(callback, function (response) {
                        console.log('error: ', response);
                    });
            },
        }
    }
</script>
