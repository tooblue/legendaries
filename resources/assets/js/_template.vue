<style lang="scss" scoped>
    #component {
        position: relative;
    }
</style>

<template>
    <div id="active-tcgs">
        <table v-if="items.length > 0" class="table">
            <tbody>
                <tr v-for="item in items">
                    <td>{{ item.name }}</td>
                </tr>
            </tbody>
        </table>
        <div v-else>
            <em>Nothing to see here!</em>
        </div>
    </div>
    <preloader></preloader>
</template>

<script>
    var Preloader = require('./preloader.vue');

    module.exports = {
        /*props: {
            property: {
                type: String
            }
        },*/
        data : function() {
            return {
                resource: this.$resource(
                    '//api.stash.dev/resource/id',
                    {},
                    {},
                    { xhr: { withCredentials: true } }
                ),
                items: {}
            }
        },
        ready: function() {
            this.resource.get().then(function (response) {
                this.$set('items', response.data);
                this.$broadcast('preloader-remove');
            }, function (response) {
                console.log('error: ', response);
            });
        },
        components: {
            preloader: Preloader
        },
    }
</script>
