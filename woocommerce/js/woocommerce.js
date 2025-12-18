(function ($) {
    "use strict";

    $(document).ready(function () {
        $(".single_variation_wrap").addClass("clearfix");
        $(".woocommerce-variation-add-to-cart").addClass("clearfix");

        $(".cart-total-wrap").on("click", function () {
            $(".widget-cart-sidebar").toggleClass("open");
            $(this).toggleClass("cart-open");
            $(".site-overlay").toggleClass("open");
        });

        $(".site-overlay").on("click", function () {
            $(this).removeClass("open");
            $(this)
                .parents("#page")
                .find(".widget-cart-sidebar")
                .removeClass("open");
        });

        $(".woocommerce-tab-heading").on("click", function () {
            $(this).toggleClass("open");
            $(this).parent().find(".woocommerce-tab-content").slideToggle("");
        });

        $(".site-menu-right .h-btn-cart, .mobile-menu-cart .h-btn-cart").on(
            "click",
            function (e) {
                e.preventDefault();
                $(this)
                    .parents("#ct-header-wrap")
                    .find(".widget_shopping_cart")
                    .toggleClass("open");
                $(".ct-hidden-sidebar").removeClass("open");
                $(".ct-search-popup").removeClass("open");
            }
        );

        $(".woocommerce-add-to-cart a.button").on("click", function () {
            $(this)
                .parents(".woocommerce-product-inner")
                .addClass("cart-added");
        });

        $(document.body).on(
            "added_to_cart",
            function (event, fragments, cart_hash, $button) {
                if (
                    $button &&
                    $button.hasClass("woocommerce-add-to-cart-button")
                ) {
                    var cartUrl = wc_add_to_cart_params.cart_url;

                    $button
                        .find(".woocommerce-add-to-cart-button-text")
                        .text(wc_add_to_cart_params.i18n_view_cart);

                    $button
                        .find(".woocommerce-add-to-cart-button-icon i")
                        .removeClass("flaticon-cart")
                        .addClass("bi bi-cart-check-fill");

                    $button
                        .attr("href", cartUrl)
                        .removeClass("ajax_add_to_cart add_to_cart_button")
                        .addClass("added_to_cart cart-success");

                    $button.removeAttr(
                        "data-product_id data-product_sku data-quantity"
                    );

                    $button.parent().find(".added_to_cart").not($button).hide();
                }
            }
        );

        setTimeout(function () {
            $(
                ".ct-grid .product_type_variable, .ct-slick-slider .product_type_variable"
            ).removeAttr("data-product_id");
        }, 200);

        $(".woocommerce .products").on("click", ".quantity input", function () {
            return false;
        });
        $(".woocommerce .products").on(
            "change input",
            ".quantity .qty",
            function () {
                var add_to_cart_button = $(this)
                    .parents(".product")
                    .find(".add_to_cart_button");
                add_to_cart_button.attr("data-quantity", $(this).val());
                add_to_cart_button.attr(
                    "href",
                    "?add-to-cart=" +
                        add_to_cart_button.attr("data-product_id") +
                        "&quantity=" +
                        $(this).val()
                );
            }
        );
        $(".flex-viewport")
            .parents(".woocommerce-gallery-inner")
            .addClass("flex-slider-active");

        /* Add Placeholder Review Form */
        var $text_name = $(
            ".single-product #review_form .comment-form-author label"
        ).text();
        $(".single-product #review_form .comment-form-author input").each(
            function (ev) {
                if (!$(this).val()) {
                    $(this).attr("placeholder", $text_name);
                }
            }
        );
        var $text_email = $(
            ".single-product #review_form .comment-form-email label"
        ).text();
        $(".single-product #review_form .comment-form-email input").each(
            function (ev) {
                if (!$(this).val()) {
                    $(this).attr("placeholder", $text_email);
                }
            }
        );
        var $text_comment = $(
            ".single-product #review_form .comment-form-comment label"
        ).text();
        $(".single-product #review_form .comment-form-comment textarea").each(
            function (ev) {
                if (!$(this).val()) {
                    $(this).attr("placeholder", $text_comment);
                }
            }
        );

        $(".pxl-item--attr .pxl-button--info").on("click", function () {
            $(this).toggleClass("active");
        });

        // Change text button in Filter Price Widget from Filter to Apply Filter
        $(".widget_price_filter .widget-content button").text("Apply");
    });
})(jQuery);

jQuery(document).on("qv_loader_stop", function () {
    jQuery(this).ready(function ($) {
        $("#yith-quick-view-modal .quantity").append(
            '<span class="quantity-icon quantity-down"></span><span class="quantity-icon quantity-up"></span>'
        );
        $("#yith-quick-view-modal .quantity-up").on("click", function () {
            $(this)
                .parents(".quantity")
                .find('input[type="number"]')
                .get(0)
                .stepUp();
        });
        $("#yith-quick-view-modal .quantity-down").on("click", function () {
            $(this)
                .parents(".quantity")
                .find('input[type="number"]')
                .get(0)
                .stepDown();
        });
    });
});
