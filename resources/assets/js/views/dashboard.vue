<template>
    <h1>My Heroes</h1>
    <form class="form-inline form-header">
        <select class="form-control input-primary" v-model="newHero">
            <option v-for="hero in book" v-bind:value="{ id: hero.id }">{{ hero.name }}</option>
        </select>
        <button class="btn btn-primary btn-header" type="submit"  v-on:click.prevent="createHero">Add</button>
    </form>

    <template v-if="heroes.length !== 0">
        <template v-for="hero in heroes | orderBy 'level' 'grade' 'book.attribute.name' -1">
            <hero :hero="hero" :edit="true" :show-user="false"></hero>
        </template>
    </template>
    <p v-else><em>You haven't saved any heroes! ):</em></p>
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
                    'heroes': this.$resource('//' + session.api + '/users/' + session.user.app.id + '/heroes{/id}',{},{},{ xhr: { withCredentials: true } }),
                    'book': this.$resource('//' + session.api + '/book',{},{},{ xhr: { withCredentials: true } })
                },
                book: [],
                heroes: [],
                newHero: {
                    'id': 1
                }
            }
        },
        created: function() {
            this.progress.start();
        },
        ready: function() {
            this.getHeroes();
            this.getBook();
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
            },
            createHero: function() {
                this.resource.heroes
                    .save({},{book_id: this.newHero.id, _token: this.session.token}).then(function (response) {
                        this.heroes.push(response.data);
                        this.progress.done();
                    }, function (response) {
                        console.log('error: ', response);
                    });
            },
            getBook: function() {
                this.resource.book
                    .get().then(function (response) {
                        this.$set('book', response.data);
                        this.progress.done();
                    }, function (response) {
                        console.log('error: ', response);
                    });
            }
        }
    }
</script>
