<template>
    <h1>Guild Heroes</h1>
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

<script>
    var Hero = require('../components/hero.vue');

    module.exports = {
        components: {
            hero: Hero
        },
        data : function() {
            return {
                session: session,
                progress: this.$parent.progress,
                resource: {
                    'heroes': this.$resource('//' + session.api + '/heroes',{},{},{ xhr: { withCredentials: true } })
                },
                heroes: [],
                search: ''
            }
        },
        created: function() {
            this.progress.start();
        },
        ready: function() {
            this.getHeroes();
        },
        methods: {
            getHeroes: function() {
                this.resource.heroes
                    .get().then(function (response) {
                        if ( Object.keys(response.data).length !== 0 )
                            this.$set('heroes', response.data);
                        this.progress.done();
                    }, function (response) {
                        console.log('error: ', response);
                    });
            }
        }
    }
</script>
