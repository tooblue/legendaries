<script>
    module.exports = {
        params: ['complete'],

        bind: function () {
            this.el.addEventListener(
                'submit', this.onSubmit.bind(this)
            );
        },

        onSubmit: function (e) {
            e.preventDefault();

            var requestType = this.getRequestType();

            this.vm
                .$http[requestType](this.el.action, this.getFormData())
                .then(this.onComplete.bind(this))
                .catch(this.onError.bind(this));
        },

        onComplete: function () {
            this.vm.$emit('ajax-complete');
        },

        onError: function (response) {
            console.log('ajax request failed'); // Use pretty flash message instead.
        },

        getRequestType: function () {
            var method = this.el.querySelector('input[name="_method"]');

            return (method ? method.value : this.el.method).toLowerCase();
        },

        getFormData: function() {
            // You can use $(this.el) in jQuery and you will get the same thing.
            var serializedData = $(this.el).serializeArray();
            var objectData = {};
            $.each(serializedData, function() {
                if (objectData[this.name] !== undefined) {
                    if (!objectData[this.name].push) {
                        objectData[this.name] = [objectData[this.name]];
                    }
                    objectData[this.name].push(this.value || '');
                } else {
                    objectData[this.name] = this.value || '';
                }
            });
            return objectData;
        },
    }
</script>
