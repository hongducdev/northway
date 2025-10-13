(function ($) {
    function calculateOptimalRepeatCount($container, $originalSvg) {
        var containerWidth = $container.width();
        var svgWidth = $originalSvg.width();

        if (svgWidth <= 0) {
            svgWidth = 50;
        }

        var parallaxValue = 0;
        if ($container.hasClass("pxl-parallax-scroll")) {
            var parallaxData = $container.data("parallax");
            if (parallaxData) {
                for (var key in parallaxData) {
                    if (parallaxData.hasOwnProperty(key)) {
                        var value = Math.abs(parseInt(parallaxData[key]) || 0);
                        if (value > parallaxValue) {
                            parallaxValue = value;
                        }
                    }
                }
            }
        }

        var extraWidth = Math.max(parallaxValue, containerWidth * 0.2);
        var adjustedWidth = containerWidth + extraWidth;

        var maxFit = Math.ceil(adjustedWidth / svgWidth);

        return Math.max(1, Math.min(maxFit, 30));
    }

    function initGrassRepeat($widget) {
        var $grass = $widget.find(".pxl-grass");
        if ($grass.length === 0) return;

        var $originalSvg = $grass.find("svg").first();
        if ($originalSvg.length === 0) return;

        $grass.empty();

        var repeatCount = calculateOptimalRepeatCount($widget, $originalSvg);

        if ($widget.hasClass("x")) {
            repeatCount = Math.max(repeatCount * 2, 10);
        }

        $grass.css({
            width: "100%",
            overflow: "hidden",
            position: "relative",
        });

        for (var i = 0; i < repeatCount; i++) {
            var $clonedSvg = $originalSvg.clone();
            $clonedSvg.addClass("grass-item-" + (i + 1));

            $clonedSvg.css({
                display: "inline-block",
                "vertical-align": "top",
            });

            $grass.append($clonedSvg);
        }

        if ($widget.hasClass("pxl-parallax-scroll")) {
            $grass.wrap(
                '<div class="pxl-grass-wrapper" style="width: 120%; margin-left: -10%; position: relative;"></div>'
            );
        }
    }

    var pxl_widget_grass_handler = function ($scope, $) {
        var $widget = $scope.find(".pxl-grass-widget");
        if ($widget.length === 0) return;

        setTimeout(function () {
            initGrassRepeat($widget);
        }, 100);
    };

    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_grass.default",
            pxl_widget_grass_handler
        );
    });

    $(document).ready(function () {
        $(".pxl-grass-widget").each(function () {
            var $widget = $(this);
            setTimeout(function () {
                initGrassRepeat($widget);
            }, 100);
        });
    });

    $(window).on("resize", function () {
        $(".pxl-grass-widget").each(function () {
            var $widget = $(this);
            setTimeout(function () {
                initGrassRepeat($widget);
            }, 100);
        });
    });

    // Re-init grass khi parallax effect được áp dụng
    $(window).on("scroll", function () {
        $(".pxl-grass-widget.pxl-parallax-scroll").each(function () {
            var $widget = $(this);
            var $grass = $widget.find(".pxl-grass");
            if ($grass.length > 0 && $grass.find("svg").length === 0) {
                setTimeout(function () {
                    initGrassRepeat($widget);
                }, 50);
            }
        });
    });
})(jQuery);
