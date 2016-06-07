<template>
    <div id="sidebar">
        <div class="list-group">
            <a href="#" class="hidden-xs list-group-item user clearfix">
                <img class="gh-avatar pull-left" v-bind:src="session.userAvatar" alt="{{ session.user.discord.user.username }}">
                <div class="stats pull-right">
                    <p class="usr">{{ session.user.discord.user.username }}</span></p>
                    <p class="rank" v-for="role in session.guild.roles | filterBy session.user.discord.roles[0] in 'id'">{{ role.name }}</p>
                </div>
            </a>
            <a v-link="{name: 'dashboard', exact: true}" class="list-group-item">My Heroes <i class="fa fa-shield pull-right"></i></a>
        </div>

        <div class="list-group">
            <a v-link="{name: 'guild-members'}" class="list-group-item">Guild Members <i class="fa fa-users pull-right"></i></a>
            <a v-link="{name: 'guild-heroes'}" class="list-group-item">Guild Heroes <i class="fa fa-shield pull-right"></i></a>
        </div>
    </div>
</template>

<script>
    module.exports = {
        data : function() {
            return {
                session: session,
            }
        }
    }
</script>
