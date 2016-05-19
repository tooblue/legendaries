<style lang="scss" scoped>
    $normal: #ffb544;
    $average: #4AA3FF;
    $critical: #FF6161;

    .chart {
        width: 100%;
        height: 175px;
    }

    .results {
        span {
            display: block;
            font-size: 2em;
        }
        &.normal {
            color: lighten($normal, 12%);
            span {
                color: $normal;
            }
        }
        &.average {
            color: lighten($average, 12%);
            span {
                color: $average;
            }
        }
        &.critical {
            color: lighten($critical, 12%);
            span {
                color: $critical;
            }
        }
    }
</style>

<template>
    <h1>Damage Calculator</h1>

    <div class="row">
        <div class="col-sm-3">
            <h2>Hero</h2>
            <form>
                <div class="form-group">
                    <label for="hero-atk">ATK</label>
                    <input type="text" class="form-control" id="hero-atk" placeholder="1000" v-model="heroAtk" number>
                </div>
                <div class="form-group">
                    <label for="hero-cr">Crit Rate</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="hero-cr" placeholder="10" v-model="heroCr" number>
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="hero-cd">Crit Damage</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="hero-cd" placeholder="100" v-model="heroCd" number>
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-3">
            <h2>Skill</h2>
            <form>
                <div class="form-group">
                    <label for="skill-power">Power</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="skill-power" placeholder="180" v-model="skillPwr" number>
                        <div class="input-group-addon">%</div>
                    </div>
                </div>
            </form>

            <h2>Target</h2>
            <form>
                <div class="form-group">
                    <label for="target-def">DEF</label>
                    <input type="text" class="form-control" id="target-def" placeholder="500" v-model="targetDef" number>
                </div>
            </form>
        </div>
        <div class="col-sm-6">
            <h2>Results</h2>
            <div class="row">
                <div class="col-sm-4 results normal">
                    <span>{{ damage }}</span>
                    normal damage
                </div>
                <div class="col-sm-4 results average">
                    <span>{{ avgDamage }}</span>
                    average damage
                </div>
                <div class="col-sm-4 results critical">
                    <span>{{ crDamage }}</span>
                    critical damage
                </div>
            </div>

            <h2>Optimizations</h2>
            <div class="row">
                <div class="col-sm-6">
                    <small class="pull-right">Average Damage with +/- ATK</small>
                    <chart stat="atk" :power="skillPwr" :critdmg="heroCd" :critrate="heroCr" :attack="heroAtk"></chart>
                </div>
                <div class="col-sm-6">
                    <small class="pull-right">Average Damage with +/- Crit Damage</small>
                    <chart stat="cd" :power="skillPwr" :critdmg="heroCd" :critrate="heroCr" :attack="heroAtk"></chart>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    var Chart = require('../partials/damage-optimization-chart.vue');
    var Formulas = require('../mixins/formulas.vue');

    module.exports = {
        mixins: [Formulas],
        components: {
            chart: Chart,
        },
        data : function() {
            return {
                heroAtk: 2926,
                heroCr: 100,
                heroCd: 166,
                skillPwr: 190,
                targetDef: 0,
            }
        },
        computed: {
            damage: function () {
                return this.calculateDamage(this.heroAtk, this.skillPwr);
                //return this.heroAtk * (this.skillPwr/100);
            },
            crDamage: function () {
                return this.calculateCritDamage(this.damage, this.heroCd);
                //this.damage + this.damage * (this.heroCd/100);
            },
            avgDamage: function () {
                return this.calculateAvgDamage(this.damage, this.heroCr, this.crDamage);
                //return ( this.damage * ((100 - this.heroCr)/100) ) + ( this.crDamage * (this.heroCr/100) );
            },
        },
    }
</script>
