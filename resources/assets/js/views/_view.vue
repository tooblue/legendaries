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
    var Spinner = require('../components/spinner.vue');

    module.exports = {
        components: {
            spinner: Spinner
        },
        data : function() {
            return {
                session: session,
                progress: progress,
            }
        },
        ready: function() {
            this.init();
        },
        methods: {
            init: function () {},
            reset: function () {}
        }
    }
</script>
