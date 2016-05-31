<script>
    module.exports = {
        read: function(val) {
            return val;
        },
        write: function(val, oldVal) { console.log(val);
            if (typeof(val) == "number")
                return val;

            return this.$eval(val);
            /*if (typeof(val) == "number") {
                return val
            } else {
                var nums = val.split("+");
                if (nums[0].trim()*1+1 && nums[1].trim()*1+1) {
                    return nums[0].trim()*1 + nums[1].trim()*1;
                } else {
                    alert("INVALID");
                    return oldVal;
                }
            }*/
        }
    }
</script>
