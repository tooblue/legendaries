<template>

    <h1>Guild Heroes</h1>

    <div v-if="progress.load"><!-- Loading -->
        <spinner :opts="{color:'#666',shadow:false}"></spinner>
    </div>
    <template v-else><!-- After load -->

        <form class="form-inline form-header" role="search">
            <div class="form-group">
                <input type="search" placeholder="Search" name="search" class="form-control input-primary" v-model="search">
            </div>
        </form>

        <template v-if="heroes.length !== 0">
            <template v-for="hero in heroes | filterBy search | orderBy 'level' 'grade' 'book.attribute.name' -1">
                <hero :hero="hero"></hero>
            </template>
        </template>
        <p v-else><em>No heroes to display! ):</em></p>

    </template>

</template>

<script>
    var View = require('../_view.vue');
    var Hero = require('../../components/hero.vue');

    var Heroes = require('../../resources/heroes.vue');

    module.exports = {
        extends: View,
        mixins: [Heroes],
        components: {
            hero: Hero
        },
        data : function() {
            return {
                search: '',
                heroes: []
            }
        },
        methods: {
            init: function () {
                progress.load++;
                this.heroesGet(function(response){
                    progress.load--;
                    if ( Object.keys(response.data).length !== 0 )
                        this.$set('heroes', response.data);
                });
            }
        }
    }
</script>
