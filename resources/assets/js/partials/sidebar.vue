<template>
    <div id="sidebar">
        <div class="list-group">
            <a href="#" class="list-group-item user clearfix">
                <img class="gh-avatar pull-left" src="http://www.gravatar.com/avatar/cea457c1532392c1b3c4e073b1739dc1?d=identicon&amp;f=y" alt="">
                <div class="stats pull-right">
                    <p class="usr">{{ user.name }}</span></p>
                    <p class="bookmark"><em>{{ user.group.name }}</em></span></p>
                    <p class="comment"><strong>3000</strong> posts</p>
                </div>
            </a>
        </div>
        <div class="list-group">
            <a v-link="{name: 'dashboard'}" class="list-group-item">Dashboard <i class="fa fa-tachometer pull-right"></i></a>
            <a v-link="{name: 'inbox'}" class="list-group-item">Inbox <span class="badge">14</span></a>
            <a v-link="{name: 'collections'}" class="list-group-item">Collections <i class="fa fa-th-large pull-right"></i></a>
            <a v-link="{name: 'friends'}" class="list-group-item">Friends <i class="fa fa-heart pull-right"></i></a>
            <a v-link="{name: 'settings'}" class="list-group-item">Settings <i class="fa fa-cog pull-right"></i></a>
        </div>
        <preloader></preloader>
    </div>
</template>

<script>
    var Preloader = require('./preloader.vue');

    module.exports = {
        data : function() {
            return {
                msg: "hello from sidebar! :D"
            }
        },
        props: ['user'],
        components: {
            preloader: Preloader
        },
        ready: function() {
            this.$broadcast('preloader-remove');
        }
    }
</script>
