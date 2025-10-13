(function ($) {
    "use strict";

    $(document).ready(function () {
        $(".pxl-service-grid-layout1").each(function () {
            var $grid = $(this);
            var $allPostItems = $grid.find(".pxl-post-item");
            var $allImages = $grid.find(".pxl-long-image");

            var firstPostId = $allPostItems.first().data("post-id");

            $allPostItems.hover(
                function () {
                    var $currentItem = $(this);
                    var postId = $currentItem.data("post-id");

                    $allPostItems.removeClass("hovering-image");
                    $currentItem.addClass("hovering-image");

                    $allImages.removeClass("active");
                    $allImages
                        .filter('[data-post-id="' + postId + '"]')
                        .addClass("active");
                },
                function () {
                    var $currentItem = $(this);
                    $currentItem.removeClass("hovering-image");

                    $allImages.removeClass("active");
                    $allImages
                        .filter('[data-post-id="' + firstPostId + '"]')
                        .addClass("active");
                }
            );
        });
    });
})(jQuery);
