<?php

/**
 * Helper functions for the theme
 *
 * @package Case-Themes
 */


function northway_html($html)
{
    return $html;
}

/**
 * Allowed HTML for SVG icons in safe contexts (e.g., pagination)
 */
if (!function_exists('northway_allowed_svg_html')) {
    function northway_allowed_svg_html()
    {
        return array(
            'a' => array(
                'href' => array(),
                'class' => array(),
                'aria-label' => array(),
                'rel' => array(),
                'title' => array(),
            ),
            'span' => array(
                'class' => array(),
            ),
            'svg' => array(
                'xmlns' => array(),
                'width' => array(),
                'height' => array(),
                'viewBox' => array(),
                'viewbox' => array(),
                'fill' => array(),
                'role' => array(),
                'aria-hidden' => array(),
                'focusable' => array(),
                'class' => array(),
            ),
            'g' => array(
                'transform' => array(),
                'fill' => array(),
                'stroke' => array(),
            ),
            'path' => array(
                'd' => array(),
                'fill' => array(),
                'stroke' => array(),
                'stroke-width' => array(),
                'stroke-linecap' => array(),
                'stroke-linejoin' => array(),
            ),
        );
    }
}

/**
 * Google Fonts
 */
function northway_fonts_url()
{
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';

    if ('off' !== _x('on', 'DM Sans font: on or off', 'northway')) {
        $fonts[] = 'DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap';
    }

    if ('off' !== _x('on', 'Cormorant Garamond font: on or off', 'northway')) {
        $fonts[] = 'Cormorant+Garamond:ital,wght@0,300..700;1,300..700&display=swap';
    }

    if ('off' !== _x('on', 'Inter font: on or off', 'northway')) {
        $fonts[] = 'Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap';
    }

    if ('off' !== _x('on', 'Mr De Haviland font: on or off', 'northway')) {
        $fonts[] = 'Mr+De+Haviland&display=swap';
    }

    if ($fonts) {
        $fonts_url = add_query_arg(array(
            'family' => implode('&family=', $fonts),
            'subset' => urlencode($subsets),
        ), '//fonts.googleapis.com/css2');
    }
    return $fonts_url;
}

/*
 * Get page ID by Slug
*/
function northway_get_id_by_slug($slug, $post_type)
{
    $content = get_page_by_path($slug, OBJECT, $post_type);
    $id = $content->ID;
    return $id;
}

/**
 * Show content by slug
 **/
function northway_content_by_slug($slug, $post_type)
{
    $content = northway_get_content_by_slug($slug, $post_type);

    $id = northway_get_id_by_slug($slug, $post_type);
    echo apply_filters('the_content',  $content);
}

/**
 * Get content by slug
 **/
function northway_get_content_by_slug($slug, $post_type)
{
    $content = get_posts(
        array(
            'name'      => $slug,
            'post_type' => $post_type
        )
    );
    if (!empty($content))
        return $content[0]->post_content;
    else
        return;
}


/**
 * Custom Comment List
 */
function northway_comment_list($comment, $args, $depth)
{
    if ('div' === $args['style']) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo '' . $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <?php endif; ?>
            <div class="comment-inner">

                <div class="comment-content">
                    <div class="comment-holder pxl-flex">
                        <?php if ($args['avatar_size'] != 0) : ?>
                            <div class="comment-image pxl-mr-15">
                                <?php echo get_avatar($comment, 70); ?>
                            </div>
                        <?php endif; ?>
                        <div class="comment-meta ">
                            <h4 class="comment-title">
                                <?php printf('%s', get_comment_author_link()); ?>
                            </h4>
                            <span class="comment-date">
                                <?php echo get_comment_date('F d, Y') . ', at ' . get_comment_time(); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="comment-text "><?php comment_text(); ?></div>
                <div class="comment-reply">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="12" viewBox="0 0 17 12" fill="none">
                        <path d="M5.78469 0.237764C6.04151 0.0404386 6.37601 -0.0622452 6.70404 0.040441C7.10544 0.16528 7.36658 0.493481 7.37522 0.888132C7.38556 1.39976 7.37943 1.91268 7.37652 2.42483C7.9989 2.45678 8.62011 2.52898 9.23118 2.63588C10.1203 2.79293 10.9836 3.0406 11.8101 3.38089C12.7295 3.75943 13.5841 4.27691 14.3135 4.92124C15.166 5.6743 15.8069 6.59853 16.2493 7.61134C16.7931 8.85769 16.9928 10.221 16.998 11.5616C17.0028 11.6024 16.9988 11.6428 16.9878 11.6817C16.9588 11.801 16.8719 11.8967 16.7578 11.9502C16.733 11.9634 16.7072 11.9744 16.6809 11.9827C16.612 12.0034 16.5446 12.0046 16.4817 11.9912C16.3325 11.9647 16.208 11.8541 16.1582 11.7203C16.1554 11.7139 16.1526 11.7074 16.15 11.7008C16.1306 11.6505 16.109 11.6001 16.0875 11.5498C16.0594 11.4834 16.1306 11.6424 16.0831 11.5397C16.0724 11.5196 16.0637 11.4975 16.0529 11.4773C16.0076 11.3867 15.9601 11.3001 15.9105 11.2135C15.8069 11.0364 15.6904 10.8672 15.563 10.7061C15.5458 10.684 15.4703 10.6014 15.5587 10.7001C15.5436 10.682 15.5307 10.6659 15.5156 10.6477C15.481 10.6075 15.4465 10.5672 15.4098 10.5289C15.3429 10.4565 15.2739 10.386 15.2026 10.3175C15.0537 10.1746 14.8962 10.0397 14.7322 9.9128C14.6961 9.88589 14.6586 9.86036 14.6233 9.83273C14.6947 9.89023 14.5988 9.8148 14.5768 9.79803C14.4991 9.74568 14.4214 9.69332 14.3416 9.64298C14.1819 9.54231 14.0178 9.44567 13.8495 9.35708C13.6812 9.26647 13.5085 9.18189 13.3316 9.10336C13.2431 9.0651 13.1546 9.02483 13.064 8.98858C13.0263 8.97352 12.9886 8.95982 12.9509 8.94407C13.0391 8.98186 12.9021 8.92334 12.8719 8.91207C12.1446 8.63622 11.3871 8.43688 10.6188 8.28788C10.2541 8.21539 9.88509 8.157 9.51606 8.10666C9.48682 8.10276 9.45848 8.09888 9.42988 8.09498C9.43226 8.09533 9.42699 8.09476 9.40815 8.09256C9.38657 8.09055 9.36499 8.08653 9.34341 8.08452L9.08444 8.05431C8.91826 8.03619 8.74993 8.02008 8.58375 8.00598C8.1831 7.97186 7.78011 7.94871 7.37737 7.93565V9.09129C7.37737 9.21411 7.37953 9.33694 7.37737 9.45976C7.37089 9.84636 7.13134 10.1544 6.75152 10.2974C6.41486 10.4222 6.05877 10.3236 5.78901 10.1182C5.75017 10.09 5.71347 10.0598 5.67679 10.0316C5.47393 9.87455 5.27322 9.71749 5.07252 9.56044C4.37761 9.01477 3.68055 8.47111 2.98348 7.92544C2.29721 7.38984 1.61309 6.85424 0.928969 6.31864C0.745531 6.17568 0.564241 6.03272 0.380803 5.88976C0.352749 5.86762 0.322533 5.84546 0.294479 5.8213C-0.0939697 5.49309 -0.0874995 4.92527 0.251317 4.5729C0.346272 4.47424 0.471449 4.3937 0.579353 4.30914C0.829692 4.11382 1.07788 3.9185 1.32822 3.72319C2.05765 3.15336 2.7871 2.58151 3.51654 2.01168C4.1467 1.51837 4.77903 1.02304 5.41135 0.529726C5.53652 0.433077 5.65952 0.334413 5.78469 0.237764Z" fill="currentColor" />
                    </svg>
                    <?php comment_reply_link(array_merge($args, array(
                        'add_below' => $add_below,
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth']
                    ))); ?>
                </div>
            </div>
            <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif;
        }


        /**
         * Paginate Links
         */
        function northway_ajax_paginate_links($link)
        {
            $parts = parse_url($link);
            if (!isset($parts['query'])) return $link;
            parse_str($parts['query'], $query);
            if (isset($query['page']) && !empty($query['page'])) {
                return '#' . $query['page'];
            } else {
                return '#1';
            }
        }


        /**
         * RGB Color
         */
        function northway_hex_rgb($color)
        {

            $default = '0,0,0';

            //Return default if no color provided
            if (empty($color))
                return $default;

            //Sanitize $color if "#" is provided 
            if ($color[0] == '#') {
                $color = substr($color, 1);
            }

            //Check if color has 6 or 3 characters and get values
            if (strlen($color) == 6) {
                $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
            } elseif (strlen($color) == 3) {
                $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
            } else {
                return $default;
            }

            //Convert hexadec to rgb
            $rgb =  array_map('hexdec', $hex);

            $output = implode(",", $rgb);

            //Return rgb(a) color string
            return $output;
        }

        /**
         * Image Size Crop
         */
        if (!function_exists('northway_get_image_by_size')) {
            function northway_get_image_by_size($params = array())
            {
                $params = array_merge(array(
                    'post_id' => null,
                    'attach_id' => null,
                    'thumb_size' => 'thumbnail',
                    'class' => '',
                ), $params);

                if (! $params['thumb_size']) {
                    $params['thumb_size'] = 'thumbnail';
                }

                if (! $params['attach_id'] && ! $params['post_id']) {
                    return false;
                }

                $post_id = $params['post_id'];

                $attach_id = $post_id ? get_post_thumbnail_id($post_id) : $params['attach_id'];
                $attach_id = apply_filters('pxl_object_id', $attach_id);
                $thumb_size = $params['thumb_size'];
                $thumb_class = (isset($params['class']) && '' !== $params['class']) ? $params['class'] . ' ' : '';

                global $_wp_additional_image_sizes;
                $thumbnail = '';

                $sizes = array(
                    'thumbnail',
                    'thumb',
                    'medium',
                    'medium_large',
                    'large',
                    'full',
                );
                if (is_string($thumb_size) && ((! empty($_wp_additional_image_sizes[$thumb_size]) && is_array($_wp_additional_image_sizes[$thumb_size])) || in_array($thumb_size, $sizes, true))) {
                    $attributes = array('class' => $thumb_class . 'attachment-' . $thumb_size);
                    $thumbnail = wp_get_attachment_image($attach_id, $thumb_size, false, $attributes);
                    $thumbnail_url = wp_get_attachment_image_url($attach_id, $thumb_size, false);
                } elseif ($attach_id) {
                    if (is_string($thumb_size)) {
                        preg_match_all('/\d+/', $thumb_size, $thumb_matches);
                        if (isset($thumb_matches[0])) {
                            $thumb_size = array();
                            $count = count($thumb_matches[0]);
                            if ($count > 1) {
                                $thumb_size[] = $thumb_matches[0][0]; // width
                                $thumb_size[] = $thumb_matches[0][1]; // height
                            } elseif (1 === $count) {
                                $thumb_size[] = $thumb_matches[0][0]; // width
                                $thumb_size[] = $thumb_matches[0][0]; // height
                            } else {
                                $thumb_size = false;
                            }
                        }
                    }
                    if (is_array($thumb_size)) {
                        // Resize image to custom size
                        $p_img = pxl_resize($attach_id, null, $thumb_size[0], $thumb_size[1], true);
                        $alt = trim(wp_strip_all_tags(get_post_meta($attach_id, '_wp_attachment_image_alt', true)));
                        $attachment = get_post($attach_id);
                        if (! empty($attachment)) {
                            $title = trim(wp_strip_all_tags($attachment->post_title));

                            if (empty($alt)) {
                                $alt = trim(wp_strip_all_tags($attachment->post_excerpt)); // If not, Use the Caption
                            }
                            if (empty($alt)) {
                                $alt = $title;
                            }
                            if ($p_img) {

                                $attributes = pxl_stringify_attributes(array(
                                    'class' => $thumb_class,
                                    'src' => $p_img['url'],
                                    'width' => $p_img['width'],
                                    'height' => $p_img['height'],
                                    'alt' => $alt,
                                    'title' => $title,
                                ));

                                $thumbnail = '<img ' . $attributes . ' />';
                            }
                        }
                    }
                    $thumbnail_url = $p_img['url'];
                }

                $p_img_large = wp_get_attachment_image_src($attach_id, 'large');

                return apply_filters('pxl_el_getimagesize', array(
                    'thumbnail' => $thumbnail,
                    'url' => $thumbnail_url,
                    'p_img_large' => $p_img_large,
                ), $attach_id, $params);
            }
        }

        /**
         * Search Form
         */
        function northway_header_mobile_search_form()
        {
            $search_mobile = northway()->get_theme_opt('search_mobile', false);
            $search_placeholder_mobile = northway()->get_theme_opt('search_placeholder_mobile');
            if ($search_mobile) : ?>
            <div class="pxl-header-mobile-search pxl-hide-xl">
                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="text" placeholder="<?php if (!empty($search_placeholder_mobile)) {
                                                        echo esc_attr($search_placeholder_mobile);
                                                    } else {
                                                        esc_attr_e('Search...', 'northway');
                                                    } ?>" name="s" class="search-field" />
                    <button type="submit" class="search-submit"><i class="bi-search"></i></button>
                </form>
            </div>
        <?php endif;
        }

        /**
         * Year Shortcode [pxl_year]
         */
        if (function_exists('pxl_register_shortcode')) {
            function northway_year_shortcode()
            {
                ob_start(); ?>
            <span><?php the_date('Y'); ?></span>
            <?php $output = ob_get_clean();
                return $output;
            }
            pxl_register_shortcode('pxl_year', 'northway_year_shortcode');
        }

        /* Highlight Shortcode  */
        if (function_exists('pxl_register_shortcode')) {
            function northway_text_highlight_shortcode($atts = array())
            {
                extract(shortcode_atts(array(
                    'text' => '',
                    'style' => '',
                ), $atts));

                ob_start();
                if (!empty($text)) : ?>
                <span class="pxl-title--highlight <?php echo esc_attr($style); ?>">
                    <?php echo wp_kses_post($text); ?>
                </span>
            <?php endif;
                $output = ob_get_clean();

                return $output;
            }
            pxl_register_shortcode('highlight', 'northway_text_highlight_shortcode');
        }

        if (function_exists('pxl_register_shortcode')) {
            function northway_text_highlight_shortcode_editor($atts = array())
            {
                extract(shortcode_atts(array(
                    'text' => '',
                ), $atts));

                ob_start();
                if (!empty($text)) : ?>
                <span class="pxl-text--highlight">
                    <?php echo esc_attr($text); ?>
                </span>
            <?php endif;
                $output = ob_get_clean();

                return $output;
            }
            pxl_register_shortcode('pxl_highlight', 'northway_text_highlight_shortcode_editor');
        }

        /* Typewriter Shortcode  */
        if (function_exists('pxl_register_shortcode')) {
            function northway_text_typewriter_shortcode($atts = array())
            {
                extract(shortcode_atts(array(
                    'text' => '',
                ), $atts));

                ob_start();
                if (!empty($text)) :
                    $arr_str = explode(',', $text);
            ?>
                <span class="pxl-title--typewriter">
                    <?php foreach ($arr_str as $index => $value) {
                        $item_count = '';
                        if ($index == 0) {
                            $item_count = 'is-active';
                        }
                        $arr_str[$index] = '<span class="pxl-item--text ' . $item_count . '">' . $value . '</span>';
                    }
                    $str = implode(' ', $arr_str);
                    echo wp_kses_post($str); ?>
                </span>
            <?php endif;
                $output = ob_get_clean();

                return $output;
            }
            pxl_register_shortcode('typewriter', 'northway_text_typewriter_shortcode');
        }

        /* Button Shortcode  */
        if (function_exists('pxl_register_shortcode')) {
            function northway_btn_shortcode($atts = array())
            {
                extract(shortcode_atts(array(
                    'text' => '',
                    'style' => '',
                    'icon_class' => '',
                    'text_color' => '',
                ), $atts));

                ob_start();
                if (!empty($text)) : ?>
                <span class="btn <?php echo esc_attr($style); ?>" <?php if (!empty($text_color)) { ?>style="color: <?php echo esc_attr($text_color); ?>" <?php } ?>>
                    <span class="pxl--btn-text" data-text="<?php echo esc_attr($text); ?>">
                        <?php $chars = str_split($text);
                        foreach ($chars as $value) {
                            if ($value == ' ') {
                                echo '<span class="spacer">&nbsp;</span>';
                            } else {
                                echo '<span>' . esc_attr($value) . '</span>';
                            }
                        } ?>
                    </span>
                    <?php if (!empty($icon_class)) : ?>
                        <i class="<?php echo esc_attr($icon_class); ?> pxl-ml-14"></i>
                    <?php endif; ?>
                </span>
            <?php endif;
                $output = ob_get_clean();

                return $output;
            }
            pxl_register_shortcode('pxl_button', 'northway_btn_shortcode');
        }

        if (function_exists('pxl_register_shortcode')) {
            function northway_btn_video_shortcode($atts = array())
            {
                extract(shortcode_atts(array(
                    'text' => '',
                    'url' => '',
                ), $atts));

                ob_start();
                if (!empty($text)) : ?>
                <a class="shortcode-btn-style1 pxl-action-popup btn-text-parallax" href="<?php echo esc_url($url); ?>">
                    <span class="shortcode-btn-icon bi-play-fill pxl-mr-18"></span>
                    <span class="pxl--btn-text"><?php echo pxl_print_html($text); ?></span>
                </a>
            <?php endif;
                $output = ob_get_clean();

                return $output;
            }
            pxl_register_shortcode('pxl_btn_video', 'northway_btn_video_shortcode');
        }


        if (function_exists('pxl_register_shortcode')) {
            function northway_btn_submit_shortcode($atts = array())
            {
                extract(shortcode_atts(array(
                    'text' => '',
                    'style' => 'btn btn-outline-gradient btn-border-3x btn-text-nina wpcf7-submit',
                ), $atts));

                ob_start();
                if (!empty($text)) : ?>
                <button class="<?php echo esc_attr($style); ?>" type="submit">
                    <span class="pxl--btn-text" data-text="<?php echo esc_attr($text); ?>">
                        <?php $chars = str_split($text);
                        foreach ($chars as $value) {
                            if ($value == ' ') {
                                echo '<span class="spacer">&nbsp;</span>';
                            } else {
                                echo '<span>' . esc_attr($value) . '</span>';
                            }
                        } ?>
                    </span>
                </button>
            <?php endif;
                $output = ob_get_clean();

                return $output;
            }
            pxl_register_shortcode('pxl_button_submit', 'northway_btn_submit_shortcode');
        }

        if (function_exists('pxl_register_shortcode')) {
            function northway_slider_arrow($atts = array())
            {
                extract(shortcode_atts(array(
                    'type' => 'next',
                    'style' => 'style-1',
                ), $atts));

                ob_start(); ?>
            <div class="pxl-slider-rev-arrow">
                <?php if ($type == 'next') { ?>
                    <i class="bi-chevron-right"></i>
                <?php } else { ?>
                    <i class="bi-chevron-left"></i>
                <?php } ?>
            </div>
        <?php $output = ob_get_clean();

                return $output;
            }
            pxl_register_shortcode('slider_arrow', 'northway_slider_arrow');
        }

        // Shortcode Row/Column Grid
        if (function_exists('pxl_register_shortcode')) {
            function northway_start_row_shortcode($atts = array())
            {
                ob_start(); ?>
            <div class="pxl-post-container">
                <div class="row pxl-post-row">
                <?php $output = ob_get_clean();
                return $output;
            }
            pxl_register_shortcode('pxl_start_row', 'northway_start_row_shortcode');
        }

        if (function_exists('pxl_register_shortcode')) {
            function northway_end_row_shortcode($atts = array())
            {
                ob_start(); ?>
                </div>
            </div>
        <?php $output = ob_get_clean();
                return $output;
            }
            pxl_register_shortcode('pxl_end_row', 'northway_end_row_shortcode');
        }

        if (function_exists('pxl_register_shortcode')) {
            function northway_start_col_shortcode($atts = array())
            {
                extract(shortcode_atts(array(
                    'class' => 'col-12',
                ), $atts));
                ob_start(); ?>
            <div class="<?php echo esc_attr($class); ?>">
            <?php $output = ob_get_clean();
                return $output;
            }
            pxl_register_shortcode('pxl_start_column', 'northway_start_col_shortcode');
        }

        if (function_exists('pxl_register_shortcode')) {
            function northway_end_col_shortcode($atts = array())
            {
                ob_start(); ?>
            </div>
        <?php $output = ob_get_clean();
                return $output;
            }
            pxl_register_shortcode('pxl_end_column', 'northway_end_col_shortcode');
        }

        // End Shortcode Row/Column Grid

        /* Gallery Shortcode  */
        if (function_exists('pxl_register_shortcode')) {
            function northway_gallery_shortcode($atts = array())
            {
                extract(shortcode_atts(array(
                    'link_video' => '',
                    'images_id' => '',
                    'col' => '2',
                    'img_size' => '800x608',
                    'masonry' => '',
                ), $atts));

                $pxl_g_id = uniqid();

                ob_start();
        ?>
            <div id="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>" class="pxl-gallery gallery-<?php echo esc_attr($col); ?>-columns <?php if (!empty($masonry)) {
                                                                                                                                            echo 'masonry-' . esc_attr($masonry);
                                                                                                                                        } ?>">
                <?php
                $pxl_images = explode(',', $images_id);
                foreach ($pxl_images as $key => $img_id) :
                    $img = pxl_get_image_by_size(array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $img_size,
                        'class'      => '',
                    ));
                    $thumbnail = $img['thumbnail'];
                    $thumbnail_url = $img['url'];
                ?>
                    <div class="pxl--item">
                        <div class="pxl--item-inner">
                            <a href="<?php echo esc_url($thumbnail_url); ?>" data-elementor-lightbox-slideshow="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>"><?php echo northway_html($thumbnail); ?></a>
                            <?php if ($key == 0 && !empty($link_video)) : ?>
                                <a class="pxl-btn-video style2 pxl-action-popup" href="<?php echo esc_url($link_video); ?>"><i class="fa fa-play"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        <?php
                $output = ob_get_clean();

                return $output;
            }
            pxl_register_shortcode('pxl_gallery', 'northway_gallery_shortcode');
        }

        /* Addd shortcode Video button */
        if (function_exists('pxl_register_shortcode')) {
            function northway_video_button_shortcode($atts = array())
            {
                extract(shortcode_atts(array(
                    'link' => '',
                    'text' => '',
                    'class' => 'style1',
                ), $atts));

                ob_start();
        ?>
            <a href="<?php echo esc_url($link); ?>" class="pxl-button-video1 btn-video pxl-video-popup <?php echo esc_attr($class); ?>">
                <span>
                    <i class="bi-play-fill"></i>
                </span>
                <?php if (!empty($text)) : ?>
                    <span class="slider-video-title"><?php echo pxl_print_html($text); ?></span>
                <?php endif; ?>
            </a>
        <?php
                $output = ob_get_clean();

                return $output;
            }
            pxl_register_shortcode('pxl_video_button', 'northway_video_button_shortcode');
        }

        /* Get Category Shortcode  */
        if (function_exists('pxl_register_shortcode')) {
            function northway_post_category_shortcode($atts = array())
            {
                extract(shortcode_atts(array(
                    'items' => '6',
                    'columns' => '2',
                ), $atts));

                ob_start();
                $categories = get_categories(); ?>
            <div class="pxl-wg-categories columns-<?php echo esc_attr($columns); ?>">
                <?php foreach ($categories as $category) {
                    $term_bg = get_term_meta($category->term_id, 'bg_category', true); ?>
                    <div class="pxl-category">
                        <div class="pxl-category--inner">
                            <div class="pxl-category--img bg-image" <?php if (!empty($term_bg["url"])) : ?>style="background-image: url(<?php echo esc_url($term_bg["url"]); ?>);" <?php endif; ?>></div>
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"></a>
                            <span><?php echo pxl_print_html($category->name); ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php $output = ob_get_clean();

                return $output;
            }
            pxl_register_shortcode('pxl_post_category', 'northway_post_category_shortcode');
        }

        /* Slider 1  */
        if (function_exists('pxl_register_shortcode')) {
            function northway_slider_price_shortcode($atts = array())
            {
                extract(shortcode_atts(array(
                    'price' => '',
                    'desc' => '',
                ), $atts));

                ob_start();
                if (!empty($price) || !empty($desc)) : ?>
                <div class="pxl-slider-price1">
                    <div class="pxl-item--inner">
                        <div class="pxl-item--price"><?php echo pxl_print_html($price); ?></div>
                        <div class="pxl-item--desc"><?php echo pxl_print_html($desc); ?></div>
                    </div>
                </div>
            <?php endif;
                $output = ob_get_clean();

                return $output;
            }
            pxl_register_shortcode('pxl_slider_price', 'northway_slider_price_shortcode');
        }

        /**
         * Custom Widget Categories - Count
         */
        add_filter('wp_list_categories', 'northway_wg_category_count');
        function northway_wg_category_count($output)
        {
            $dir = is_rtl() ? 'pxl-left' : 'pxl-right';
            $output = str_replace("\t", '', $output);
            $output = str_replace(")\n</li>", ')</li>', $output);
            $output = str_replace('</a> (', '<span class="pxl-count pxl-l-4 ' . $dir . '">', $output);
            $output = str_replace(")</li>", "</span></a></li>", $output);
            $output = str_replace("\n<ul", "</span></a>\n<ul", $output);
            return $output;
        }


        /**
         * Custom Widget Archive - Count
         */
        add_filter('get_archives_link', 'northway_wg_archive_count');
        function northway_wg_archive_count($links)
        {
            $dir = is_rtl() ? 'pxl-right' : 'pxl-left';
            $links = str_replace('</a>&nbsp;(', ' <span class="pxl-count pxl-l-4">', $links);
            $links = str_replace(')', '</span></a>', $links);
            return $links;
        }

        /**
         * Custom Widget Product Categories 
         */
        add_filter('wp_list_categories', 'northway_wc_cat_count_span');
        function northway_wc_cat_count_span($links)
        {
            $dir = is_rtl() ? 'pxl-left' : 'pxl-right';
            $links = str_replace('</a> <span class="count">(', ' <span class="pxl-count  ' . $dir . '">', $links);
            $links = str_replace(')</span>', '</span></a>', $links);
            return $links;
        }

        /**
         * Get mega menu builder ID
         */
        function northway_get_mega_menu_builder_id()
        {
            $mn_id = [];
            $menus = get_terms('nav_menu', array('hide_empty' => false));
            if (is_array($menus) && ! empty($menus)) {
                foreach ($menus as $menu) {
                    if (is_object($menu)) {
                        $menu_obj = get_term($menu->term_id, 'nav_menu');
                        $menu = wp_get_nav_menu_object($menu_obj);
                        $menu_items = wp_get_nav_menu_items($menu->term_id, array('update_post_term_cache' => false));
                        foreach ($menu_items as $menu_item) {
                            if (!empty($menu_item->pxl_megaprofile)) {
                                $mn_id[] = (int)$menu_item->pxl_megaprofile;
                            }
                        }
                    }
                }
            }
            return $mn_id;
        }

        /**
         * Get page popup builder ID
         */
        function northway_get_page_popup_builder_id()
        {
            $pp_id = [];
            $page_popup = get_terms('nav_menu', array('hide_empty' => false));
            if (is_array($page_popup) && ! empty($page_popup)) {
                foreach ($page_popup as $page) {
                    if (is_object($page)) {
                        $page_obj = get_term($page->term_id, 'nav_menu');
                        $page = wp_get_nav_menu_object($page_obj);
                        $page_items = wp_get_nav_menu_items($page->term_id, array('update_post_term_cache' => false));
                        foreach ($page_items as $page_item) {
                            if (!empty($page_item->pxl_page_popup)) {
                                $pp_id[] = (int)$page_item->pxl_page_popup;
                            }
                        }
                    }
                }
            }
            return $pp_id;
        }

        /* Mouse Move Animation */
        function northway_mouse_move_animation()
        {
            $mouse_move_animation = northway()->get_theme_opt('mouse_move_animation', false);
            if ($mouse_move_animation) {
                wp_enqueue_script('northway-cursor', get_template_directory_uri() . '/assets/js/libs/cursor.js', array('jquery'), '1.0.0', true); ?>
            <div class="pxl-cursor pxl-js-cursor">
                <div class="pxl-cursor-wrapper">
                    <div class="pxl-cursor--follower pxl-js-follower"></div>
                    <div class="pxl-cursor--label pxl-js-label"></div>
                    <div class="pxl-cursor--drap pxl-js-drap"></div>
                    <div class="pxl-cursor--icon pxl-js-icon"></div>
                </div>
            </div>
        <?php }
        }


        /**
         * Start - Cookie Policy
         */
        function northway_cookie_policy()
        {
            $cookie_policy = northway()->get_theme_opt('cookie_policy', 'hide');
            $cookie_policy_description = northway()->get_theme_opt('cookie_policy_description');
            $cookie_policy_btntext = northway()->get_theme_opt('cookie_policy_btntext');
            $cookie_policy_link = get_permalink(northway()->get_theme_opt('cookie_policy_link'));
            wp_enqueue_script('pxl-cookie'); ?>
        <?php if ($cookie_policy == 'show' && !empty($cookie_policy_description)) : ?>
            <div class="pxl-cookie-policy">
                <div class="pxl-item--icon pxl-mr-8"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/cookie.png'); ?>" alt="<?php echo esc_attr($cookie_policy_btntext); ?>" /></div>
                <div class="pxl-item--description">
                    <?php echo esc_attr($cookie_policy_description); ?>
                    <a class="pxl-item--link" href="<?php echo esc_url($cookie_policy_link); ?>" target="_blank"><?php echo pxl_print_html($cookie_policy_btntext); ?></a>
                </div>
                <div class="pxl-item--close pxl-close"></div>
            </div>
        <?php endif; ?>
    <?php }
        /**
         * End - Cookie Policy
         */

        /**
         * Start - Subscribe Popup
         */
        function northway_subscribe_popup()
        {
            $subscribe = northway()->get_theme_opt('subscribe', 'hide');
            $subscribe_layout = northway()->get_theme_opt('subscribe_layout');
            $popup_effect = northway()->get_theme_opt('popup_effect', 'fade');
            $args = [
                'subscribe_layout' => $subscribe_layout
            ];
            wp_enqueue_script('pxl-cookie'); ?>
        <?php if ($subscribe == 'show' && isset($args['subscribe_layout']) && $args['subscribe_layout'] > 0) : ?>
            <div class="pxl-popup pxl-subscribe-popup pxl-effect-<?php echo esc_attr($popup_effect); ?>">
                <div class="pxl-popup--content">
                    <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display($args['subscribe_layout']); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php }
        /**
         * End - Subscribe Popup
         */


        /**
         * Start - User custom fields.
         */
        add_action('show_user_profile', 'northway_user_fields');
        add_action('edit_user_profile', 'northway_user_fields');
        function northway_user_fields($user)
        {

            $user_name = get_user_meta($user->ID, 'user_name', true);
            $user_position = get_user_meta($user->ID, 'user_position', true);

            $user_facebook = get_user_meta($user->ID, 'user_facebook', true);
            $user_twitter = get_user_meta($user->ID, 'user_twitter', true);
            $user_instagram = get_user_meta($user->ID, 'user_instagram', true);
            $user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
            $user_youtube = get_user_meta($user->ID, 'user_youtube', true);

    ?>
        <h3><?php esc_html_e('Theme Custom', 'northway'); ?></h3>
        <table class="form-table">
            <tr>
                <th><label for="user_name"><?php esc_html_e('Author Name', 'northway'); ?></label></th>
                <td>
                    <input id="user_name" name="user_name" type="text" value="<?php echo esc_attr(isset($user_name) ? $user_name : ''); ?>" />
                </td>
            </tr>

            <tr>
                <th><label for="user_position"><?php esc_html_e('Author Position', 'northway'); ?></label></th>
                <td>
                    <input id="user_position" name="user_position" type="text" value="<?php echo esc_attr(isset($user_position) ? $user_position : ''); ?>" />
                </td>
            </tr>

            <tr>
                <th><label for="user_facebook"><?php esc_html_e('Facebook', 'northway'); ?></label></th>
                <td>
                    <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_twitter"><?php esc_html_e('Twitter', 'northway'); ?></label></th>
                <td>
                    <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_instagram"><?php esc_html_e('Instagram', 'northway'); ?></label></th>
                <td>
                    <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'northway'); ?></label></th>
                <td>
                    <input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
                </td>
            </tr>
            <tr>
                <th><label for="user_youtube"><?php esc_html_e('Youtube', 'northway'); ?></label></th>
                <td>
                    <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
                </td>
            </tr>
        </table>
        <?php
        }


        function northway_get_user_name()
        {

            $user_name = get_user_meta(get_the_author_meta('ID'), 'user_name', true);
            if (!empty($user_name)) { ?>
            <div class="pxl-user--name">
                <?php echo esc_attr($user_name); ?>
            </div>
        <?php } else { ?>
            <div class="pxl-user--name">
                <?php the_author_posts_link(); ?>
            </div>
        <?php }
        }

        function northway_get_user_position()
        {

            $user_position = get_user_meta(get_the_author_meta('ID'), 'user_position', true);
            if (!empty($user_position)) { ?>
            <div class="pxl-user--position">
                <?php echo esc_attr($user_position); ?>
            </div>
        <?php }
        }
        /**
         * End - User custom fields.
         */

        /* Start Custom Field Media */
        function northway_attachment_field_credit($form_fields, $post)
        {
            $form_fields['img_theme_custom_link'] = array(
                'label' => 'Theme Custom Link',
                'input' => 'text',
                'value' => get_post_meta($post->ID, 'img_theme_custom_link', true),
            );

            return $form_fields;
        }

        add_filter('attachment_fields_to_edit', 'northway_attachment_field_credit', 1, 2);


        function northway_attachment_field_credit_save($post, $attachment)
        {
            if (isset($attachment['img_theme_custom_link']))
                update_post_meta($post['ID'], 'img_theme_custom_link', $attachment['img_theme_custom_link']);

            return $post;
        }

        add_filter('attachment_fields_to_save', 'northway_attachment_field_credit_save', 1, 2);
        /* End Custom Field Media */

        /* Author Social */
        function northway_get_user_social()
        {

            $user_facebook = get_user_meta(get_the_author_meta('ID'), 'user_facebook', true);
            $user_twitter = get_user_meta(get_the_author_meta('ID'), 'user_twitter', true);
            $user_linkedin = get_user_meta(get_the_author_meta('ID'), 'user_linkedin', true);
            $user_instagram = get_user_meta(get_the_author_meta('ID'), 'user_instagram', true);
            $user_youtube = get_user_meta(get_the_author_meta('ID'), 'user_youtube', true); ?>
        <div class="pxl-post--author-social">
            <?php if (!empty($user_facebook)) { ?>
                <a href="<?php echo esc_url($user_facebook); ?>" class="pxl-mr-18"><i class="fab fa-facebook-f"></i></a>
            <?php } ?>
            <?php if (!empty($user_twitter)) { ?>
                <a href="<?php echo esc_url($user_twitter); ?>" class="pxl-mr-18"><i class="fab fa-x-twitter"></i></a>
            <?php } ?>
            <?php if (!empty($user_linkedin)) { ?>
                <a href="<?php echo esc_url($user_linkedin); ?>" class="pxl-mr-18"><i class="fab fa-linkedin"></i></a>
            <?php } ?>
            <?php if (!empty($user_instagram)) { ?>
                <a href="<?php echo esc_url($user_instagram); ?>" class="pxl-mr-18"><i class="fab fa-instagram"></i></a>
            <?php } ?>
            <?php if (!empty($user_youtube)) { ?>
                <a href="<?php echo esc_url($user_youtube); ?>" class="pxl-mr-18"><i class="bi-youtube"></i></a>
            <?php } ?>
        </div>
    <?php }

        /* Custom Widget Title */
        function northway_custom_widget_title($title, $instance, $widget)
        {
            if (empty($title)) {
                return $title;
            }
            if ($title === 'RSS' || strpos($title, 'RSS') !== false) {
                $title = preg_replace('/<a class="rsswidget rss-widget-feed".*?<\/a>/', '', $title);
                $title = preg_replace('/<img class="rss-widget-icon".*?>/', '', $title);
                $title = preg_replace('/&lt;span class="pxl-widget-title-icon"&gt;.*?&lt;\/span&gt; /', '', $title);
                $title = preg_replace('/<span class="pxl-widget-title-icon">.*?<\/span> /', '', $title);
                $title = trim($title);
                $title = html_entity_decode($title, ENT_QUOTES, 'UTF-8');
                return $title;
            }

            $icon = '<i class="flaticon-star"></i>';

            return $icon . $title;
        }
        add_filter('widget_title', 'northway_custom_widget_title', 10, 3);
