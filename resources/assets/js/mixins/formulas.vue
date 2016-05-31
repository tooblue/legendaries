<script>
    module.exports = {
        methods: {
            calculateDamage: function (heroAtk, skillPwr) {
                return Math.round(heroAtk * skillPwr);
            },
            calculateCritDamage: function (damage, heroCd) {
                return Math.round(damage + damage * heroCd);
            },
            calculateAvgDamage: function (damage, heroCr, crDamage) {
                return Math.round(( damage * (1 - heroCr) ) + ( crDamage * heroCr ));
            },
        },
    }
</script>
