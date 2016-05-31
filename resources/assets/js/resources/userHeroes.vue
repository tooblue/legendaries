<script>
    module.exports = {
        data : function() {
            return {
                userHeroesResource: this.$resource('//' + session.api + '/users/' + session.user.app.id + '/heroes{/id}',{},{},{ xhr: { withCredentials: true } }),
            }
        },
        methods: {
            userHeroesGet: function(callback) {
                this.userHeroesResource
                    .get().then(callback, function (response) {
                        console.log('error: ', response);
                    });
            },
            userHeroesCreate: function(id, callback) {
                this.userHeroesResource
                    .save({},{book_id: id, _token: this.session.token}).then(callback, function (response) {
                        console.log('error: ', response);
                    });
            }
        }
    }
</script>
