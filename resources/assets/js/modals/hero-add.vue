<template>
    <template v-if="!progress.load">

        <div class="modal-body">

            <form>
                <div class="form-group has-feedback no-margins">
                    <input class="form-control input-primary"
                        autocomplete="false"
                        placeholder="Type a hero name..."
                        :disabled="saving ? true : null"
                        v-model="query"
                        debounce="500"
                        @submit.prevent
                        autofocus>
                    <i v-show="saving" class="fa fa-spinner fa-pulse fa-fw form-control-feedback" aria-hidden="true"></i>

                    <ul class="typeahead list-group" v-show="book.length > 0 && query.length > 0 && !saving">
                        <li class="list-group-item clearfix"
                            v-for="hero in book | filterBy query in 'name'| limitBy 5"
                            @click="create(hero)">
                            <span class="pull-left">{{ hero.name }}</span>
                            <img v-bind:src="hero.img" class="pull-right">
                        </li>
                    </ul>
                </div>
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
                query: ''
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
            create: function (hero) {
                this.query = hero.name;
                this.saving = true;
                this.userHeroesCreate(hero.id, function(response){
                    this.saving = false;
                    this.$dispatch('hero-add', response.data);
                    $('#modal').modal('hide');
                });
            }
        }
    }
</script>
