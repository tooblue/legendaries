<template>
    <h1>My Heroes</h1>
    <form class="form-inline form-header">
        <select class="form-control" v-model="newHero">
            <option v-for="hero in book" v-bind:value="{ id: hero.id }">{{ hero.name }}</option>
        </select>
        <button class="btn btn-default btn-header" type="submit"  v-on:click.prevent="createHero">Add</button>
    </form>

    <template v-if="heroes.length !== 0">
        <template v-for="hero in heroes">
            <div class="user-hero clearfix {{ hero.book.attribute.name }}" v-on:click="openModal('hero',{'hero_id':hero.id})">
                <img :src="hero.book.img" class="pull-left">
                <div class="pull-left">
                    <ul>
                        <li><strong>{{ hero.book.name }}</strong></li>
                        <li>ATK <strong>{{ hero.atk }}</strong></li>
                        <li>DEF <strong>{{ hero.def }}</strong></li>
                        <li>HP <strong>{{ hero.hp }}</strong></li>
                        <li>SPD <strong>{{ hero.spd }}</strong></li>
                    </ul>
                </div>
                <div class="pull-right">
                    <ul>
                        <li>CR <strong>{{ hero.cr * 100 }}%</strong></li>
                        <li>CD <strong>{{ hero.cd * 100 }}%</strong></li>
                        <li>PEN <strong>{{ hero.pen * 100 }}%</strong></li>
                        <li>ACC <strong>{{ hero.acc * 100 }}%</strong></li>
                        <li>EVA <strong>{{ hero.eva * 100 }}%</strong></li>
                    </ul>
                </div>
            </div>
        </template>
    </template>
    <p v-else><em>You haven't saved any heroes! ):</em></p>
</template>

<script>
    var Modals = require('../mixins/modals.vue');

    module.exports = {
        mixins: [Modals],
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
