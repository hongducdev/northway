(function ($) {
    var pxl_widget_progressbar_handler = function ($scope, $) {
        elementorFrontend.waypoint(
            $scope.find(".pxl--progressbar"),
            function () {
                var $this = $(this);
                var percent = $this.data("valuetransitiongoal");

                var $wrapper = $this.parent();
                var wrapperWidth = $wrapper.width();
                var targetWidth = (wrapperWidth * percent) / 100 - 10;

                $this.animate(
                    {
                        width: targetWidth + "px",
                    },
                    {
                        duration: 1000,
                        easing: "swing",
                        step: function (now, fx) {
                            $this.attr(
                                "data-valuenow",
                                Math.round((now / wrapperWidth) * 100)
                            );
                        },
                        complete: function () {
                            $this.attr("data-valuenow", percent);
                        },
                    }
                );
            }
        );
    };

    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_progressbar.default",
            pxl_widget_progressbar_handler
        );
    });
})(jQuery);
