(function ($) {
    var pxl_widget_counter_handler = function ($scope, $) {
        setTimeout(function () {
            elementorFrontend.waypoint(
                $scope.find(".pxl-counter--value:not(.effect-slide)"),
                function () {
                    var $number = $(this),
                        data = $number.data();

                    var decimalDigits = data.toValue.toString().match(/\.(.*)/);

                    if (decimalDigits) {
                        data.rounding = decimalDigits[1].length;
                    }

                    $number.numerator(data);
                },
                {
                    offset: "95%",
                    triggerOnce: true,
                }
            );

            elementorFrontend.waypoint(
                $scope.find(".pxl-counter--value.effect-slide"),
                function () {
                    var $number = $(this),
                        data = $number.data();
                    var el = $number[0];
                    var startNumber = data["startnumber"],
                        endNumber = data["endnumber"],
                        separator = data["delimiter"],
                        duration = data["duration"];
                    od = new Odometer({
                        el: el,
                        value: startNumber,
                        format: separator,
                        theme: "default",
                    });
                    od.update(endNumber);
                },
                {
                    offset: "95%",
                    triggerOnce: true,
                }
            );

            // GSAP Rolling Icon Effects for Counter3
            $scope.find(".pxl-counter3").each(function () {
                var $counter = $(this);
                var $frontIcon = $counter.find(
                    ".pxl-counter--front .pxl-counter--icon"
                );
                var $backIcon = $counter.find(
                    ".pxl-counter--back .pxl-counter--icon"
                );
                var $frontMeta = $counter.find(
                    ".pxl-counter--front .pxl-counter--meta"
                );
                var $backDesc = $counter.find(
                    ".pxl-counter--back .pxl-counter--desc"
                );

                gsap.set($frontIcon, {
                    x: 0,
                    rotation: 0,
                    scale: 1,
                    opacity: 1,
                });
                gsap.set($backIcon, {
                    x: -150,
                    rotation: -180,
                    scale: 0.8,
                    opacity: 0,
                });
                gsap.set($frontMeta, {
                    opacity: 1,
                    x: 0,
                });
                gsap.set($backDesc, {
                    opacity: 0,
                    x: -50,
                    scale: 0.9,
                });

                var rollTimeline = gsap.timeline({ paused: true });

                rollTimeline
                    .to(
                        $frontMeta,
                        {
                            opacity: 0,
                            x: 60,
                            scale: 0.9,
                            duration: 0.15,
                            ease: "power2.out",
                        },
                        0
                    )
                    .to(
                        $frontIcon,
                        {
                            x: 250,
                            rotation: 360,
                            scale: 0.3,
                            opacity: 0,
                            duration: 0.25,
                            ease: "power2.in",
                        },
                        0.05
                    )
                    .to(
                        $backIcon,
                        {
                            x: 0,
                            rotation: 0,
                            scale: 1,
                            opacity: 1,
                            duration: 0.3,
                            ease: "power2.out",
                        },
                        0.2
                    )
                    .to(
                        $backDesc,
                        {
                            opacity: 1,
                            x: 0,
                            scale: 1,
                            duration: 0.25,
                            ease: "back.out(1.7)",
                        },
                        0.3
                    )
                    .to(
                        $counter,
                        {
                            scale: 1.01,
                            duration: 0.1,
                            ease: "power2.out",
                        },
                        0.25
                    )
                    .to(
                        $counter,
                        {
                            scale: 1,
                            duration: 0.15,
                            ease: "power2.out",
                        },
                        0.35
                    );

                function isMobile() {
                    return window.innerWidth < 768;
                }

                function setupHoverEvents() {
                    if (!isMobile()) {
                        $counter.off("mouseenter mouseleave");
                        $counter.on("mouseenter", function () {
                            rollTimeline.play();
                        });

                        $counter.on("mouseleave", function () {
                            rollTimeline.reverse();
                        });
                    } else {
                        $counter.off("mouseenter mouseleave");
                        rollTimeline.progress(0);
                    }
                }

                setupHoverEvents();

                $(window).on("resize", setupHoverEvents);
            });
        }, 300);
    };

    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_counter.default",
            pxl_widget_counter_handler
        );
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_pie_chart.default",
            pxl_widget_counter_handler
        );
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_banner_box.default",
            pxl_widget_counter_handler
        );
    });
})(jQuery);
