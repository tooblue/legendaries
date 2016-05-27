<template>
    <span></span>
</template>

<script>
    module.exports = {
        props: {
            opts: {
              type: Object,
              default: function() { return {} }
            }
        },
        data : function() {
            return {
                spinner: {},
                defaultOpts: {
                    lines: 7 // The number of lines to draw
                    , length: 0 // The length of each line
                    , width: 3 // The line thickness
                    , radius: 9 // The radius of the inner circle
                    , scale: 2.25 // Scales overall size of the spinner
                    , corners: 1 // Corner roundness (0..1)
                    , color: '#fff' // #rgb or #rrggbb or array of colors
                    , opacity: 0.25 // Opacity of the lines
                    , rotate: 0 // The rotation offset
                    , direction: 1 // 1: clockwise, -1: counterclockwise
                    , speed: 1 // Rounds per second
                    , trail: 79 // Afterglow percentage
                    , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
                    , zIndex: 2e9 // The z-index (defaults to 2000000000)
                    , className: 'spinner' // The CSS class to assign to the spinner
                    , top: '50%' // Top position relative to parent
                    , left: '50%' // Left position relative to parent
                    , shadow: true // Whether to render a shadow
                    , hwaccel: false // Whether to use hardware acceleration
                    , position: 'absolute' // Element positioning
                }
            }
        },
        ready: function () {
            this.init();
        },
        methods: {
            init: function () {
                var opts = this.extend(this.opts,this.defaultOpts);
                this.spinner = new Spinner(opts).spin( $(this.$el).parent()[0] );
            },
            extend: function (customOpts, defaultOpts) {
                var opts = {};
                for (var attrname in defaultOpts) { opts[attrname] = defaultOpts[attrname]; }
                for (var attrname in customOpts) { opts[attrname] = customOpts[attrname]; }
                return opts;
            }
        }
    }
</script>
