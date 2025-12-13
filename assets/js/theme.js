(function ($) {
    ("use strict");

    var pxl_scroll_top;
    var pxl_window_height;
    var pxl_window_width;
    var pxl_scroll_status = "";
    var pxl_last_scroll_top = 0;
    var pxl_post_slip = false;

    $(window).on("load", function () {
        if (!window.pxlLoaderWaiting) {
            $(".pxl-loader").addClass("is-loaded");
        }
        $(".pxl-swiper-slider, .pxl-header-mobile-elementor").css(
            "opacity",
            "1"
        );
        pxl_window_width = $(window).width();
        pxl_window_height = $(window).height();
        northway_header_sticky();
        northway_header_mobile();
        northway_scroll_to_top();
        northway_footer_fixed();
        dropdown_offices();
        northway_shop_quantity();
        northway_submenu_responsive();
        northway_panel_anchor_toggle();
        northway_height_ct_grid();
        northway_bgr_parallax();
        northway_shop_view_layout();
        northway_el_parallax();
        northway_col_offset();
        northway_col_offset_1750();
        northway_col_offset_1760();
        northway_divider_width_1600();
        northway_circle_text();
        $(".pxl-slider").css("opacity", "1");
        $(".pxl-slider").css("transition-delay", "300ms");
    });

    $(window).on("scroll", function () {
        pxl_scroll_top = $(window).scrollTop();
        pxl_window_height = $(window).height();
        pxl_window_width = $(window).width();
        if (pxl_scroll_top < pxl_last_scroll_top) {
            pxl_scroll_status = "up";
        } else {
            pxl_scroll_status = "down";
        }
        pxl_last_scroll_top = pxl_scroll_top;
        northway_header_sticky();
        northway_scroll_to_top();
        northway_footer_fixed();
        // northway_check_scroll();
        northway_ptitle_scroll_opacity();
        northway_post_slip();
        if (pxl_scroll_top < 100) {
            $(".elementor > .pin-spacer").removeClass("scroll-top-active");
        }
    });

    $(window).on("resize", function () {
        pxl_window_height = $(window).height();
        pxl_window_width = $(window).width();
        northway_submenu_responsive();
        northway_height_ct_grid();
        northway_header_mobile();
        northway_col_offset();
        northway_col_offset_1750();
        northway_col_offset_1760();
        northway_divider_width_1600();
    });

    $(document).ready(function () {
        pxl_window_width = $(window).width();
        northway_backtotop_progess_bar();
        northway_type_file_upload();
        northway_zoom_point();
        northway_post_slip();
        if (pxl_window_width > 767) {
            northway_button_parallax();
        }
        setTimeout(function () {
            $(".pxl-section-bg-parallax")
                .closest(".elementor-element")
                .addClass("pxl-section-parallax-overflow");
        }, 500);

        if (pxl_window_width > 767) {
            northway_button_parallax();
        }

        $('a[href^="#"]:not(.tabs a)').on("click", function (e) {
            e.preventDefault();

            const target = $(this.getAttribute("href"));

            if (target.length) {
                $("html, body").animate(
                    {
                        scrollTop: target.offset().top,
                    },
                    600
                );
            }
        });

        // Location
        $(".pxl-location .pxl-list .pxl--item").on(
            "mouseenter mouseleave",
            function (e) {
                let id = $(this).attr("id");
                if (!id) return;

                $('.elementor-element[id="' + id + '"]').toggleClass(
                    "active",
                    e.type === "mouseenter"
                );
            }
        );
        //

        $(".pxl-check-scroll .pxl-swiper-slide .filter-item").on(
            "mousedown",
            function () {
                var $gridItem = $(this).closest(".pxl-swiper-slide");
                $gridItem.removeClass("visible").addClass("visible");
            }
        );

        /* Start Menu Mobile */
        $(".pxl-header-menu li.menu-item-has-children").append(
            '<span class="pxl-menu-toggle"></span>'
        );
        $(".pxl-menu-toggle").on("click", function () {
            if ($(this).hasClass("active")) {
                $(this)
                    .closest("ul")
                    .find(".pxl-menu-toggle.active")
                    .toggleClass("active");
                $(this)
                    .closest("ul")
                    .find(".sub-menu.active")
                    .toggleClass("active")
                    .slideToggle();
            } else {
                $(this)
                    .closest("ul")
                    .find(".pxl-menu-toggle.active")
                    .toggleClass("active");
                $(this)
                    .closest("ul")
                    .find(".sub-menu.active")
                    .toggleClass("active")
                    .slideToggle();
                $(this).toggleClass("active");
                $(this).parent().find("> .sub-menu").toggleClass("active");
                $(this).parent().find("> .sub-menu").slideToggle();
            }
        });

        $("#pxl-nav-mobile, .pxl-anchor-mobile-menu").on("click", function () {
            $(this).toggleClass("active");
            $("body").toggleClass("body-overflow");
            $(".pxl-header-menu").toggleClass("active");
        });

        $(
            ".pxl-menu-close, .pxl-header-menu-backdrop, #pxl-header-mobile .pxl-menu-primary a.is-one-page"
        ).on("click", function () {
            $(this)
                .parents(".pxl-header-main")
                .find(".pxl-header-menu")
                .removeClass("active");
            $("#pxl-nav-mobile").removeClass("active");
            $("body").toggleClass("body-overflow");
        });
        /* End Menu Mobile */

        /* Menu Vertical */
        $(".pxl-nav-vertical li.menu-item-has-children > a").append(
            '<span class="pxl-arrow-toggle"><i class="bi-chevron-right"></i></span>'
        );
        $(".pxl-nav-vertical li.menu-item-has-children > a").on(
            "click",
            function () {
                if ($(this).hasClass("active")) {
                    $(this).next().toggleClass("active").slideToggle();
                } else {
                    $(this)
                        .closest("ul")
                        .find(".sub-menu.active")
                        .toggleClass("active")
                        .slideToggle();
                    $(this)
                        .closest("ul")
                        .find("a.active")
                        .toggleClass("active");
                    $(this)
                        .find(".pxl-menu-toggle.active")
                        .toggleClass("active");
                    $(this).toggleClass("active");
                    $(this).next().toggleClass("active").slideToggle();
                }
            }
        );
        /* Mega Menu Max Height */
        var m_h_mega = $(
            "li.pxl-megamenu > .sub-menu > .pxl-mega-menu-elementor"
        ).outerHeight();
        var w_h_mega = $(window).height();
        var w_h_mega_css = w_h_mega - 120;
        if (m_h_mega > w_h_mega) {
            $("li.pxl-megamenu > .sub-menu > .pxl-mega-menu-elementor").css(
                "max-height",
                w_h_mega_css + "px"
            );
            $("li.pxl-megamenu > .sub-menu > .pxl-mega-menu-elementor").css(
                "overflow-y",
                "scroll"
            );
            $("li.pxl-megamenu > .sub-menu > .pxl-mega-menu-elementor").css(
                "overflow-x",
                "hidden"
            );
        }
        // Active Mega Menu Hover
        // $("li.pxl-megamenu").hover(
        //     function () {
        //         $(this)
        //             .parents(".elementor-element")
        //             .addClass("section-mega-active");
        //     },
        //     function () {
        //         $(this)
        //             .parents(".elementor-element")
        //             .removeClass("section-mega-active");
        //     }
        // );
        /* End Mega Menu Max Height */
        /* Search Popup */
        var $search_wrap_init = $("#pxl-search-popup");
        var search_field = $("#pxl-search-popup .search-field");
        var $body = $("body");

        $(".pxl-search-popup-button").on("click", function (e) {
            if (!$search_wrap_init.hasClass("active")) {
                $search_wrap_init.addClass("active");
                setTimeout(function () {
                    search_field.get(0).focus();
                }, 500);
            } else if (search_field.val() === "") {
                $search_wrap_init.removeClass("active");
                search_field.get(0).focus();
            }
            e.preventDefault();
            return false;
        });

        $(
            ".pxl-subscribe-popup .pxl-item--overlay, .pxl-subscribe-popup .pxl-item--close"
        ).on("click", function (e) {
            $(this).parents(".pxl-subscribe-popup").removeClass("pxl-active");
            e.preventDefault();
            return false;
        });

        $(
            "#pxl-search-popup .pxl-item--overlay, #pxl-search-popup .pxl-item--close"
        ).on("click", function (e) {
            $body.addClass("pxl-search-out-anim");
            setTimeout(function () {
                $body.removeClass("pxl-search-out-anim");
            }, 800);
            setTimeout(function () {
                $search_wrap_init.removeClass("active");
            }, 800);
            e.preventDefault();
            return false;
        });

        /* Scroll To Top */
        $(".pxl-scroll-top").click(function () {
            $("html, body").animate({ scrollTop: 0 }, 1200);
            $(this)
                .parents(".pxl-wapper")
                .find(".elementor > .pin-spacer")
                .addClass("scroll-top-active");
            return false;
        });

        /* custom grid filter moving border */
        $(".pxl-grid-filter").each(function () {
            var marker = $(this).find(".filter-marker"),
                item = $(this).find(".filter-item"),
                current = $(this).find(".filter-item.active");

            var offsettop = current.length ? current.position().top : 0;

            marker.css({
                top: offsettop + (current.length ? current.outerHeight() : 0),
                left: current.length ? current.position().left : 0,
                width: current.length ? current.outerWidth() : 0,
                display: "block",
            });

            item.mouseover(function () {
                var self = $(this),
                    offsetactop = self.position().top,
                    offsetleft = self.position().left,
                    width = self.outerWidth() || current.outerWidth(),
                    top = offsetactop == 0 ? 0 : offsetactop || offsettop,
                    left =
                        offsetleft == 0
                            ? 0
                            : offsetleft || current.position().left;

                marker.stop().animate(
                    {
                        top: top + (current.length ? current.outerHeight() : 0),
                        left: left,
                        width: width,
                    },
                    300
                );
            });

            item.on("click", function () {
                current = $(this);
            });

            item.mouseleave(function () {
                var offsetlvtop = current.length ? current.position().top : 0;
                marker.stop().animate(
                    {
                        top:
                            offsetlvtop +
                            (current.length ? current.outerHeight() : 0),
                        left: current.length ? current.position().left : 0,
                        width: current.length ? current.outerWidth() : 0,
                    },
                    300
                );
            });
        });

        /* Animate Time Delay */

        /* Related Post - Slick Slider */
        const postSlider = $(".pxl-related-post .pxl-related-post-inner");
        postSlider.slick({
            dots: false,
            infinite: true,
            arrows: false,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 500,
            cssEase: "linear",
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });

        $(".category-carousel").slick({
            dots: false,
            infinite: true,
            arrows: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 500,
            cssEase: "linear",
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4,
                    },
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                    },
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    },
                },
                {
                    breakpoint: 578,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });

        $(".pxl-grid-masonry").each(function () {
            var eltime = 80;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this)
                .find("> .pxl-grid-item > .wow")
                .each(function (index, obj) {
                    $(this).css("animation-delay", eltime + "ms");
                    if (_elt === index) {
                        eltime = 80;
                        _elt = _elt + elt_inner;
                    } else {
                        eltime = eltime + 80;
                    }
                });
        });

        $(".btn-text-nina").each(function () {
            var eltime = 0.045;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this)
                .find("> .pxl--btn-text > span")
                .each(function (index, obj) {
                    $(this).css("transition-delay", eltime + "s");
                    eltime = eltime + 0.045;
                });
        });

        $(".btn-text-nanuk").each(function () {
            var eltime = 0.05;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this)
                .find("> .pxl--btn-text > span")
                .each(function (index, obj) {
                    $(this).css("animation-delay", eltime + "s");
                    eltime = eltime + 0.05;
                });
        });

        $(".btn-text-smoke").each(function () {
            var eltime = 0.05;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this)
                .find("> .pxl--btn-text > span > span > span")
                .each(function (index, obj) {
                    $(this).css("--d", eltime + "s");
                    eltime = eltime + 0.05;
                });
        });

        $(
            ".btn-text-reverse .pxl-text--front, .btn-text-reverse .pxl-text--back"
        ).each(function () {
            var eltime = 0.05;
            var elt_inner = $(this).children().length;
            var _elt = elt_inner - 1;
            $(this)
                .find(".pxl-text--inner > span")
                .each(function (index, obj) {
                    $(this).css("transition-delay", eltime + "s");
                    eltime = eltime + 0.05;
                });
        });

        /* End Animate Time Delay */

        $(".label-text-fillter").on("click", function () {
            $(this).parents(".pxl-grid-filter").addClass("active");
        });
        $(".filter-item").on("click", function () {
            $(".pxl-grid-filter").removeClass("active");
        });

        /* Lightbox Popup */
        $(".pxl-action-popup").magnificPopup({
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
        });

        $(".pxl-gallery-lightbox").each(function () {
            $(this).magnificPopup({
                delegate: "a.lightbox",
                type: "image",
                gallery: {
                    enabled: true,
                },
                mainClass: "mfp-fade",
            });
        });

        /* Page Title Parallax */
        if (pxl_window_width > 1024) {
            if ($("#pxl-page-title-default").hasClass("pxl--parallax")) {
                $(this).stellar();
            }
        }

        /* Cart Sidebar Popup */
        $(".pxl-cart-sidebar-button").on("click", function () {
            $("body").addClass("body-overflow");
            $("#pxl-cart-sidebar").addClass("active");
        });
        $(
            "#pxl-cart-sidebar .pxl-popup--overlay, #pxl-cart-sidebar .pxl-item--close"
        ).on("click", function () {
            $("body").removeClass("body-overflow");
            $("#pxl-cart-sidebar").removeClass("active");
        });
        $(".pxl-accordion1.style2 .pxl-accordion--content").find("br").remove();
        /* Hover Active Item */
        $(".pxl--widget-hover").each(function () {
            $(this).hover(function () {
                $(this)
                    .parents(".elementor-row")
                    .find(".pxl--widget-hover")
                    .removeClass("pxl--item-active");
                $(this)
                    .parents(".elementor-container")
                    .find(".pxl--widget-hover")
                    .removeClass("pxl--item-active");
                $(this).addClass("pxl--item-active");
            });
        });
        /* Hover Active button */

        var wobbleElements = document.querySelectorAll(".pxl-wobble");
        wobbleElements.forEach(function (el) {
            el.addEventListener("mouseover", function () {
                if (
                    !el.classList.contains("animating") &&
                    !el.classList.contains("mouseover")
                ) {
                    el.classList.add("animating", "mouseover");
                    var letters = el.innerText.split("");
                    setTimeout(function () {
                        el.classList.remove("animating");
                    }, (letters.length + 1) * 50);
                    var animationName = el.dataset.animation;
                    if (!animationName) {
                        animationName = "pxl-jump";
                    }
                    el.innerText = "";
                    letters.forEach(function (letter) {
                        if (letter == " ") {
                            letter = "&nbsp;";
                        }
                        el.innerHTML +=
                            '<span class="letter">' + letter + "</span>";
                    });
                    var letterElements = el.querySelectorAll(".letter");
                    letterElements.forEach(function (letter, i) {
                        setTimeout(function () {
                            letter.classList.add(animationName);
                        }, 50 * i);
                    });
                }
            });
            el.addEventListener("mouseout", function () {
                el.classList.remove("mouseover");
            });
        });

        /* Start Icon Bounce */
        var boxEls = $(".el-bounce, .pxl-image-effect1, .el-effect-zigzag");
        $.each(boxEls, function (boxIndex, boxEl) {
            loopToggleClass(boxEl, "active");
        });

        function loopToggleClass(el, toggleClass) {
            el = $(el);
            let counter = 0;
            if (el.hasClass(toggleClass)) {
                waitFor(
                    function () {
                        counter++;
                        return counter == 2;
                    },
                    function () {
                        counter = 0;
                        el.removeClass(toggleClass);
                        loopToggleClass(el, toggleClass);
                    },
                    "Deactivate",
                    1000
                );
            } else {
                waitFor(
                    function () {
                        counter++;
                        return counter == 3;
                    },
                    function () {
                        counter = 0;
                        el.addClass(toggleClass);
                        loopToggleClass(el, toggleClass);
                    },
                    "Activate",
                    1000
                );
            }
        }

        function waitFor(condition, callback, message, time) {
            if (
                message == null ||
                message == "" ||
                typeof message == "undefined"
            ) {
                message = "Timeout";
            }
            if (time == null || time == "" || typeof time == "undefined") {
                time = 100;
            }
            var cond = condition();
            if (cond) {
                callback();
            } else {
                setTimeout(function () {
                    waitFor(condition, callback, message, time);
                }, time);
            }
        }
        /* End Icon Bounce */

        /* Image Effect */
        if ($(".pxl-image-tilt").length) {
            $(".pxl-image-tilt")
                .parents(".elementor-element")
                .addClass("pxl-image-tilt-active");
            $(".pxl-image-tilt").each(function () {
                var pxl_maxtilt = $(this).data("maxtilt"),
                    pxl_speedtilt = $(this).data("speedtilt"),
                    pxl_perspectivetilt = $(this).data("perspectivetilt");
                VanillaTilt.init(this, {
                    max: pxl_maxtilt,
                    speed: pxl_speedtilt,
                    perspective: pxl_perspectivetilt,
                });
            });
        }

        /* Select Theme Style */
        $(".widget.widget_search input").attr("required", true);
        $(".wpcf7-select").each(function () {
            var $this = $(this),
                numberOfOptions = $(this).children("option").length;

            $this.addClass("pxl-select-hidden");
            $this.wrap('<div class="pxl-select"></div>');
            $this.after('<div class="pxl-select-higthlight"></div>');

            var $styledSelect = $this.next("div.pxl-select-higthlight");
            $styledSelect.text($this.children("option").eq(0).text());

            var $list = $("<ul />", {
                class: "pxl-select-options",
            }).insertAfter($styledSelect);

            for (var i = 0; i < numberOfOptions; i++) {
                $("<li />", {
                    text: $this.children("option").eq(i).text(),
                    rel: $this.children("option").eq(i).val(),
                }).appendTo($list);
            }

            var $listItems = $list.children("li");

            $styledSelect.click(function (e) {
                e.stopPropagation();
                $("div.pxl-select-higthlight.active")
                    .not(this)
                    .each(function () {
                        $(this)
                            .removeClass("active")
                            .next("ul.pxl-select-options")
                            .addClass("pxl-select-lists-hide");
                    });
                $(this).toggleClass("active");
            });

            $listItems.click(function (e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass("active");
                $this.val($(this).attr("rel"));
            });

            $(document).click(function () {
                $styledSelect.removeClass("active");
            });
        });

        /* Nice Select */
        $(
            ".woocommerce-ordering .orderby, #filter-label, #pxl-sidebar-area select, .variations_form.cart .variations select, .pxl-open-table select, .pxl-nice-select"
        ).each(function () {
            $(this).niceSelect();
        });

        $(".pxl-post-list .nice-select").each(function () {
            $(this).niceSelect();
        });

        /* Typewriter */
        if ($(".pxl-title--typewriter").length) {
            function typewriterOut(elements, callback) {
                if (elements.length) {
                    elements.eq(0).addClass("is-active");
                    elements.eq(0).delay(3000);
                    elements.eq(0).removeClass("is-active");
                    typewriterOut(elements.slice(1), callback);
                } else {
                    callback();
                }
            }

            function typewriterIn(elements, callback) {
                if (elements.length) {
                    elements.eq(0).addClass("is-active");
                    elements
                        .eq(0)
                        .delay(3000)
                        .slideDown(3000, function () {
                            elements.eq(0).removeClass("is-active");
                            typewriterIn(elements.slice(1), callback);
                        });
                } else {
                    callback();
                }
            }

            function typewriterInfinite() {
                typewriterOut(
                    $(".pxl-title--typewriter .pxl-item--text"),
                    function () {
                        typewriterIn(
                            $(".pxl-title--typewriter .pxl-item--text"),
                            function () {
                                typewriterInfinite();
                            }
                        );
                    }
                );
            }
            $(function () {
                typewriterInfinite();
            });
        }
        /* End Typewriter */

        /* Get checked input - Mailchimpp */
        $(".mc4wp-form input:checkbox").change(function () {
            if ($(this).is(":checked")) {
                $(".mc4wp-form").addClass("pxl-input-checked");
            } else {
                $(".mc4wp-form").removeClass("pxl-input-checked");
            }
        });

        /* Scroll to content */
        $(".pxl-link-to-section .btn").on("click", function (e) {
            var id_scroll = $(this).attr("href");
            var offsetScroll = $(".pxl-header-elementor-sticky").outerHeight();
            e.preventDefault();
            $("html, body").animate(
                { scrollTop: $(id_scroll).offset().top - offsetScroll },
                600
            );
        });

        // Hover Item Active
        $(".pxl-post-modern1 .pxl-post--content .pxl-post--item")
            .on("mouseenter", function () {
                $(this).addClass("active");
                $(
                    ".pxl-post-modern1 .pxl-post--images .pxl-post--featured"
                ).removeClass("active");
                var selected_item = $(this)
                    .find(".pxl-content--inner")
                    .attr("data-image");
                $(selected_item).addClass("active").removeClass("non-active");
            })
            .on("mouseleave", function () {
                $(
                    ".pxl-post-modern1 .pxl-post--content .pxl-post--item"
                ).removeClass("active");
                $(
                    ".pxl-post-modern1 .pxl-post--images .pxl-post--featured"
                ).removeClass("non-active");
                var selected_item = $(this)
                    .find(".pxl-content--inner")
                    .attr("data-image");
                $(selected_item).removeClass("active").addClass("non-active");
            });

        // Hover Overlay Effect
        $(".pxl-overlay-shake").mousemove(function (event) {
            var offset = $(this).offset();
            var W = $(this).outerWidth();
            var X = event.pageX - offset.left;
            var Y = event.pageY - offset.top;
            $(this)
                .find(".pxl-overlay--color")
                .css({
                    top: +Y + "px",
                    left: +X + "px",
                });
        });

        //Some Widget Default
        //$('.widget .cat-item a, .widget_archive li a').append('<span class="pxl-item--divider"></span>');

        /* Social Button Click */
        $(".pxl-social--button").on("click", function () {
            $(this).toggleClass("active");
        });
        $(document).on("click", function (e) {
            if (e.target.className == "pxl-social--button active")
                $(".pxl-social--button").removeClass("active");
        });

        // Header Home 2
        $("#home-2-header").append(
            '<span class="pxl-header-divider1"></span><span class="pxl-header-divider2"></span><span class="pxl-header-divider3"></span><span class="pxl-header-divider4"></span>'
        );
        $("#home-2-header-sticky").append(
            '<span class="pxl-header-divider2"></span><span class="pxl-header-divider4"></span>'
        );
    });

    jQuery(document).ajaxComplete(function (event, xhr, settings) {
        northway_shop_quantity();
        northway_height_ct_grid();
    });

    jQuery(document).on("updated_wc_div", function () {
        northway_shop_quantity();
    });

    /* Header Sticky */
    function northway_header_sticky() {
        if ($("#pxl-header-elementor").hasClass("is-sticky")) {
            if (pxl_scroll_top > 100) {
                $(".pxl-header-elementor-sticky.pxl-sticky-stb").addClass(
                    "pxl-header-fixed"
                );
                $("#pxl-header-mobile").addClass("pxl-header-mobile-fixed");
            } else {
                $(".pxl-header-elementor-sticky.pxl-sticky-stb").removeClass(
                    "pxl-header-fixed"
                );
                $("#pxl-header-mobile").removeClass("pxl-header-mobile-fixed");
            }

            if (pxl_scroll_status == "up" && pxl_scroll_top > 100) {
                $(".pxl-header-elementor-sticky.pxl-sticky-stt").addClass(
                    "pxl-header-fixed"
                );
            } else {
                $(".pxl-header-elementor-sticky.pxl-sticky-stt").removeClass(
                    "pxl-header-fixed"
                );
            }
        }

        $(".pxl-header-elementor-sticky")
            .parents("body")
            .addClass("pxl-header-sticky");
    }

    /* Header Mobile */
    function northway_header_mobile() {
        var h_header_mobile = $("#pxl-header-elementor").outerHeight();
        if (pxl_window_width < 1199) {
            $("#pxl-header-elementor").css(
                "min-height",
                h_header_mobile + "px"
            );
        }
    }

    /* Scroll To Top */
    function northway_scroll_to_top() {
        if (pxl_scroll_top < pxl_window_height) {
            $(".pxl-scroll-top").addClass("pxl-off").removeClass("pxl-on");
        }
        if (pxl_scroll_top > pxl_window_height) {
            $(".pxl-scroll-top").addClass("pxl-on").removeClass("pxl-off");
        }
    }

    /* Footer Fixed */
    function northway_footer_fixed() {
        setTimeout(function () {
            var h_footer =
                $(".pxl-footer-fixed #pxl-footer-elementor").outerHeight() - 1;
            $(".pxl-footer-fixed #pxl-main").css(
                "margin-bottom",
                h_footer + "px"
            );
        }, 600);
    }

    /* Custom Check Scroll */
    function northway_check_scroll() {
        var $gridItems = $(".pxl-check-scroll .pxl-swiper-slide");
        var viewportBottom = pxl_scroll_top + $(window).height();

        $gridItems.each(function () {
            var $gridItem = $(this);
            var elementTop = $gridItem.offset().top;
            var elementBottom = elementTop + $gridItem.outerHeight();

            if (elementTop < viewportBottom && elementBottom > pxl_scroll_top) {
                $gridItem.addClass("visible");
            } else {
                $gridItem.removeClass("visible");
            }
        });
    }

    function dropdown_offices() {
        const filterDropdown = $("#filter-label");
        const items = document.querySelectorAll(".pxl-offices-list .pxl--item");

        if (!filterDropdown.length || items.length === 0) return;

        // Lắng nghe sự kiện change của niceSelect
        filterDropdown.on("change", function () {
            const selectedLabel = this.value.toLowerCase();

            items.forEach((item) => {
                const itemLabel = item.dataset.label?.toLowerCase() || "";
                item.classList.toggle(
                    "hidden",
                    selectedLabel !== "" && itemLabel !== selectedLabel
                );
            });
        });
    }

    /* Button Parallax */
    function northway_button_parallax() {
        const $buttons = $(".btn.btn-circle");
        if ($buttons.length === 0) {
            return;
        }
        $buttons.on("mouseenter", function () {
            const $text = $(this).find("svg");
            if ($text.length === 0) {
                return;
            }
            gsap.set($text, {
                transformOrigin: "50% 50%",
            });
        });
        $buttons.on("mousemove", function (e) {
            const $btn = $(this);
            const $text = $btn.find("svg, span");

            if ($text.length === 0) {
                return;
            }
            const { left, top, width, height } = this.getBoundingClientRect();
            const centerX = left + width / 2;
            const centerY = top + height / 2;
            const deltaX = (e.clientX - centerX) * 0.2;
            const deltaY = (e.clientY - centerY) * 0.2;
            gsap.to([$btn, $text], {
                duration: 0.8,
                x: deltaX,
                y: deltaY,
                ease: "power3.out",
            });
        });
        $buttons.on("mouseleave", function () {
            const $btn = $(this);
            const $text = $btn.find("svg, span");
            if ($text.length === 0) {
                return;
            }
            gsap.to([$btn, $text], {
                duration: 0.8,
                x: 0,
                y: 0,
                ease: "elastic.out(1, 0.3)",
            });
        });
    }

    /* WooComerce Quantity */
    function northway_shop_quantity() {
        "use strict";
        $("#pxl-wapper .quantity").append(
            '<span class="quantity-icon quantity-down"><i></i></span><span class="quantity-icon quantity-up"><i></i></span>'
        );
        $(".quantity-up").on("click", function () {
            $(this)
                .parents(".quantity")
                .find('input[type="number"]')
                .get(0)
                .stepUp();
            $(this)
                .parents(".woocommerce-cart-form")
                .find(".actions .button")
                .removeAttr("disabled");
        });
        $(".quantity-down").on("click", function () {
            $(this)
                .parents(".quantity")
                .find('input[type="number"]')
                .get(0)
                .stepDown();
            $(this)
                .parents(".woocommerce-cart-form")
                .find(".actions .button")
                .removeAttr("disabled");
        });
        $(".quantity-icon").on("click", function () {
            var quantity_number = $(this)
                .parents(".quantity")
                .find('input[type="number"]')
                .val();
            var add_to_cart_button = $(this)
                .parents(".product, .woocommerce-product-inner")
                .find(".add_to_cart_button");
            add_to_cart_button.attr("data-quantity", quantity_number);
            add_to_cart_button.attr(
                "href",
                "?add-to-cart=" +
                    add_to_cart_button.attr("data-product_id") +
                    "&quantity=" +
                    quantity_number
            );
        });
        $(".woocommerce-cart-form .actions .button").removeAttr("disabled");
    }

    /* Menu Responsive Dropdown */
    function northway_submenu_responsive() {
        var $northway_menu = $(
            ".pxl-header-elementor-main, .pxl-header-elementor-sticky"
        );
        $northway_menu.find(".pxl-menu-primary li").each(function () {
            var $northway_submenu = $(this).find("> ul.sub-menu");
            if ($northway_submenu.length == 1) {
                if (
                    $northway_submenu.offset().left +
                        $northway_submenu.width() +
                        0 >
                    $(window).width()
                ) {
                    $northway_submenu.addClass("pxl-sub-reverse");
                }
            }
        });
    }

    function northway_panel_anchor_toggle() {
        "use strict";
        $(document).on("click", ".pxl-anchor-button", function (e) {
            e.preventDefault();
            e.stopPropagation();
            var target = $(this).attr("data-target");
            $(target).toggleClass("active");
            $("body").addClass("body-overflow");
            $(".pxl-popup--content .wow")
                .addClass("animated")
                .removeClass("aniOut");
            $(".pxl-popup--content .fadeInPopup").removeClass("aniOut");
            if ($(target).find(".pxl-search-form").length > 0) {
                setTimeout(function () {
                    $(target)
                        .find(".pxl-search-form .pxl-search-field")
                        .focus();
                }, 1000);
            }
        });

        $(document).ready(function () {
            $(".pxl-post-taxonomy .pxl-count").each(function () {
                var content = $(this).html();
                if (content) {
                    var newContent = content.replace("(", "");
                    var newContent2 = newContent.replace(")", "");
                    $(this).html(newContent2);
                }
            });
        });

        $(".pxl-anchor-button").each(function () {
            var t_target = $(this).attr("data-target");
            var t_delay = $(this).attr("data-delay-hover");
            $(t_target)
                .find(".pxl-popup--content")
                .css("transition-delay", t_delay + "ms");
            $(t_target)
                .find(".pxl-popup--overlay")
                .css("transition-delay", t_delay + "ms");
        });

        $(document).on(
            "click",
            ".pxl-button.pxl-atc-popup > .btn , .pxl-team-grid .pxl-item--image > a, .pxl-team-carousel1 .pxl-item--image > a",
            function (e) {
                $(".pxl-page-popup").removeClass("active");
                e.preventDefault();
                e.stopPropagation();
                var target = $(this).attr("data-target");
                $(target).toggleClass("active");
                $("body").addClass("body-overflow");
            }
        );

        $(
            ".pxl-hidden-panel-popup .pxl-popup--overlay, .pxl-hidden-panel-popup .pxl-close-popup"
        ).on("click", function () {
            $("body").removeClass("body-overflow");
            $(".pxl-hidden-panel-popup").removeClass("active");
            $(".pxl-popup--content .wow")
                .addClass("aniOut")
                .removeClass("animated");
            $(".pxl-popup--content .fadeInPopup").addClass("aniOut");
        });

        $(".pxl-icon-box6 .btn-show-more").on("click", function () {
            $(this).parents(".pxl-icon-box6").addClass("active");
            $(this)
                .parents(".pxl-icon-box6")
                .find(".content-2")
                .addClass("active");
        });

        $(".pxl-popup--close").on("click", function () {
            $("body").removeClass("body-overflow");
            $(this).parent().removeClass("active");
        });
        $(".pxl-close-popup").on("click", function () {
            $("body").removeClass("body-overflow");
            $(".pxl-page-popup").removeClass("active");
        });
    }

    /* Page Title Scroll Opacity */
    function northway_ptitle_scroll_opacity() {
        var divs = $(
                "#pxl-page-title-elementor.pxl-scroll-opacity .elementor-widget"
            ),
            limit = $(
                "#pxl-page-title-elementor.pxl-scroll-opacity"
            ).outerHeight();
        if (pxl_scroll_top <= limit) {
            divs.css({ opacity: 1 - pxl_scroll_top / limit });
        }
    }

    /* Preloader Default */
    $.fn.extend({
        jQueryImagesLoaded: function () {
            var $imgs = this.find('img[src!=""]');

            if (!$imgs.length) {
                return $.Deferred().resolve().promise();
            }

            var dfds = [];

            $imgs.each(function () {
                var dfd = $.Deferred();
                dfds.push(dfd);
                var img = new Image();
                img.onload = function () {
                    dfd.resolve();
                };
                img.onerror = function () {
                    dfd.resolve();
                };
                img.src = this.src;
            });

            return $.when.apply($, dfds);
        },
    });

    /* Button Parallax */
    function northway_el_parallax() {
        $(".btn-text-parallax").on("mouseenter", function () {
            $(this).addClass("hovered");
        });
        $(".btn-text-parallax").on("mouseleave", function () {
            $(this).removeClass("hovered");
        });
        $(".btn-text-parallax").on("mousemove", function (e) {
            const bounds = this.getBoundingClientRect();
            const centerX = bounds.left + bounds.width / 2;
            const centerY = bounds.top + bounds.height;
            const deltaX = Math.floor(centerX - e.clientX) * 0.172;
            const deltaY = Math.floor(centerY - e.clientY) * 0.273;
            $(this)
                .find(".pxl--btn-text")
                .css({
                    transform:
                        "translate3d(" +
                        deltaX * 0.32 +
                        "px, " +
                        deltaY * 0.32 +
                        "px, 0px)",
                });
            $(this).css({
                transform:
                    "translate3d(" +
                    deltaX * 0.25 +
                    "px, " +
                    deltaY * 0.25 +
                    "px, 0px)",
            });
        });

        $(".el-parallax-wrap").each(function () {
            $(this).on("mouseenter", function () {
                $(this).addClass("hovered");
            });

            $(this).on("mouseleave", function () {
                $(this).removeClass("hovered");
            });

            $(this).on("mousemove", function (e) {
                const bounds = this.getBoundingClientRect();
                const centerX = bounds.left + bounds.width / 2;
                const centerY = bounds.top + bounds.height;
                const deltaX = Math.floor(centerX - e.clientX) * 0.222;
                const deltaY = Math.floor(centerY - e.clientY) * 0.333;
                $(this)
                    .find(".el-parallax-item")
                    .css({
                        transform:
                            "translate3d(" +
                            deltaX * 0.32 +
                            "px, " +
                            deltaY * 0.32 +
                            "px, 0px)",
                    });
            });
        });

        $(".pxl-hover-parallax").on("mousemove", function (e) {
            const bounds = this.getBoundingClientRect();
            const centerX = bounds.left + bounds.width / 2;
            const centerY = bounds.top + bounds.height;
            const deltaX = Math.floor(centerX - e.clientX) * 0.222;
            const deltaY = Math.floor(centerY - e.clientY) * 0.333;
            $(this)
                .find(".pxl-item-parallax")
                .css({
                    transform:
                        "translate3d(" +
                        deltaX * 0.32 +
                        "px, " +
                        deltaY * 0.32 +
                        "px, 0px)",
                });
        });
    }

    function northway_bgr_parallax() {
        setTimeout(function () {
            $(".pxl-section-bg-parallax").each(function () {
                if (
                    !$(this).hasClass("pinned-zoom-clipped") &&
                    !$(this).hasClass("pinned-circle-zoom-clipped") &&
                    !$(this).hasClass("mask-parallax")
                ) {
                    jarallax(this, {
                        speed: 0.2,
                    });
                }
            });
        }, 300);
    }

    /* Back To Top Progress Bar */
    function northway_backtotop_progess_bar() {
        if ($(".pxl-scroll-top").length > 0) {
            var progressPath = document.querySelector(".pxl-scroll-top path");
            var pathLength = progressPath.getTotalLength();
            progressPath.style.transition =
                progressPath.style.WebkitTransition = "none";
            progressPath.style.strokeDasharray = pathLength + " " + pathLength;
            progressPath.style.strokeDashoffset = pathLength;
            progressPath.getBoundingClientRect();
            progressPath.style.transition =
                progressPath.style.WebkitTransition =
                    "stroke-dashoffset 10ms linear";
            var updateProgress = function () {
                var scroll = $(window).scrollTop();
                var height = $(document).height() - $(window).height();
                var progress = pathLength - (scroll * pathLength) / height;
                progressPath.style.strokeDashoffset = progress;
            };
            updateProgress();
            $(window).scroll(updateProgress);
            var offset = 50;
            var duration = 550;
            $(window).on("scroll", function () {
                if ($(this).scrollTop() > offset) {
                    $(".pxl-scroll-top").addClass("active-progress");
                } else {
                    $(".pxl-scroll-top").removeClass("active-progress");
                }
            });
        }
    }

    /* Custom Type File Upload*/
    function northway_type_file_upload() {
        var multipleSupport = typeof $("<input/>")[0].multiple !== "undefined",
            isIE = /msie/i.test(navigator.userAgent);

        $.fn.pxl_custom_type_file = function () {
            return this.each(function () {
                var $file = $(this).addClass("pxl-file-upload-hidden"),
                    $wrap = $('<div class="pxl-file-upload-wrapper">'),
                    $button = $(
                        '<button type="button" class="pxl-file-upload-button">Choose File</button>'
                    ),
                    $input = $(
                        '<input type="text" class="pxl-file-upload-input" placeholder="No File Choose" />'
                    ),
                    $label = $(
                        '<label class="pxl-file-upload-button" for="' +
                            $file[0].id +
                            '">Choose File</label>'
                    );
                $file.css({
                    position: "absolute",
                    opacity: "0",
                    visibility: "hidden",
                });

                $wrap
                    .insertAfter($file)
                    .append($file, $input, isIE ? $label : $button);

                $file.attr("tabIndex", -1);
                $button.attr("tabIndex", -1);

                $button.click(function () {
                    $file.focus().click();
                });

                $file.change(function () {
                    var files = [],
                        fileArr,
                        filename;

                    if (multipleSupport) {
                        fileArr = $file[0].files;
                        for (var i = 0, len = fileArr.length; i < len; i++) {
                            files.push(fileArr[i].name);
                        }
                        filename = files.join(", ");
                    } else {
                        filename = $file.val().split("\\").pop();
                    }

                    $input.val(filename).attr("title", filename).focus();
                });

                $input.on({
                    blur: function () {
                        $file.trigger("blur");
                    },
                    keydown: function (e) {
                        if (e.which === 13) {
                            if (!isIE) {
                                $file.trigger("click");
                            }
                        } else if (e.which === 8 || e.which === 46) {
                            $file.replaceWith(($file = $file.clone(true)));
                            $file.trigger("change");
                            $input.val("");
                        } else if (e.which === 9) {
                            return;
                        } else {
                            return false;
                        }
                    },
                });
            });
        };
        $(".wpcf7-file[type=file]").pxl_custom_type_file();
    }

    //Shop View Grid/List
    function northway_shop_view_layout() {
        $(document).on("click", ".pxl-view-layout .view-icon a", function (e) {
            e.preventDefault();
            if (!$(this).parent("li").hasClass("active")) {
                $(".pxl-view-layout .view-icon").removeClass("active");
                $(this).parent("li").addClass("active");
                $(this)
                    .parents(".pxl-content-area")
                    .find("ul.products")
                    .removeAttr("class")
                    .addClass($(this).attr("data-cls"));
            }
        });
    }

    function northway_height_ct_grid($scope) {
        $(
            ".pxl-portfolio-grid-layout1 .pxl-grid-item,.pxl-portfolio-carousel2 .pxl-swiper-slide"
        ).each(function () {
            var elementHeight = $(this).find(".pxl-post-content-hide").height();
            $(this)
                .find(".pxl-post-content-hide")
                .css("margin-bottom", "-" + elementHeight + "px");
        });
    }
    // Zoom Point
    function northway_zoom_point() {
        $(".pxl-zoom-point").each(function () {
            let scaleOffset = $(this).data("offset");
            let scaleAmount = $(this).data("scale-mount");

            function scrollZoom() {
                const images = document.querySelectorAll("[data-scroll-zoom]");
                let scrollPosY = 0;
                scaleAmount = scaleAmount / 100;

                const observerConfig = {
                    rootMargin: "0% 0% 0% 0%",
                    threshold: 0,
                };

                images.forEach((image) => {
                    let isVisible = false;
                    const observer = new IntersectionObserver(
                        (elements, self) => {
                            elements.forEach((element) => {
                                isVisible = element.isIntersecting;
                            });
                        },
                        observerConfig
                    );

                    observer.observe(image);

                    image.style.transform = `scale(${
                        1 + scaleAmount * percentageSeen(image)
                    })`;

                    window.addEventListener("scroll", () => {
                        if (isVisible) {
                            scrollPosY = window.pageYOffset;
                            image.style.transform = `scale(${
                                1 + scaleAmount * percentageSeen(image)
                            })`;
                        }
                    });
                });

                function percentageSeen(element) {
                    const parent = element.parentNode;
                    const viewportHeight = window.innerHeight;
                    const scrollY = window.scrollY;
                    const elPosY =
                        parent.getBoundingClientRect().top +
                        scrollY +
                        scaleOffset;
                    const borderHeight =
                        parseFloat(
                            getComputedStyle(parent).getPropertyValue(
                                "border-bottom-width"
                            )
                        ) +
                        parseFloat(
                            getComputedStyle(element).getPropertyValue(
                                "border-top-width"
                            )
                        );
                    const elHeight = parent.offsetHeight + borderHeight;

                    if (elPosY > scrollY + viewportHeight) {
                        return 0;
                    } else if (elPosY + elHeight < scrollY) {
                        return 100;
                    } else {
                        const distance = scrollY + viewportHeight - elPosY;
                        let percentage =
                            distance / ((viewportHeight + elHeight) / 100);
                        percentage = Math.round(percentage);

                        return percentage;
                    }
                }
            }

            scrollZoom();
        });
    }

    // Column Offset 1290px
    function northway_col_offset() {
        var w_pxl_row_lg = ($("#pxl-main").width() - 1290) / 2;
        if (pxl_window_width > 1290) {
            $(".pxl-col-offset-right").css(
                "padding-right",
                w_pxl_row_lg + "px"
            );
            $(".pxl-col-offset-left").css("padding-left", w_pxl_row_lg + "px");
        }
    }

    // Column Offset 1750px
    function northway_col_offset_1750() {
        var w_pxl_row_lg = ($("#pxl-main").width() - 1750) / 2;
        if (pxl_window_width > 1750) {
            $(".pxl-col-offset-right-1750").css(
                "padding-right",
                w_pxl_row_lg + "px"
            );
            $(".pxl-col-offset-left-1750").css(
                "padding-left",
                w_pxl_row_lg + "px"
            );
        }
    }

    // Column Offset 1760px
    function northway_col_offset_1760() {
        var w_pxl_row_lg = ($("#pxl-main").width() - 1760) / 2;
        if (pxl_window_width > 1760) {
            $(".pxl-col-offset-right-1760").css(
                "padding-right",
                w_pxl_row_lg + "px"
            );
            $(".pxl-col-offset-left-1760").css(
                "padding-left",
                w_pxl_row_lg + "px"
            );
        }
    }

    // Set width divider left screen width 1600px
    function northway_divider_width_1600() {
        if (pxl_window_width > 1600) {
            $(".pxl-divider-left-1600").css(
                "width",
                "calc((100% - 1600px) / 2)"
            );
            $(".pxl-divider-right-1600").css(
                "width",
                "calc((100% - 1600px) / 2)"
            );
        }
    }

    // Circle Text
    function northway_circle_text() {
        const circleTexts = document.querySelectorAll(
            ".pxl-text-box5 .pxl-circle-text"
        );

        circleTexts.forEach(function (element) {
            const text =
                element.getAttribute("data-text") || element.textContent;
            element.textContent = "";

            const characters = text.split("");
            const spaceWidth = 0.3;
            let totalUnits = 0;

            characters.forEach(function (char) {
                totalUnits += char === " " ? spaceWidth : 1;
            });

            const anglePerUnit = 360 / totalUnits;
            let currentAngle = 0;

            characters.forEach(function (char) {
                const span = document.createElement("span");
                span.textContent = char;
                span.className = "pxl-circle-char";
                span.style.transform = "rotate(" + currentAngle + "deg)";
                element.appendChild(span);

                currentAngle +=
                    char === " " ? anglePerUnit * spaceWidth : anglePerUnit;
            });
        });
    }

    /* Post Slip */
    function northway_post_slip() {
        var windowHeight = window.innerHeight;
        var windowWidth = window.innerWidth;
        var scrollTop = $(window).scrollTop();

        jQuery(".pxl-post--track").each(function () {
            var topLimit = parseFloat(
                jQuery(".pxl-post--block").first().css("top")
            );
            var bottomLimit =
                parseFloat(jQuery(".pxl-post--block").first().outerHeight()) +
                parseFloat(jQuery(".pxl-post-block_2").css("margin-top"));

            jQuery(".pxl-post--block")
                .removeClass("end")
                .each(function (is) {
                    var currentTop =
                        jQuery(this).offset().top - scrollTop - topLimit;

                    var c = parseFloat(currentTop / bottomLimit);
                    if (c < 0) c = 0;
                    else if (c > 1) c = 1;

                    if (c == 0 || is == 0) {
                        jQuery(this).addClass("active");
                    } else jQuery(this).removeClass("active");

                    if (c < 0.5 || is == 0) jQuery(this).addClass("preactive");
                    else jQuery(this).removeClass("preactive");
                });

            jQuery(".pxl-post--block.preactive")
                .slice(0, -1)
                .removeClass("active")
                .addClass("end");
        });
        if ($(".pxl-post-slip").length) {
            var offsetTop =
                $(".pxl-post-slip").offset().top +
                (windowWidth >= 1200 ? 500 : 100) -
                windowHeight;
            if (scrollTop >= offsetTop && !pxl_post_slip) {
                $(".pxl-post-block_1").addClass("slip-active");
                setTimeout(function () {
                    $(".pxl-post-block_2").addClass("slip-active");
                }, 500);
                setTimeout(function () {
                    $(".pxl-post-block_3").addClass("slip-active");
                }, 600);
                setTimeout(function () {
                    $(".pxl-post-block_4").addClass("slip-active");
                }, 700);
                setTimeout(function () {
                    $(".pxl-post-block_5").addClass("slip-active");
                }, 800);
                setTimeout(function () {
                    $(".pxl-post-block_6").addClass("slip-active");
                }, 900);
                setTimeout(function () {
                    $(".pxl-post-block_7").addClass("slip-active");
                }, 1000);
                setTimeout(function () {
                    $(".pxl-post-block_8").addClass("slip-active");
                }, 1100);
                setTimeout(function () {
                    $(".pxl-post-block_9").addClass("slip-active");
                }, 1200);
                setTimeout(function () {
                    $(".pxl-post-block_10").addClass("slip-active");
                }, 1300);
                setTimeout(function () {
                    $(".pxl-post-block_11").addClass("slip-active");
                }, 1400);
                setTimeout(function () {
                    $(".pxl-post-block_12").addClass("slip-active");
                }, 1500);
                setTimeout(function () {
                    $(".pxl-post-block_13").addClass("slip-active");
                }, 1600);
                setTimeout(function () {
                    $(".pxl-post-block_14").addClass("slip-active");
                }, 1700);
                setTimeout(function () {
                    $(".pxl-post-block_15").addClass("slip-active");
                }, 1800);
                setTimeout(function () {
                    $(".pxl-post-block_16").addClass("slip-active");
                }, 1900);
                setTimeout(function () {
                    $(".pxl-post-block_17").addClass("slip-active");
                }, 2000);
                setTimeout(function () {
                    $(".pxl-post-block_18").addClass("slip-active");
                }, 2100);
                setTimeout(function () {
                    $(".pxl-post-block_19").addClass("slip-active");
                }, 2200);
                setTimeout(function () {
                    $(".pxl-post-block_20").addClass("slip-active");
                }, 2300);

                pxl_post_slip = true;
            }
        }
    }
})(jQuery);
