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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>

</template>

<script>
    var Percent = require('../filters/percent.vue');

    module.exports = {
        filters: {
            percent: Percent
        },
        props: {
            data: {
              type: Object,
              required: true
            }
        },
        data: function() {
            return {
                resource: {
                    heroes: this.$resource('//' + session.api + '/heroes{/id}',{},{},{ xhr: { withCredentials: true } })
                },
                hero: {}
            }
        },
        watch: {
            'data': function () {
                this.getHero();
            }
        },
        ready: function () {
            this.getHero();
        },
        methods: {
            getHero: function() {
                this.resource.heroes
                    .get({id:this.data.hero_id}).then(function (response) {
                        if ( Object.keys(response.data).length !== 0 )
                            this.$set('hero', response.data);
                            this.$parent.loading = false;
                    }, function (response) {
                        console.log('error: ', response);
                    });
            }
        }
    }
</script>
