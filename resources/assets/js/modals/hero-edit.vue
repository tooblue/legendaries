<template>
    <template v-if="!progress.load">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{ hero.book.name }}</h4>
        </div>

        <div class="modal-body">

            <div class="row">
                <div class="col-sm-4 results normal">
                    <span>{{ damage }}</span>
                    normal damage
                </div>
                <div class="col-sm-4 results average">
                    <span>{{ avgDamage }}</span>
                    average damage
                    &nbsp; <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="top" title="The average damage based on the heroe's normal damage, crit damage, and crit rate."></i>
                </div>
                <div class="col-sm-4 results critical">
                    <span>{{ crDamage }}</span>
                    critical damage
                </div>
            </div>

            <hr>

            <form id="edit-hero">

                <div class="form-group text-center">
                    <div class="hero-grade select-{{hero.grade}}">
                        <template v-for="n in ['6','5','4','3','2','1']">
                            <i class="fa fa-star" value="{{ n }}"
                                v-on:click="hero.grade = n"
                                v-bind:class="{ 'selected': n == hero.grade }">
                            </i>
                        </template>
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-6">

                        <div class="row">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">LVL</span>
                                        <input type="text" class="form-control" placeholder="30" v-model="hero.lvl | eval" number lazy>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">+</span>
                                        <input type="text" class="form-control" placeholder="5" v-model="hero.powerup_lvl | eval" number lazy>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">ATK</span>
                                <input type="text" class="form-control" placeholder="1000" v-model="hero.atk | eval" number lazy>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">DEF</span>
                                <input type="text" class="form-control" placeholder="1000" v-model="hero.def | eval" number lazy>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">HP&nbsp;</span>
                                <input type="text" class="form-control" placeholder="1000" v-model="hero.hp | eval" number lazy>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">SPD</span>
                                <input type="text" class="form-control" placeholder="300" v-model="hero.spd | eval" number lazy>
                            </div>
                        </div>
                    </div><!-- /col -->

                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">CR&nbsp;</span>
                                <input type="text" class="form-control" placeholder="10" v-model="hero.cr | percent | eval" min="10" max="100" number lazy>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">CD&nbsp;</span>
                                <input type="text" class="form-control" placeholder="100" v-model="hero.cd | percent | eval" min="100" number lazy>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">PEN</span>
                                <input type="text" class="form-control" placeholder="0" v-model="hero.pen | percent | eval" number lazy>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">ACC</span>
                                <input type="text" class="form-control" placeholder="0" v-model="hero.acc | percent | eval" number lazy>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">EVA</span>
                                <input type="text" class="form-control" placeholder="10" v-model="hero.eva | percent | eval" number lazy>
                                <span class="input-group-addon">%</span>
                            </div>
                        </div>
                    </div><!-- /col -->

                </div><!-- /row -->
            </form>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left"
                v-on:click="delete"
                :disabled="deleting ? true : null"
                data-toggle="tooltip" data-placement="top" title="Delete Hero">
                    <i v-show="!deleting" class="fa fa-trash-o"></i>
                    <span v-show="deleting"><i class="fa fa-spinner fa-pulse fa-fw"></i></span>
            </button>
            <button type="button" class="btn btn-primary" v-on:click="save" :disabled="updating ? true : null">
                <span v-show="!updating">Save changes</span>
                <span v-show="updating"><i class="fa fa-spinner fa-pulse fa-fw"></i></span>
            </button>
        </div>

    </template>
</template>

<script>
    var Spinner = require('../components/spinner.vue');
    var Percent = require('../filters/percent.vue');
    var Eval = require('../filters/eval.vue');
    var Formulas = require('../mixins/formulas.vue');

    var Heroes = require('../resources/heroes.vue');

    module.exports = {
        mixins: [Heroes,Formulas],
        filters: {
            percent: Percent,
            eval: Eval
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
                progress: modalProgress,
                deleting: false,
                updating: false,
                hero: {},
                skillPower: 1
            }
        },
        computed: {
            damage: function () {
                return this.calculateDamage(this.hero.atk, this.skillPower);
                //return this.heroAtk * (this.skillPwr/100);
            },
            crDamage: function () {
                return this.calculateCritDamage(this.damage, this.hero.cd);
                //this.damage + this.damage * (this.heroCd/100);
            },
            avgDamage: function () {
                return this.calculateAvgDamage(this.damage, this.hero.cr, this.crDamage);
            },
        },
        watch: {
            'data': function () {
                this.reset();
            }
        },
        ready: function () {
            this.init();
        },
        methods: {
            init: function () {
                this.progress.load++;
                this.heroesShow(this.data.hero_id, function(response){
                    this.progress.load--;
                    if ( Object.keys(response.data).length !== 0 )
                        this.$set('hero', response.data);
                });
            },
            reset: function () {
                this.deleting = false;
                this.updating = false;
                this.init();
            },
            save: function () {
                this.updating = true;
                this.heroesUpdate(this.data.hero_id, {
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
                }, function(response){
                    this.$dispatch('hero-update', this.data.hero_id, response.data);
                    $('#modal').modal('hide');
                });
            },
            delete: function () {
                this.deleting = true;
                this.heroesDelete(this.data.hero_id, function(){
                    this.$dispatch('hero-delete', this.data.hero_id);
                    $('.tooltip').tooltip('destroy');
                    $('#modal').modal('hide');
                });
            }
        }
    }
</script>
