<template>
    <div class="user-hero clearfix {{ hero.book.attribute.name }}"
        v-on:click="openModal(modal,{'hero_id':hero.id})"
        data-toggle="tooltip" data-placement="left" title="{{ hero.book.name }}">
        <span class="user" v-if="showUser" v-for="member in session.guild.members | filterBy hero.user.discord_id in 'user.id'">
            {{ member.user.username }}
        </span>
        <div class="pull-left">
            <span v-bind:class="{ 'grade': true, 'legendary': hero.book.legendary }">
                <i v-for="n in hero.grade" class="fa fa-star"></i>
            </span>
            <img :src="hero.book.img" class="img-responsive">
        </div>
        <div class="pull-left">
            <ul>
                <li>LVL <strong>{{ hero.lvl }}</strong> &nbsp; <span v-if="hero.powerup_lvl">+{{ hero.powerup_lvl }}</span></li>
                <li>A <strong>{{ hero.atk }}</strong></li>
                <li>D <strong>{{ hero.def }}</strong></li>
                <li>H <strong>{{ hero.hp }}</strong></li>
                <li>S <strong>{{ hero.spd }}</strong></li>
            </ul>
        </div>
        <div class="pull-right">
            <ul>
                <li>CR&nbsp; <strong>{{ hero.cr * 100 }}%</strong></li>
                <li>CD&nbsp; <strong>{{ hero.cd * 100 }}%</strong></li>
                <li>PEN <strong>{{ hero.pen * 100 }}%</strong></li>
                <li>ACC <strong>{{ hero.acc * 100 }}%</strong></li>
                <li>EVA <strong>{{ hero.eva * 100 }}%</strong></li>
            </ul>
        </div>
        <div class="tags">
            <template v-for="tag in hero.tags">
                <div v-bind:style="{ backgroundColor: '#' + tag.color }"
                    data-toggle="tooltip" data-placement="bottom" title="{{ tag.name }}">
                    {{ tag.short_name }}
                </div>
            </template>
        </div>
    </div>
</template>

<script>
    var Modals = require('../mixins/modals.vue');

    module.exports = {
        mixins: [Modals],
        props: {
            hero: {
                type: Object,
                required: true
            },
            edit: {
                type: Boolean,
                default: false
            },
            'show-user': {
                type: Boolean,
                default: true
            }
        },
        computed: {
            modal: function () {
                if ( this.edit === true ) { return 'hero-edit'; }
                else { return 'hero'; }
            }
        },
        data: function() {
            return {
                session: session
            }
        },
        events: {
            'hero-update-global': function(hero_id, hero) {
                if ( this.hero.id == hero_id )
                    this.$set('hero', hero);
            },
            'hero-delete-global': function(hero_id) {
                if ( this.hero.id == hero_id )
                    this.$remove();
            }
        }
    }
</script>
