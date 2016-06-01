<template>

    <h1>My Heroes</h1>

    <div v-if="progress.load"><!-- Loading -->
        <spinner :opts="{color:'#666',shadow:false}"></spinner>
    </div>
    <template v-else><!-- After load -->

        <form class="form-inline form-header" role="search">
            <div class="form-group">
                <input type="search" placeholder="Search" name="search" class="form-control input-primary" v-model="search">
            </div>
        </form>

        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 user-hero add clearfix"
                v-on:click="openModal('hero-add',{},'small')">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </div>
            <template v-if="heroes.length !== 0">
                <div class="col-xs-6 col-sm-4 col-md-3" v-for="hero in heroes | filterBy search | orderBy 'level' 'grade' 'book.attribute.name' -1">
                    <hero :hero.sync="hero" :edit="true" :show-user="false"></hero>
                </div>
            </template>
        </div>

    </template>

</template>

<script>
    var View = require('./_view.vue');
    var Modals = require('../mixins/modals.vue');
    var Hero = require('../components/hero.vue');

    var UserHeroes = require('../resources/userHeroes.vue');

    module.exports = {
        extends: View,
        mixins: [UserHeroes,Modals],
        components: {
            hero: Hero
        },
        data : function() {
            return {
                heroes: [],
            }
        },
        methods: {
            init: function () {
                this.progress.load++;
                this.userHeroesGet(function(response){
                    this.progress.load--;
                    if ( Object.keys(response.data).length !== 0 )
                        this.$set('heroes', response.data);
                });
            },
            reset: function () {
                this.init();
            }
        },
        events: {
            'hero-add-global': function(hero) {
                this.heroes.push(hero);
            },
        }
    }
</script>
