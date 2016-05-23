<template>
    <h1>My Heroes</h1>
    <button class="btn btn-default btn-header" type="submit">Button</button>
    <select class="form-control">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>

    <p><em>You haven't saved any heroes! ):</em></p>
</template>

<script>
    module.exports = {
        data : function() {
            return {
                session: session,
                progress: this.$parent.progress
            }
        },
        created: function() {
            this.progress.start();
        },
        ready: function() {
            // load authenticated user's data
            this.$resource('//' + this.session.api + '/user-heroes',{},{},{ xhr: { withCredentials: true } })
                .get().then(function (response) {
                    this.$set('user', response.data);
                    this.progress.done();
                }, function (response) {
                    console.log('error: ', response);
                });
        },
        methods: {
            get: function() {
                // ajax request to fetch resource
            },
            delete: function() {
                // ajax request to delete resource
            }
        }
    }
</script>
