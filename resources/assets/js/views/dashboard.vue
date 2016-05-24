<template>
    <h1>My Heroes</h1>
    <form class="form-inline form-header">
        <select class="form-control" v-model="newHero">
            <option v-for="hero in heroes" v-bind:value="{ id: hero.id }">{{ hero.name }}</option>
        </select>
        <button class="btn btn-default btn-header" type="submit"  v-on:click.prevent="createUserHero">Add</button>
    </form>

    <template v-if="userHeroes.length !== 0">
        <div v-for="hero in userHeroes" class="user-hero clearfix {{ hero.hero.attribute.name }}">
            <img :src="'/img/heroes/' + hero.hero.name | lowercase + '.png'" class="pull-left">
            <div class="pull-left">
                <ul>
                    <li><strong>{{ hero.hero.name }}</strong></li>
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
    <p v-else><em>You haven't saved any heroes! ):</em></p>
</template>

<script>
    module.exports = {
        data : function() {
            return {
                session: session,
                progress: this.$parent.progress,
                resource: {
                    'userHeroes': this.$resource('//' + session.api + '/users/' + session.user.app.id + '/heroes{/id}',{},{},{ xhr: { withCredentials: true } }),
                    'heroes': this.$resource('//' + session.api + '/heroes',{},{},{ xhr: { withCredentials: true } })
                },
                heroes: [],
                userHeroes: [],
                newHero: {
                    'id': 1
                }
            }
        },
        created: function() {
            this.progress.start();
        },
        ready: function() {
            this.getUserHeroes();
            this.getHeroes();
        },
        methods: {
            getUserHeroes: function() {
                this.resource.userHeroes
                    .get().then(function (response) {
                        if ( Object.keys(response.data).length !== 0 )
                            this.$set('userHeroes', response.data);
                        this.progress.done();
                    }, function (response) {
                        console.log('error: ', response);
                    });
            },
            createUserHero: function() {
                this.resource.userHeroes
                    .save({},{hero_id: this.newHero.id, _token: this.session.token}).then(function (response) {
                        this.userHeroes.push(response.data);
                        this.progress.done();
                    }, function (response) {
                        console.log('error: ', response);
                    });
            },
            getHeroes: function() {
                this.resource.heroes
                    .get().then(function (response) {
                        this.$set('heroes', response.data);
                        this.progress.done();
                    }, function (response) {
                        console.log('error: ', response);
                    });
            }
        }
    }
</script>
