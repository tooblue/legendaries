<template>

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">{{ hero.book.name }}</h4>
    </div>

    <div class="modal-body">

        <form id="edit-hero">
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">LVL</span>
                            <input type="text" class="form-control" placeholder="30" v-model="hero.lvl" number>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">+</span>
                            <input type="text" class="form-control" placeholder="5" v-model="hero.powerup_lvl" number>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">ATK</span>
                            <input type="text" class="form-control" placeholder="1000" v-model="hero.atk" number>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">DEF</span>
                            <input type="text" class="form-control" placeholder="1000" v-model="hero.def" number>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">HP&nbsp;</span>
                            <input type="text" class="form-control" placeholder="1000" v-model="hero.hp" number>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">SPD</span>
                            <input type="text" class="form-control" placeholder="300" v-model="hero.spd" number>
                        </div>
                    </div>
                </div><!-- /col -->

                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Grade</span>
                            <input type="text" class="form-control" placeholder="30" v-model="hero.grade" number>
                            <span class="input-group-addon">
                                <span v-bind:class="{ 'grade': true, 'legendary': hero.book.legendary }">
                                    <i v-for="n in hero.grade" class="fa fa-star"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">CR&nbsp;</span>
                            <input type="text" class="form-control" placeholder="10" v-model="hero.cr | percent" number>
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">CD&nbsp;</span>
                            <input type="text" class="form-control" placeholder="100" v-model="hero.cd | percent" number>
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">PEN</span>
                            <input type="text" class="form-control" placeholder="0" v-model="hero.pen | percent" number>
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">ACC</span>
                            <input type="text" class="form-control" placeholder="0" v-model="hero.acc | percent" number>
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">EVA</span>
                            <input type="text" class="form-control" placeholder="10" v-model="hero.eva | percent" number>
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                </div><!-- /col -->

            </div><!-- /row -->
        </form>

    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left"
            v-on:click="deleteHero"
            :disabled="deleting ? true : null"
            data-toggle="tooltip" data-placement="top" title="Delete Hero">
                <i v-show="!deleting" class="fa fa-trash-o"></i>
                <span v-show="deleting"><i class="fa fa-spinner fa-pulse fa-fw"></i></span>
        </button>
        <button type="button" class="btn btn-primary" v-on:click="updateHero" :disabled="updating ? true : null">
            <span v-show="!updating">Save changes</span>
            <span v-show="updating"><i class="fa fa-spinner fa-pulse fa-fw"></i></span>
        </button>
    </div>

</template>

<script>
    var Spinner = require('../components/spinner.vue');
    var Percent = require('../filters/percent.vue');

    module.exports = {
        filters: {
            percent: Percent
        },
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
                resource: {
                    heroes: this.$resource('//' + session.api + '/heroes{/id}',{},{},{ xhr: { withCredentials: true } })
                },
                hero: {},
                deleting: false,
                updating: false,
            }
        },
        watch: {
            'data': function () {
                this.reset();
            }
        },
        ready: function () {
            this.getHero();
        },
        methods: {
            reset: function () {
                this.deleting = false;
                this.updating = false;
                this.getHero();
            },
            getHero: function () {
                this.resource.heroes
                    .get({id:this.data.hero_id}).then(function (response) {
                        if ( Object.keys(response.data).length !== 0 )
                            this.$set('hero', response.data);
                            this.$parent.loading = false;
                    }, function (response) {
                        console.log('error: ', response);
                    });
            },
            updateHero: function () {
                this.updating = true;
                this.resource.heroes
                    .update({id:this.data.hero_id},{
                        lvl: this.hero.lvl,
                        powerup_lvl: this.hero.powerup_lvl,
                        grade: this.hero.grade,
                        atk: this.hero.atk,
                        def: this.hero.def,
                        hp: this.hero.hp,
                        spd: this.hero.spd,
                        cr: this.hero.cr,
                        cd: this.hero.cd,
                        pen: this.hero.pen,
                        acc: this.hero.acc,
                        eva: this.hero.eva,
                        _token: this.session.token
                    }).then(function (response) {
                        this.$dispatch('hero-update', this.data.hero_id, this.hero);
                        $('#modal').modal('hide');
                    }, function (response) {
                        console.log('error: ', response);
                    });
            },
            deleteHero: function () {
                this.deleting = true;
                this.resource.heroes
                    .delete({id:this.data.hero_id},{_token: this.session.token}).then(function (response) {
                        this.$dispatch('hero-delete', this.data.hero_id);
                        $('#modal').modal('hide');
                    }, function (response) {
                        console.log('error: ', response);
                    });
            },
        }
    }
</script>
