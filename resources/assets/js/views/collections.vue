<style lang="scss" scoped>
    #component {
        position: relative;
    }
</style>

<template>
    <h1>Collections</h1>

    <a class="btn btn-primary" role="button" href="/new-instance" v-on:click.prevent="$parent.modal($event)">Start a New Collection</a>

    <table v-if="collections.length > 0" class="table">
        <tbody>
            <tr v-for="collection in collections">
                <td>{{ collection.name }}</td>
            </tr>
        </tbody>
    </table>
    <div v-else>
        <em>Nothing to see here!</em>
    </div>
</template>

<script>
    module.exports = {
        data : function() {
            return {
                resource: this.$resource(
                    '//api.stash.dev/user/instances',
                    {},
                    {},
                    { xhr: { withCredentials: true } }
                ),
                collections: {}
            }
        },
        ready: function() {
            this.resource.get().then(function (response) {
                this.$set('collections', response.data);
                this.$broadcast('preloader-remove');
            }, function (response) {
                console.log('error: ', response);
            });
        }
    }
</script>
