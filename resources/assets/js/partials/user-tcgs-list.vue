<style lang="scss" scoped>
    #active-tcgs {
        position: relative;
    }
</style>

<template>
    <div id="active-tcgs">
        <table v-if="tcgs.length > 0" class="table">
            <tbody>
                <tr v-for="tcg in tcgs">
                    <td>{{ tcg.name }}</td>
                </tr>
            </tbody>
        </table>
        <div v-else>
            <em>You aren't playing any TCGs! );</em>
        </div>
    </div>
    <preloader></preloader>
</template>

<script>
    var Preloader = require('./preloader.vue');

    module.exports = {
        props: {
            status: {
                type: String
            }
        },
        data: function() {
            return {
                resource: this.$resource(
                    '//api.stash.dev/user/instances',
                    {},
                    {},
                    { xhr: { withCredentials: true } }
                ),
                tcgs: {}
            }
        },
        ready: function() {
            this.resource.get().then(function (response) {
                this.$set('tcgs', response.data);
                this.$broadcast('preloader-remove');
            }, function (response) {
                console.log('error: ', response);
            });
        },
        components: {
            preloader: Preloader
        }
    }
</script>
