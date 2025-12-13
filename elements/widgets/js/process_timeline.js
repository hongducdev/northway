(function ($) {
    "use strict";

    function pxl_process_timeline_handler($scope) {
        var $timeline = $scope.find(".pxl-process-timeline");

        if ($timeline.length === 0) {
            return;
        }

        $timeline.each(function () {
            if ($(this).data("timeline-initialized")) {
                return;
            }
            $(this).data("timeline-initialized", true);
            var $this = $(this);
            var $processContainer = $this.closest(".pxl-process3");
            var $wrapper = $this.find(".pxl-timeline-wrapper");
            var $container = $this.find(".pxl-timeline-container");
            var $items = $this.find(".pxl-timeline-item");
            var $prevBtn = $processContainer.find(".pxl-timeline-arrow-prev");
            var $nextBtn = $processContainer.find(".pxl-timeline-arrow-next");
            var $progress = $this.find(".pxl-timeline-progress");

            var totalItems = $items.length;
            var $itemsContainer = $this.find(".pxl-timeline-items");

            // Get responsive values from data attributes
            var responsiveConfig = {
                desktop: parseInt($itemsContainer.data("max-visible")) || 5,
                lg: parseInt($itemsContainer.data("max-visible-lg")) || 4,
                md: parseInt($itemsContainer.data("max-visible-md")) || 3,
                sm: parseInt($itemsContainer.data("max-visible-sm")) || 2,
            };

            var currentStartIndex = 0;
            var activeIndex = 0;

            // Get responsive maxVisible based on screen width
            function getResponsiveMaxVisible() {
                var windowWidth = $(window).width();
                var maxVal;

                if (windowWidth <= 575) {
                    maxVal = responsiveConfig.sm; // Mobile
                } else if (windowWidth <= 767) {
                    maxVal = responsiveConfig.md; // Small tablet
                } else if (windowWidth <= 991) {
                    maxVal = responsiveConfig.md; // Tablet
                } else if (windowWidth <= 1199) {
                    maxVal = responsiveConfig.lg; // Small desktop
                } else {
                    maxVal = responsiveConfig.desktop; // Desktop
                }

                return Math.min(maxVal, totalItems);
            }

            var maxVisible = getResponsiveMaxVisible();

            function init() {
                var $activeItem = $items.filter(".active");
                if ($activeItem.length > 0) {
                    activeIndex = parseInt($activeItem.data("index")) || 0;
                } else {
                    activeIndex = 0;
                    $items.eq(0).addClass("active");
                }

                updateActiveState(activeIndex);
                updateNavigationButtons();
            }

            function updateTimelineVisibility() {
                $items.removeClass("hidden");

                if (totalItems <= maxVisible) {
                    return;
                }

                $items.each(function (index) {
                    if (
                        index < currentStartIndex ||
                        index >= currentStartIndex + maxVisible
                    ) {
                        $(this).addClass("hidden");
                    } else {
                        $(this).removeClass("hidden");
                    }
                });
            }

            function updateProgress(index) {
                var $activeItem = $items.eq(index);
                var $activeDot = $activeItem.find(".pxl-timeline-dot");
                var $line = $this.find(".pxl-timeline-line");
                var $itemsContainer = $this.find(".pxl-timeline-items");

                if (
                    $activeDot.length > 0 &&
                    $line.length > 0 &&
                    $itemsContainer.length > 0
                ) {
                    setTimeout(function () {
                        var lineOffset = $line.offset();
                        var lineLeft = lineOffset ? lineOffset.left : 0;
                        var lineWidth = $line.outerWidth();

                        var dotOffset = $activeDot.offset();
                        var dotLeft = dotOffset ? dotOffset.left : 0;
                        var dotWidth = $activeDot.outerWidth();
                        var dotCenter = dotLeft + dotWidth / 2;

                        var progressWidth = dotCenter - lineLeft;

                        if (progressWidth > 0 && progressWidth <= lineWidth) {
                            $progress.css("width", progressWidth + "px");
                        } else if (progressWidth > lineWidth) {
                            $progress.css("width", "100%");
                        } else {
                            $progress.css("width", "0px");
                        }
                    }, 100);
                } else {
                    var progress =
                        totalItems > 1 ? (index / (totalItems - 1)) * 100 : 0;
                    $progress.css("width", progress + "%");
                }
            }

            function updateActiveState(index) {
                activeIndex = index;

                // Recalculate maxVisible for current screen size
                maxVisible = getResponsiveMaxVisible();

                $items.removeClass("active");
                $items.eq(index).addClass("active");

                updateProgress(index);

                if (totalItems > maxVisible) {
                    // Calculate center position for active item
                    var halfVisible = Math.floor(maxVisible / 2);

                    if (index <= halfVisible) {
                        currentStartIndex = 0;
                    } else if (index >= totalItems - halfVisible - 1) {
                        currentStartIndex = Math.max(
                            0,
                            totalItems - maxVisible
                        );
                    } else {
                        currentStartIndex = Math.max(0, index - halfVisible);
                    }
                    updateTimelineVisibility();
                    setTimeout(function () {
                        updateProgress(index);
                    }, 100);
                } else {
                    currentStartIndex = 0;
                    updateTimelineVisibility();
                    setTimeout(function () {
                        updateProgress(index);
                    }, 100);
                }

                updateActiveItemContent(index);
                syncWithProcessItems(index);
            }

            function updateNavigationButtons() {
                $prevBtn.show();
                $nextBtn.show();

                if (activeIndex <= 0) {
                    $prevBtn.addClass("disabled").prop("disabled", true);
                } else {
                    $prevBtn.removeClass("disabled").prop("disabled", false);
                }

                if (activeIndex >= totalItems - 1) {
                    $nextBtn.addClass("disabled").prop("disabled", true);
                } else {
                    $nextBtn.removeClass("disabled").prop("disabled", false);
                }
            }

            function updateActiveItemContent(index) {
                var $processItems = $this
                    .closest(".pxl-process3")
                    .find(".pxl-process-items");

                if ($processItems.length > 0) {
                    var itemsDataAttr = $processItems.attr("data-items");
                    var itemsData = null;

                    try {
                        itemsData = itemsDataAttr
                            ? JSON.parse(itemsDataAttr)
                            : null;
                    } catch (e) {
                        return;
                    }

                    if (itemsData && itemsData[index]) {
                        var item = itemsData[index];
                        var $content = $processItems.find(
                            ".pxl-process-item--content"
                        );
                        var $imageContainer = $processItems.find(
                            ".pxl-process-item--image"
                        );

                        var $title = $content.find(".pxl-process-item--title");
                        var $desc = $content.find(".pxl-process-item--desc");
                        var fadeTime = 350;

                        $content.css("opacity", "0");
                        $imageContainer.css("opacity", "0");

                        setTimeout(function () {
                            if (item.title) {
                                var titleHtml = "";
                                if (item.step && item.step.trim() !== "") {
                                    titleHtml =
                                        "<span>" +
                                        item.step +
                                        "</span>: " +
                                        item.title;
                                } else {
                                    titleHtml = item.title;
                                }

                                if ($title.length > 0) {
                                    $title.html(titleHtml);
                                } else {
                                    $content.prepend(
                                        '<h3 class="pxl-process-item--title">' +
                                            titleHtml +
                                            "</h3>"
                                    );
                                }
                            } else {
                                $title.remove();
                            }

                            if (item.desc) {
                                if ($desc.length > 0) {
                                    $desc.html(item.desc);
                                } else {
                                    $content.append(
                                        '<div class="pxl-process-item--desc">' +
                                            item.desc +
                                            "</div>"
                                    );
                                }
                            } else {
                                $desc.remove();
                            }

                            if (item.image) {
                                if ($imageContainer.length > 0) {
                                    $imageContainer.html(item.image);
                                } else {
                                    $processItems.append(
                                        '<div class="pxl-process-item--image">' +
                                            item.image +
                                            "</div>"
                                    );
                                }
                            } else {
                                $imageContainer.remove();
                            }

                            setTimeout(function () {
                                $content.css("opacity", "1");
                                $imageContainer.css("opacity", "1");
                            }, 10);
                        }, fadeTime);
                    }
                }
            }

            function syncWithProcessItems(index) {
                var $processWrapper = $this
                    .closest(".pxl-process3")
                    .find(".pxl-process-wrapper");
                var $processItems = $processWrapper.find(".pxl-item");

                if ($processItems.length > 0) {
                    var $targetItem = $processItems.eq(index);
                    if ($targetItem.length) {
                        var offsetTop = $targetItem.offset().top - 100;
                        $("html, body").animate(
                            {
                                scrollTop: offsetTop,
                            },
                            600
                        );
                    }
                }
            }

            $prevBtn.on("click", function (e) {
                e.preventDefault();
                if ($(this).hasClass("disabled") || activeIndex <= 0) {
                    return;
                }

                var newActiveIndex = activeIndex - 1;
                updateActiveState(newActiveIndex);
                updateNavigationButtons();
            });

            $nextBtn.on("click", function (e) {
                e.preventDefault();
                if (
                    $(this).hasClass("disabled") ||
                    activeIndex >= totalItems - 1
                ) {
                    return;
                }

                var newActiveIndex = activeIndex + 1;
                updateActiveState(newActiveIndex);
                updateNavigationButtons();
            });

            $items.on("click", function () {
                var index = $(this).data("index");
                updateActiveState(index);
                updateNavigationButtons();
            });

            $items.on("keydown", function (e) {
                if (e.key === "Enter" || e.key === " ") {
                    e.preventDefault();
                    $(this).trigger("click");
                }
            });

            // Touch/Swipe support for mobile
            var touchStartX = 0;
            var touchEndX = 0;
            var minSwipeDistance = 50;

            $this.on("touchstart", function (e) {
                touchStartX = e.originalEvent.touches[0].clientX;
            });

            $this.on("touchend", function (e) {
                touchEndX = e.originalEvent.changedTouches[0].clientX;
                handleSwipe();
            });

            function handleSwipe() {
                var swipeDistance = touchEndX - touchStartX;

                if (Math.abs(swipeDistance) < minSwipeDistance) {
                    return; // Not a valid swipe
                }

                if (swipeDistance > 0) {
                    // Swipe right - go to previous
                    if (activeIndex > 0) {
                        updateActiveState(activeIndex - 1);
                        updateNavigationButtons();
                    }
                } else {
                    // Swipe left - go to next
                    if (activeIndex < totalItems - 1) {
                        updateActiveState(activeIndex + 1);
                        updateNavigationButtons();
                    }
                }
            }

            init();

            // Debounce function for resize
            var resizeTimeout;
            $(window).on("resize", function () {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(function () {
                    // Recalculate maxVisible on resize
                    var newMaxVisible = getResponsiveMaxVisible();
                    if (newMaxVisible !== maxVisible) {
                        maxVisible = newMaxVisible;
                        // Recalculate start index based on active item
                        if (totalItems > maxVisible) {
                            if (activeIndex < 2) {
                                currentStartIndex = 0;
                            } else if (activeIndex + maxVisible > totalItems) {
                                currentStartIndex = totalItems - maxVisible;
                            } else {
                                currentStartIndex = activeIndex;
                            }
                        } else {
                            currentStartIndex = 0;
                        }
                    }
                    updateTimelineVisibility();
                    updateNavigationButtons();
                    setTimeout(function () {
                        updateProgress(activeIndex);
                    }, 100);
                }, 150);
            });
        });
    }

    $(window).on("elementor/frontend/init", function () {
        if (window.elementor && elementorFrontend && elementorFrontend.hooks) {
            elementorFrontend.hooks.addAction(
                "frontend/element_ready/pxl_process.default",
                pxl_process_timeline_handler
            );
        }
    });

    function initializeTimelines() {
        $(".pxl-process-timeline").each(function () {
            var $timeline = $(this);
            if ($timeline.data("timeline-initialized")) {
                return;
            }

            var $scope = $timeline.closest(".elementor-element, .pxl-process3");
            if ($scope.length === 0) {
                $scope = $timeline;
            }
            pxl_process_timeline_handler($scope);
        });
    }

    $(document).ready(function () {
        if (typeof elementorFrontend === "undefined") {
            setTimeout(initializeTimelines, 300);
        }

        setTimeout(initializeTimelines, 1000);
    });

    $(window).on("load", function () {
        setTimeout(initializeTimelines, 500);
    });
})(jQuery);
