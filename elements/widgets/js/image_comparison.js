jQuery(document).ready(function ($) {
    "use strict";

    function initImageComparison() {
        $(".picture-curtain").each(function () {
            const $container = $(this);
            const $foregroundContainer = $container.find(
                ".foreground-picture-container"
            );
            const $sliderHandle = $container.find(".slider-handle");
            const $sliderButton = $container.find(".slider-button");

            // Check if elements exist
            if (
                $foregroundContainer.length === 0 ||
                $sliderHandle.length === 0 ||
                $sliderButton.length === 0
            ) {
                console.log("Image comparison elements not found");
                return;
            }

            let isDragging = false;
            let containerRect = null;

            // Initialize position
            updateSliderPosition(50);

            // Mouse events for curtain effect
            $container.on("mouseenter", function (e) {
                if (!isDragging) {
                    curtainEffectHandler(e);
                }
            });

            $container.on("mousemove", function (e) {
                if (!isDragging) {
                    curtainEffectHandler(e);
                }
            });

            // Touch events for mobile
            $container.on("touchstart", function (e) {
                if (!isDragging) {
                    const touch = e.originalEvent.touches[0];
                    curtainEffectHandler({
                        pageX: touch.pageX,
                        pageY: touch.pageY,
                    });
                }
            });

            $container.on("touchmove", function (e) {
                if (!isDragging) {
                    const touch = e.originalEvent.touches[0];
                    curtainEffectHandler({
                        pageX: touch.pageX,
                        pageY: touch.pageY,
                    });
                }
            });

            // Slider drag functionality
            $sliderButton.on("mousedown", function (e) {
                e.preventDefault();
                e.stopPropagation();
                isDragging = true;
                containerRect = $container[0].getBoundingClientRect();

                $(document).on("mousemove.imageComparison", function (e) {
                    if (isDragging) {
                        const x = e.pageX - containerRect.left;
                        const percentage = Math.max(
                            0,
                            Math.min(100, (x / containerRect.width) * 100)
                        );
                        updateSliderPosition(percentage);
                    }
                });

                $(document).on("mouseup.imageComparison", function () {
                    isDragging = false;
                    $(document).off(".imageComparison");
                });
            });

            // Touch events for slider
            $sliderButton.on("touchstart", function (e) {
                e.preventDefault();
                e.stopPropagation();
                isDragging = true;
                containerRect = $container[0].getBoundingClientRect();

                $(document).on("touchmove.imageComparison", function (e) {
                    if (isDragging) {
                        const touch = e.originalEvent.touches[0];
                        const x = touch.pageX - containerRect.left;
                        const percentage = Math.max(
                            0,
                            Math.min(100, (x / containerRect.width) * 100)
                        );
                        updateSliderPosition(percentage);
                    }
                });

                $(document).on("touchend.imageComparison", function () {
                    isDragging = false;
                    $(document).off(".imageComparison");
                });
            });

            function curtainEffectHandler(e) {
                if (!containerRect) {
                    containerRect = $container[0].getBoundingClientRect();
                }

                const x = e.pageX - containerRect.left;
                const percentage = Math.max(
                    0,
                    Math.min(100, (x / containerRect.width) * 100)
                );
                updateSliderPosition(percentage);
            }

            function updateSliderPosition(percentage) {
                $foregroundContainer.css("width", percentage + "%");
                $sliderHandle.css("left", percentage + "%");
            }
        });
    }

    // Initialize
    initImageComparison();

    // Re-initialize on Elementor frontend
    if (typeof elementorFrontend !== "undefined") {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_image_comparison.default",
            function ($scope) {
                initImageComparison();
            }
        );
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/pxl_image_carousel.default",
            function ($scope) {
                initImageComparison();
            }
        );
    }

    // Also initialize when window loads
    $(window).on("load", function () {
        initImageComparison();
    });
});
