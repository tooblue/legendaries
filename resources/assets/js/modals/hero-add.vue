<template>
    <template v-if="!progress.load">

        <div class="modal-body">

            <form class="form-inline">
                <select class="form-control input-primary" v-model="heroesNew">
                    <option v-for="hero in book" v-bind:value="{ id: hero.id }">{{ hero.name }}</option>
                </select>
                <button class="btn btn-primary btn-header" type="submit" v-on:click.prevent="create" :disabled="updating ? true : null">
                    <span v-show="!saving">Add</span>
                    <span v-show="saving"><i class="fa fa-spinner fa-pulse fa-fw"></i></span>
                </button>
            </form>

        </div>

    </template>
</template>

<script>
    var Spinner = require('../components/spinner.vue');

    var UserHeroes = require('../resources/userHeroes.vue');
    var Book = require('../resources/book.vue');

    module.exports = {
        mixins: [Book, UserHeroes],
        components: {
            spinner: Spinner
        },
        props: {
            data: {
              type: Object,
              required: true,
            }
        },
        data: function() {
            return {
                session: session,
                progress: modalProgress,
                saving: false,
                book: [],
                heroesNew: { 'id': 0 }
            }
        },
        ready: function () {
            this.init();
        },
        methods: {
            init: function () {
                this.progress.load++;
                this.bookGet(function(response){
                    this.progress.load--;
                    this.$set('book', response.data);
                });
            },
            reset: function () {
                this.saving = false;
                this.init();
            },
            create: function () {
                this.saving = true;
                this.userHeroesCreate(this.heroesNew.id, function(response){
                    this.saving = false;
                    this.$dispatch('hero-add', response.data);
                    $('#modal').modal('hide');
                });
            }
        }
    }
</script>
