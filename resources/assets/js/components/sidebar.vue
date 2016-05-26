<template>
    <div id="sidebar">
        <div class="list-group">
            <a href="#" class="list-group-item user clearfix">
                <img class="gh-avatar pull-left" v-bind:src="session.userAvatar" alt="{{ session.user.discord.user.username }}">
                <div class="stats pull-right">
                    <p class="usr">{{ session.user.discord.user.username }}</span></p>
                    <p class="bookmark" v-for="role in session.guild.roles | filterBy session.user.discord.roles[0] in 'id'">{{ role.name }}</p>
                    <p class="comment"><strong>3000</strong> posts</p>
                </div>
            </a>
        </div>
        <div class="list-group">
            <a v-link="{name: 'dashboard'}" class="list-group-item">My Heroes <i class="fa fa-users pull-right"></i></a>
            <a v-link="{name: 'calculator'}" class="list-group-item">Damage Calculator <i class="fa fa-calculator pull-right"></i></a>
        </div>
        <div class="list-group">
            <a v-link="{name: 'guild-heroes'}" class="list-group-item">Guild Heroes <i class="fa fa-users pull-right"></i></a>
        </div>
        <preloader></preloader>
    </div>
</template>

<script>
    var Preloader = require('./preloader.vue');

    module.exports = {
        data : function() {
            return {
                session: session,
            }
        },
        components: {
            preloader: Preloader
        },
        ready: function() {
            this.$broadcast('preloader-remove');
        }
    }
</script>
