<template>

    <h1>Guild Members</h1>

    <div v-if="progress.load"><!-- Loading -->
        <spinner :opts="{color:'#666',shadow:false}"></spinner>
    </div>
    <template v-else><!-- After load -->

        <form class="form-inline form-header" role="search">
            <div class="form-group">
                <input type="search" placeholder="Search" name="search" class="form-control input-primary" v-model="search">
            </div>
        </form>

        <div class="row" v-if="session.guild.members.length !== 0">
            <div class="col-xs-6 col-sm-4 col-md-3" v-for="member in session.guild.members | filterBy search | orderBy 'user.username'">
                <div class="member clearfix">
                    <img v-if="member.user.avatar" class="avatar pull-left" v-bind:src="'https://cdn.discordapp.com/avatars/' + member.user.id + '/' + member.user.avatar + '.jpg'" alt="{{ member.user.username }}">
                    <div v-else class="avatar avatar-temp pull-left"></div>
                    <span class="">{{ member.user.username }}</span>
                </div>
            </div>
        </div>
        <p v-else><em>No members to display! ):</em></p>

    </template>

</template>

<script>
    var View = require('../_view.vue');

    module.exports = {
        extends: View,
        data : function() {
            return {
                session: session,
                search: '',
            }
        },
        methods: {
            init: function () {}
        }
    }
</script>
