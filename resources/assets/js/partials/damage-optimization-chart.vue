<style lang="scss">
</style>

<template>
    <canvas class="chart"></canvas>
</template>

<script>
    var Formulas = require('../mixins/formulas.vue');

    module.exports = {
        mixins: [Formulas],
        props: ['stat', 'attack', 'power', 'critdmg', 'critrate'],
        data : function() {
            return {
                chart: {},
                chartData: {
                    labels: [],
                    datasets: [
                        {
                            label: "+/- Crit Damage",
                            fillColor: "rgba(149,100,207,0.2)",
                            strokeColor: "rgba(149,100,207,1)",
                            pointColor: "rgba(149,100,207,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(149,100,207,1)",
                            data: [],
                        }
                    ]
                }
            }
        },
        watch: {
            'datapoint': function () { console.log(this.optimizeAtkData());
                this.chartData.datasets[0].data = this.dataset.data;

                for ( var i=0; i < this.dataset.data.length; i++ ) {
                    this.chart.datasets[0].points[i].value = this.dataset.data[i];
                }

                this.chart.update();
            }
        },
        computed: {
            datapoint: function () {
                return this.calculateDatapoint(this.attack, this.critdmg);
            },
            dataset: function () {
                if ( this.stat == 'atk' ) { return this.optimizeAtkData(); }
                else { return this.optimizeCdData(); }
            }
        },
        ready: function() {
            var ctx = this.$el.getContext("2d");
            this.chartData.labels = this.dataset.labels;
            this.chartData.datasets[0].data = this.dataset.data;
            this.chart = new Chart(ctx).Line(this.chartData, {});
        },
        methods: {
            calculateDatapoint: function (attack, critdmg) {
                var dmg = this.calculateDamage(attack,this.power);
                return this.calculateAvgDamage(
                    dmg,
                    this.critrate,
                    this.calculateCritDamage(dmg, critdmg)
                )
            },
            optimizeAtkData: function () {
                return {
                    labels: ['-30%', '-20%', '-10%', '*', '+10%', '+20%', '+30%'],
                    data: [
                        this.calculateDatapoint(this.attack - (.3 * this.attack), this.critdmg),
                        this.calculateDatapoint(this.attack - (.2 * this.attack), this.critdmg),
                        this.calculateDatapoint(this.attack - (.1 * this.attack), this.critdmg),
                        this.calculateDatapoint(this.attack, this.critdmg),
                        this.calculateDatapoint(this.attack + (.1 * this.attack), this.critdmg),
                        this.calculateDatapoint(this.attack + (.2 * this.attack), this.critdmg),
                        this.calculateDatapoint(this.attack + (.3 * this.attack), this.critdmg)
                    ],
                };
            },
            optimizeCdData: function () {
                return {
                    labels: ['-30%', '-20%', '-10%', '*', '+10%', '+20%', '+30%'],
                    data: [
                        this.calculateDatapoint(this.attack, this.critdmg -30),
                        this.calculateDatapoint(this.attack, this.critdmg -20),
                        this.calculateDatapoint(this.attack, this.critdmg -10),
                        this.calculateDatapoint(this.attack, this.critdmg),
                        this.calculateDatapoint(this.attack, this.critdmg +10),
                        this.calculateDatapoint(this.attack, this.critdmg +20),
                        this.calculateDatapoint(this.attack, this.critdmg +30)
                    ],
                };
            },
        }
    }
</script>
