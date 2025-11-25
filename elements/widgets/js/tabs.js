(function ($) {
    var pxl_widget_tabs_handler = function ($scope, $) {
        var $tabs = $scope.find(".pxl-tabs");

        $tabs.each(function () {
            var $tabContainer = $(this);
            var $titles = $tabContainer.find(
                ".pxl-tabs--title .pxl-item--title, .pxl-tabs--title .pxl-tab--title"
            );
            var $contents = $tabContainer.find(
                ".pxl-tabs--content .pxl-item--content, .pxl-tabs--content .pxl-tab--content"
            );

            // Handle switch toggle for layout 1
            var $switchInput = $tabContainer.find(".pxl-switch-input");
            var $switchLabels = $tabContainer.find(".pxl-switch-label");

            function activateTab(index) {
                if (index < 0) index = $titles.length - 1;
                if (index >= $titles.length) index = 0;

                var $newActiveTitle = $titles.eq(index);
                var target = $newActiveTitle.data("target");
                var $newActiveContent = $(target);

                if (!$newActiveContent.length) return;

                // Get animation duration from data attribute or use default
                var duration = $tabContainer.data("duration") || 400;

                if ($tabContainer.hasClass("tab-effect-slide")) {
                    $contents
                        .removeClass("active")
                        .stop(true, true)
                        .slideUp(duration);
                    $newActiveContent
                        .addClass("active")
                        .stop(true, true)
                        .slideDown(duration);
                } else if ($tabContainer.hasClass("tab-effect-fade")) {
                    $contents
                        .removeClass("active")
                        .stop(true, true)
                        .fadeOut(duration);
                    $newActiveContent
                        .addClass("active")
                        .stop(true, true)
                        .fadeIn(duration);
                } else {
                    $contents.removeClass("active").hide();
                    $newActiveContent.addClass("active").show();
                }

                $titles.removeClass("active");
                $newActiveTitle.addClass("active");
            }

            if ($titles.length > 0) {
                $titles.on("click", function (e) {
                    e.preventDefault();
                    var index = $titles.index(this);
                    activateTab(index);
                });
            }

            if (
                $tabContainer.hasClass("pxl-tabs1") &&
                $switchInput.length > 0
            ) {
                function activateTabBySwitch(tabIndex) {
                    var $targetContent = $contents.eq(tabIndex - 1);

                    if (!$targetContent.length) return;

                    var duration = $tabContainer.data("duration") || 400;

                    if ($tabContainer.hasClass("tab-effect-slide")) {
                        $contents
                            .removeClass("active")
                            .stop(true, true)
                            .slideUp(duration);
                        $targetContent
                            .addClass("active")
                            .stop(true, true)
                            .slideDown(duration);
                    } else if ($tabContainer.hasClass("tab-effect-fade")) {
                        $contents
                            .removeClass("active")
                            .stop(true, true)
                            .fadeOut(duration);
                        $targetContent
                            .addClass("active")
                            .stop(true, true)
                            .fadeIn(duration);
                    } else {
                        $contents.removeClass("active").hide();
                        $targetContent.addClass("active").show();
                    }

                    $switchLabels.removeClass("active");
                    if (tabIndex === 1) {
                        $switchInput.prop("checked", false);
                        $switchLabels
                            .filter(".pxl-switch-left")
                            .addClass("active");
                    } else {
                        $switchInput.prop("checked", true);
                        $switchLabels
                            .filter(".pxl-switch-right")
                            .addClass("active");
                    }
                }

                $switchInput.on("change", function () {
                    var tabIndex = $(this).is(":checked") ? 2 : 1;
                    activateTabBySwitch(tabIndex);
                });

                $switchLabels.on("click", function () {
                    var tabIndex = $(this).hasClass("pxl-switch-left") ? 1 : 2;
                    activateTabBySwitch(tabIndex);
                });
            }

            if ($titles.length > 0) {
                $tabContainer.find(".pxl-tabs-next").on("click", function () {
                    var index = $titles.index(
                        $tabContainer.find(
                            ".pxl-tabs--title .pxl-item--title.active, .pxl-tabs--title .pxl-tab--title.active"
                        )
                    );
                    activateTab(index + 1);
                });

                $tabContainer.find(".pxl-tabs-prev").on("click", function () {
                    var index = $titles.index(
                        $tabContainer.find(
                            ".pxl-tabs--title .pxl-item--title.active, .pxl-tabs--title .pxl-tab--title.active"
                        )
                    );
                    activateTab(index - 1);
                });
            }
        });
    };

    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_tabs.default",
            pxl_widget_tabs_handler
        );
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_post_list.default",
            pxl_widget_tabs_handler
        );
    });
})(jQuery);
