<script>
    module.exports = {
        methods: {
            calculateDamage: function (heroAtk, skillPwr) {
                return Math.round(heroAtk * (skillPwr/100));
            },
            calculateCritDamage: function (damage, heroCd) {
                return Math.round(damage + damage * (heroCd/100));
            },
            calculateAvgDamage: function (damage, heroCr, crDamage) {
                return Math.round(( damage * ((100 - heroCr)/100) ) + ( crDamage * (heroCr/100) ));
            },
        },
    }
</script>
