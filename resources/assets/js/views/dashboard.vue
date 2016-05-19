<template>
    <h1>My Heroes</h1>

    <p><em>You haven't saved any heroes! ):</em></p>
</template>

<script>
    module.exports = {
        data : function() {
            return {
                session: session,
            }
        },
        created: function() {
            this.get();
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
