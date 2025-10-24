<?php

use Elementor\Embed;

if (!function_exists('northway_get_post_grid')) {
    function northway_get_post_grid($posts = [], $settings = [])
    {
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
                northway_get_post_grid_layout1($posts, $settings);
                break;

            case 'portfolio-1':
                northway_get_portfolio_grid_layout1($posts, $settings);
                break;

            case 'service-1':
                northway_get_service_grid_layout1($posts, $settings);
                break;

            case 'service-2':
                northway_get_service_grid_layout2($posts, $settings);
                break;

            default:
                return false;
                break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function northway_get_post_grid_layout1($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '430x640';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if (isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if ($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if ($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if (!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }
            $author_id = $post->post_author;
            $author = get_user_by('id', $author_id);
            if (!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = ''; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <svg xmlns="http://www.w3.org/2000/svg" width="67" height="67" viewBox="0 0 67 67" fill="none" class="pxl-post--fold">
                        <path d="M1 46V1L66 66H21C9.95431 66 1 57.0457 1 46Z" fill="#F8F8F2"/>
                        <path d="M0.808594 0.538086C0.995431 0.460695 1.21052 0.503485 1.35352 0.646484L66.3535 65.6465C66.4965 65.7895 66.5393 66.0046 66.4619 66.1914C66.3845 66.3782 66.2022 66.5 66 66.5H21C9.67816 66.5 0.5 57.3218 0.5 46V1C0.5 0.797792 0.621793 0.615492 0.808594 0.538086Z" stroke="#666F78" stroke-linejoin="round"/>
                    </svg>
                    <div class="pxl-post--holder">
                        <div class="pxl-post--meta">
                            <?php if ($show_author == 'true'): ?>
                                <div class="pxl-post--author">
                                    <i class="flaticon-user"></i>
                                    <span>
                                        <?php echo esc_html__('By ', 'northway') ?>
                                        <?php echo esc_html($author->display_name); ?>
                                    <span>
                                </div>
                            <?php endif; ?>
                            <?php if ($show_comment == 'true') : ?>
                                <div class="pxl-post--comments">
                                    <i class="flaticon-comment"></i>
                                    <a href="<?php echo get_comments_link($post->ID); ?>">
                                        <span><?php comments_number(esc_html__('0 Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway'), $post->ID); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h5 class="pxl-post--title title-hover-line"><a
                                href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                        </h5>
                        <?php if ($show_excerpt == 'true'): ?>
                            <div class="pxl-post--content">
                                <?php if ($show_excerpt == 'true'): ?>
                                    <?php
                                    echo wp_trim_words($post->post_excerpt, $num_words, null);
                                    ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($show_button == 'true') : ?>
                            <a class="pxl-post--button"
                                href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <span class="pxl-post--button-text">
                                    <?php if (!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('Continue Reading', 'northway');
                                    } ?>
                                </span>
                                <i class="bi-arrow-right-short"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img = pxl_get_image_by_size(array(
                            'attach_id' => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail = $img['thumbnail'];
                    ?>
                        <div class="pxl-post--featured hover-imge-effect3">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>

                            <?php if ($show_date == 'true'): ?>
                                <div class="pxl-post--date">
                                    <div class="day">
                                        <?php echo get_the_date('d', $post->ID) ?>
                                    </div>
                                    <div class="month">
                                        <?php echo get_the_date('M', $post->ID) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

// End Post Grid
//--------------------------------------------------

// Start industries Grid
//--------------------------------------------------
function northway_get_industries_grid_layout1($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if (isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if ($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if ($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if (!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }
            $author_id = $post->post_author;
            $author = get_user_by('id', $author_id);
            $industries_icon_type = get_post_meta($post->ID, 'industries_icon_type', true);
            $industries_icon_font = get_post_meta($post->ID, 'industries_icon_font', true);
            $industries_icon_img = get_post_meta($post->ID, 'industries_icon_img', true);
            if (!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = ''; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img = pxl_get_image_by_size(array(
                            'attach_id' => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail = $img['thumbnail'];
                        $thumbnail_url = $img['url'];
                    ?>
                    <?php endif; ?>
                    <div class="pxl-post-content-hide">
                        <?php if ($industries_icon_type == 'icon' && !empty($industries_icon_font)) : ?>
                            <div class="pxl-post-icon-wrap">
                                <div class="pxl-post--icon">
                                    <i class="<?php echo esc_attr($industries_icon_font); ?>"></i>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($industries_icon_type == 'image' && !empty($industries_icon_img)) :
                            $icon_img = pxl_get_image_by_size(array(
                                'attach_id' => $industries_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                            <div class="pxl-post-icon-wrap">
                                <div class="pxl-post--icon">
                                    <?php echo wp_kses_post($icon_thumbnail); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <h4 class="pxl-post--title title-hover-line"><a
                                href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                        </h4>
                        <?php if ($show_excerpt == 'true'): ?>
                            <div class="pxl-post--content">
                                <p>
                                    <?php echo wp_trim_words($post->post_excerpt, $num_words, null); ?>
                                </p>
                            </div>
                        <?php endif; ?>
                        <?php if ($show_button == 'true') : ?>
                            <div class="pxl-post--button">
                                <a class="btn--readmore" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <span class="btn--text">
                                        <?php if (!empty($button_text)) {
                                            echo esc_attr($button_text);
                                        } else {
                                            echo esc_html__('Learn More', 'northway');
                                        } ?>
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6"
                                        fill="none">
                                        <path d="M17.7721 5.477L19.8245 3.42458C19.9369 3.31189 20 3.15921 20 3.00003C20 2.84085 19.9369 2.68817 19.8245 2.57548L17.7721 0.523097C17.68 0.433323 17.5562 0.383455 17.4275 0.384288C17.2989 0.385121 17.1757 0.436588 17.0848 0.527548C16.9938 0.618508 16.9423 0.741639 16.9414 0.870284C16.9406 0.998928 16.9904 1.12273 17.0802 1.21489L18.376 2.51071H0.489219C0.35947 2.51071 0.235035 2.56226 0.143289 2.654C0.0515425 2.74575 0 2.87018 0 2.99993C0 3.12968 0.0515425 3.25412 0.143289 3.34586C0.235035 3.43761 0.35947 3.48915 0.489219 3.48915H18.3759L17.0802 4.78521C16.9896 4.8772 16.939 5.00126 16.9395 5.13037C16.94 5.25948 16.9915 5.38315 17.0828 5.47445C17.1741 5.56574 17.2978 5.61725 17.4269 5.61775C17.556 5.61825 17.6801 5.5677 17.7721 5.47712V5.477Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div style="background-image: url(<?php echo esc_attr($thumbnail_url); ?>);"
                        class="pxl-item--overlay bg-image">
                        <?php if ($industries_icon_type == 'icon' && !empty($industries_icon_font)) : ?>
                            <div class="pxl-post--icon">
                                <i class="<?php echo esc_attr($industries_icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <?php if ($industries_icon_type == 'image' && !empty($industries_icon_img)) :
                            $icon_img = pxl_get_image_by_size(array(
                                'attach_id' => $industries_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                            <div class="pxl-post--icon">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <h4 class="pxl-post--title title-hover-line"><a
                                href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                        </h4>
                        <?php if ($show_excerpt == 'true'): ?>
                            <div class="pxl-post--content">
                                <?php echo wp_trim_words($post->post_excerpt, $num_words, null); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($show_button == 'true') : ?>
                            <div class="pxl-post--button">
                                <a class="btn--readmore" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <span class="btn--text">
                                        <?php if (!empty($button_text)) {
                                            echo esc_attr($button_text);
                                        } else {
                                            echo esc_html__('Learn More', 'northway');
                                        } ?>
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6"
                                        fill="none">
                                        <path d="M17.7721 5.477L19.8245 3.42458C19.9369 3.31189 20 3.15921 20 3.00003C20 2.84085 19.9369 2.68817 19.8245 2.57548L17.7721 0.523097C17.68 0.433323 17.5562 0.383455 17.4275 0.384288C17.2989 0.385121 17.1757 0.436588 17.0848 0.527548C16.9938 0.618508 16.9423 0.741639 16.9414 0.870284C16.9406 0.998928 16.9904 1.12273 17.0802 1.21489L18.376 2.51071H0.489219C0.35947 2.51071 0.235035 2.56226 0.143289 2.654C0.0515425 2.74575 0 2.87018 0 2.99993C0 3.12968 0.0515425 3.25412 0.143289 3.34586C0.235035 3.43761 0.35947 3.48915 0.489219 3.48915H18.3759L17.0802 4.78521C16.9896 4.8772 16.939 5.00126 16.9395 5.13037C16.94 5.25948 16.9915 5.38315 17.0828 5.47445C17.1741 5.56574 17.2978 5.61725 17.4269 5.61775C17.556 5.61825 17.6801 5.5677 17.7721 5.47712V5.477Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                        <a class="pxl-item--link" href="<?php echo esc_url(get_permalink($post->ID)); ?>"></a>
                    </div>
                </div>
            </div>
            <?php
        endforeach;
    endif;
}

// End industries Grid
//--------------------------------------------------

// Start Portfolio Grid
//--------------------------------------------------
function northway_get_portfolio_grid_layout1($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '464x545';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if (isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if ($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if ($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if (!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if (!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            $client = get_post_meta($post->ID, 'portfolio_client', true);
            $address = get_post_meta($post->ID, 'portfolio_address', true);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                if ($img_id) {
                    $img = pxl_get_image_by_size(array(
                        'attach_id' => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                } ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <div class="pxl-post--featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                            <?php if ($show_button == 'true'): ?>
                                <a class="pxl-post--button" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <span class="button-arrow-hover">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 12 12" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z"
                                                fill="currentColor" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 12 12" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </a>
                            <?php endif; ?>
                            <?php if ($show_category == 'true'): ?>
                                <div class="pxl-post--category">
                                    <?php
                                    $terms = get_the_terms($post->ID, 'portfolio-category');
                                    if ($terms && !is_wp_error($terms)) {
                                        $term_links = array();
                                        foreach ($terms as $term) {
                                            $term_links[] = '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
                                        }
                                        $separator = '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                  <path d="M1.98476 9.5164L0.103296 11.3978C-0.034432 11.5356 -0.034432 11.7589 0.103296 11.8967C0.172195 11.9656 0.262446 12 0.352721 12C0.442972 12 0.53327 11.9656 0.602122 11.8967L2.4806 10.0182C2.39938 9.94732 2.32007 9.87357 2.2431 9.79661C2.15276 9.70624 2.06676 9.61265 1.98476 9.5164Z" fill="currentColor"/>
                                  <path d="M11.2709 0C10.5568 0 9.14401 0.0577531 7.53638 0.433501V3.96486L11.4991 0.00218691C11.4364 0.000940605 11.3602 0 11.2709 0Z" fill="currentColor"/>
                                  <path d="M12.0359 0.46306L8.03523 4.46366H11.6152C11.6693 4.22933 11.7189 3.9912 11.7632 3.74911C12.0567 2.14439 12.0475 0.855692 12.0359 0.46306Z" fill="currentColor"/>
                                  <path d="M5.20862 7.29025H10.6296C10.7043 7.1386 10.7763 6.98406 10.8454 6.82613C11.0726 6.30614 11.2695 5.75208 11.4346 5.16912H7.32975L5.20862 7.29025Z" fill="currentColor"/>
                                  <path d="M6.8309 0.616566C6.06631 0.835092 5.3585 1.10606 4.70981 1.42826L4.70974 6.79145L6.8309 4.67031V0.616566Z" fill="currentColor"/>
                                  <path d="M2.4806 10.0182C3.33298 10.762 4.41254 11.1683 5.55466 11.1683C6.8056 11.1683 7.98166 10.6812 8.8662 9.79661C9.38629 9.2765 9.84855 8.67334 10.2487 7.9957H4.50314L2.4806 10.0182Z" fill="currentColor"/>
                                  <path d="M4.00436 1.81222C3.34446 2.20602 2.75634 2.66034 2.24315 3.17355C1.3586 4.05807 0.871441 5.23414 0.871441 6.48507C0.871441 7.60817 1.26433 8.6708 1.98476 9.5164L4.00429 7.4969L4.00436 1.81222Z" fill="currentColor"/>
                                </svg>';
                                        echo implode($separator, $term_links);
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pxl-post--holder">
                            <h5 class="pxl-post--title">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                            </h5>
                            <div class="pxl-post--body">
                                <?php if ($show_excerpt == 'true'): ?>
                                    <div class="pxl-post--content">
                                        <?php if ($show_excerpt == 'true'): ?>
                                            <?php
                                            echo wp_trim_words($post->post_excerpt, $num_words, null);
                                            ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($show_client == 'true' || $show_address == 'true'): ?>
                                    <div class="pxl-post--meta">
                                        <?php if ($show_client == 'true'): ?>
                                            <div class="pxl-post--client">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12"
                                                    viewBox="0 0 11 12" fill="none">
                                                    <path d="M2.04083 3C2.04083 2.40666 2.21678 1.82664 2.54642 1.33329C2.87606 0.839943 3.3446 0.455425 3.89278 0.228363C4.44096 0.00129985 5.04416 -0.0581101 5.6261 0.0576455C6.20804 0.173401 6.74259 0.459123 7.16215 0.878681C7.5817 1.29824 7.86743 1.83279 7.98318 2.41473C8.09894 2.99667 8.03953 3.59987 7.81247 4.14805C7.5854 4.69623 7.20088 5.16476 6.70754 5.49441C6.21419 5.82405 5.63417 6 5.04083 6C4.24546 5.99909 3.48292 5.68273 2.92051 5.12032C2.3581 4.5579 2.04174 3.79537 2.04083 3ZM10.0551 10.4421C9.99395 10.1827 9.90931 9.92938 9.80225 9.68528C9.03811 7.941 7.21411 6.85714 5.04083 6.85714C2.57354 6.85714 0.563115 8.28171 0.0376868 10.4014C-0.00923371 10.5912 -0.0123843 10.7891 0.0284734 10.9803C0.0693312 11.1715 0.153127 11.3508 0.273523 11.5048C0.393918 11.6588 0.54776 11.7834 0.723411 11.8692C0.899062 11.955 1.09192 11.9997 1.2874 12H8.79597C8.99232 12.0004 9.1862 11.9561 9.36286 11.8704C9.53953 11.7847 9.69434 11.6599 9.81554 11.5054C9.93349 11.358 10.0164 11.1856 10.0579 11.0014C10.0994 10.8172 10.0984 10.6259 10.0551 10.4421Z"
                                                        fill="currentColor" />
                                                </svg>
                                                <span><?php echo esc_html($client); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($show_address == 'true'): ?>
                                            <div class="pxl-post--address">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12"
                                                    viewBox="0 0 10 12" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M4.83871 0C7.50939 0 9.67742 2.17629 9.67742 4.85714C9.67742 6.25314 8.98349 7.69 8.11224 8.89657C6.89573 10.5817 5.37438 11.8103 5.37438 11.8103V11.8106C5.06157 12.0631 4.61585 12.0631 4.30304 11.8106V11.8103C4.30304 11.8103 2.78169 10.5817 1.56518 8.89657C0.693926 7.69 0 6.25314 0 4.85714C0 2.17629 2.16803 0 4.83871 0ZM4.83871 2.85714C5.93824 2.85714 6.83112 3.75343 6.83112 4.85714C6.83112 5.96086 5.93824 6.85714 4.83871 6.85714C3.73918 6.85714 2.8463 5.96086 2.8463 4.85714C2.8463 3.75343 3.73918 2.85714 4.83871 2.85714Z"
                                                        fill="currentColor" />
                                                </svg>
                                                <span><?php echo esc_html($address); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach;
    endif;
}

// End Portfolio Grid
//--------------------------------------------------

// Start Service Grid
//--------------------------------------------------
function northway_get_service_grid_layout1($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '600x472';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if (isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if ($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if ($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if (!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if (!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
        ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                        <div class="pxl-post--icon pxl-flex-center">
                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                        </div>
                    <?php endif; ?>
                    <?php if ($service_icon_type == 'image' && !empty($service_icon_img)) :
                        $icon_img = pxl_get_image_by_size(array(
                            'attach_id' => $service_icon_img['id'],
                            'thumb_size' => 'full',
                        ));
                        $icon_thumbnail = $icon_img['thumbnail'];
                    ?>
                        <div class="pxl-post--icon pxl-flex-center">
                            <?php echo wp_kses_post($icon_thumbnail); ?>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-post--body">
                        <h4 class="pxl-post--title">
                            <a href="<?php if (!empty($service_external_link)) {
                                            echo esc_url($service_external_link);
                                        } else {
                                            echo esc_url(get_permalink($post->ID));
                                        } ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                        </h4>
                        <?php if ($show_excerpt == 'true'): ?>
                            <div class="pxl-post--content">
                                <?php if ($show_excerpt == 'true'): ?>
                                    <?php echo wp_trim_words($post->post_excerpt, $num_words, null); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($show_button == 'true') : ?>
                        <div class="pxl-post--readmore">
                            <div class="pxl-post--readmore-star">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 14 18"
                                    fill="none">
                                    <path d="M12.1706 8.22868C12.4818 8.41722 12.8049 8.57616 13.1363 8.70996C13.372 8.80512 13.372 9.19488 13.1363 9.29004C12.8049 9.42384 12.4818 9.58278 12.1706 9.77132C11.5692 10.1357 11.032 10.541 10.5523 10.9867C10.3924 11.1353 10.2389 11.2884 10.0915 11.4459C9.87055 11.6819 9.66331 11.9279 9.4691 12.184C9.33955 12.3548 9.21577 12.53 9.09747 12.7096C8.56499 13.5181 8.14367 14.4156 7.81114 15.4002C7.61446 15.9825 7.44881 16.5953 7.30938 17.238C7.2479 17.5214 6.75091 17.5214 6.68936 17.238C6.51628 16.4411 6.30286 15.6902 6.04021 14.9863C5.93716 14.7101 5.82602 14.4414 5.70723 14.1797C5.60938 13.9642 5.50723 13.753 5.39803 13.5474C5.24447 13.2582 5.079 12.979 4.90153 12.7096C4.78323 12.53 4.65946 12.3548 4.52991 12.184C4.3357 11.9279 4.12846 11.6819 3.90755 11.4459C3.76015 11.2884 3.60665 11.1353 3.44673 10.9867C2.96701 10.541 2.42982 10.1357 1.82841 9.77132C1.51731 9.58287 1.19454 9.42393 0.863346 9.29013C0.62765 9.1949 0.62765 8.8051 0.863346 8.70987C1.19454 8.57607 1.51731 8.41713 1.82841 8.22868C3.64568 7.12768 4.8756 5.65212 5.70723 3.82026C5.82614 3.5583 5.93706 3.28918 6.04021 3.01269C6.30271 2.30902 6.51614 1.55853 6.68924 0.761947C6.75082 0.478561 7.2479 0.478558 7.30938 0.761968C7.44881 1.40473 7.61446 2.01751 7.81114 2.59984C8.00486 3.17341 8.22967 3.71698 8.488 4.23109C9.3135 5.87383 10.4912 7.21122 12.1706 8.22868Z"
                                        fill="currentColor" />
                                </svg>
                            </div>
                            <a href="<?php if (!empty($service_external_link)) {
                                echo esc_url($service_external_link);
                            } else {
                                echo esc_url(get_permalink($post->ID));
                            } ?>" class="pxl-post--readmore-button">
                                <span class="button-arrow-hover">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                        <path d="M9.1605 0C9.38315 0 9.59668 0.0884445 9.75412 0.245881C9.91156 0.403319 10 0.616851 10 0.839501V9.15058C10 9.37323 9.91156 9.58676 9.75412 9.7442C9.59668 9.90164 9.38315 9.99008 9.1605 9.99008C8.93785 9.99008 8.72431 9.90164 8.56688 9.7442C8.40944 9.58676 8.32099 9.37323 8.32099 9.15058V2.86647L1.44333 9.74368C1.36589 9.82386 1.27327 9.88784 1.17085 9.93183C1.06843 9.97583 0.958264 9.999 0.846798 9.99997C0.73533 10.0009 0.62477 9.97969 0.521598 9.93748C0.418431 9.89527 0.324706 9.83293 0.245885 9.75412C0.167061 9.67529 0.104701 9.58155 0.0624894 9.47838C0.0202794 9.3752 -0.000936892 9.26464 3.17309e-05 9.15318C0.00100213 9.04171 0.0241426 8.93155 0.0681385 8.82913C0.112136 8.72671 0.17611 8.63408 0.25629 8.55664L7.13309 1.679H0.849392C0.626743 1.679 0.413209 1.59056 0.255771 1.43312C0.0983342 1.27568 0.0098904 1.06215 0.00988891 0.839501C0.00988891 0.616851 0.0983338 0.403319 0.255771 0.245881C0.413209 0.0884437 0.626741 0 0.849392 0H9.1605Z" fill="currentColor" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                        <path d="M9.1605 0C9.38315 0 9.59668 0.0884445 9.75412 0.245881C9.91156 0.403319 10 0.616851 10 0.839501V9.15058C10 9.37323 9.91156 9.58676 9.75412 9.7442C9.59668 9.90164 9.38315 9.99008 9.1605 9.99008C8.93785 9.99008 8.72431 9.90164 8.56688 9.7442C8.40944 9.58676 8.32099 9.37323 8.32099 9.15058V2.86647L1.44333 9.74368C1.36589 9.82386 1.27327 9.88784 1.17085 9.93183C1.06843 9.97583 0.958264 9.999 0.846798 9.99997C0.73533 10.0009 0.62477 9.97969 0.521598 9.93748C0.418431 9.89527 0.324706 9.83293 0.245885 9.75412C0.167061 9.67529 0.104701 9.58155 0.0624894 9.47838C0.0202794 9.3752 -0.000936892 9.26464 3.17309e-05 9.15318C0.00100213 9.04171 0.0241426 8.93155 0.0681385 8.82913C0.112136 8.72671 0.17611 8.63408 0.25629 8.55664L7.13309 1.679H0.849392C0.626743 1.679 0.413209 1.59056 0.255771 1.43312C0.0983342 1.27568 0.0098904 1.06215 0.00988891 0.839501C0.00988891 0.616851 0.0983338 0.403319 0.255771 0.245881C0.413209 0.0884437 0.626741 0 0.849392 0H9.1605Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
<?php endforeach;
    endif;
}

function northway_get_service_grid_layout2($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '600x472';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if (isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if ($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if ($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";

                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if (!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if (!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = '';

            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $img_id = get_post_thumbnail_id($post->ID);
            $img = pxl_get_image_by_size(array(
                'attach_id' => $img_id,
                'thumb_size' => $images_size
            ));
            $thumbnail = $img['thumbnail'];
            $thumbnail_url = $img['url'];
        ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-post--body">
                        <?php if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="pxl-post--icon pxl-flex-center">
                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <?php if ($service_icon_type == 'image' && !empty($service_icon_img)) :
                            $icon_img = pxl_get_image_by_size(array(
                                'attach_id' => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                            <div class="pxl-post--icon pxl-flex-center">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-post--content">
                            <h4 class="pxl-post--title">
                                <a href="<?php if (!empty($service_external_link)) {
                                    echo esc_url($service_external_link);
                                } else {
                                    echo esc_url(get_permalink($post->ID));
                                } ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                            </h4>
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="26" viewBox="0 0 80 26" fill="none" class="pxl-post--divider">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.873 2.7627C15.8731 4.45899 16.0664 6.13367 16.8838 7.50489C18.6463 10.461 21.4986 11.7483 25.6084 12.2842C27.1497 12.4851 28.8527 12.5787 30.7236 12.6172C32.6766 12.5771 34.8027 12.5965 37.0986 12.6172C38.5257 12.6044 40.0247 12.5918 41.5967 12.5918H80V13.4082H41.5967C40.0247 13.4082 38.5257 13.3956 37.0986 13.3828C34.8027 13.4035 32.6766 13.4219 30.7236 13.3818C28.8527 13.4203 27.1497 13.5149 25.6084 13.7158C21.4986 14.2517 18.6463 15.539 16.8838 18.4951C16.0664 19.8663 15.8731 21.541 15.873 23.2373V26C15.873 26 15.4996 26 15.127 26V23.2373C15.1269 21.541 14.9336 19.8663 14.1162 18.4951C12.3537 15.539 9.5014 14.2517 5.3916 13.7158C3.85001 13.5148 2.1467 13.4203 0.275391 13.3818C0.183999 13.3837 0.0921491 13.3831 0 13.3848V12.6133C0.0921563 12.6149 0.183992 12.6153 0.275391 12.6172C2.14669 12.5787 3.85001 12.4852 5.3916 12.2842C9.5014 11.7483 12.3537 10.461 14.1162 7.50489C14.9336 6.13367 15.1269 4.45899 15.127 2.7627V2.64338e-06C15.4996 -3.30422e-06 15.873 2.64338e-06 15.873 2.64338e-06V2.7627ZM15.5 6.10157C15.3308 6.72831 15.0906 7.33619 14.752 7.9043C12.8675 11.0647 9.85258 12.4249 5.80078 13C9.85258 13.5751 12.8675 14.9353 14.752 18.0957C15.0905 18.6636 15.3309 19.271 15.5 19.8975C15.6691 19.271 15.9095 18.6636 16.248 18.0957C18.1324 14.9355 21.1468 13.5751 25.1982 13C21.1468 12.4249 18.1324 11.0645 16.248 7.9043C15.9094 7.33619 15.6692 6.72831 15.5 6.10157Z" fill="currentColor"/>
                            </svg>
                            <?php if ($show_excerpt == 'true'): ?>
                                <div class="pxl-post--excerpt">
                                    <?php if ($show_excerpt == 'true'): ?>
                                        <?php echo wp_trim_words($post->post_excerpt, $num_words, null); ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($show_button == 'true') : ?>
                                <a href="<?php if (!empty($service_external_link)) {
                                        echo esc_url($service_external_link);
                                    } else {
                                        echo esc_url(get_permalink($post->ID));
                                    } ?>" class="btn pxl-button-style-2-default btn-default inline pxl-icon--right pxl-post--readmore">
                                    <div class="pxl-button--icon pxl-button--icon-left">
                                        <i class="flaticon-arrow"></i>
                                    </div>
                                    <span class="pxl--btn-text">
                                        <?php if(!empty($button_text)) {
                                            echo esc_html($button_text);
                                        } else {
                                            echo esc_html__('Explore Now', 'northway');
                                        } ?>
                                    </span>
                                    <div class="pxl-button--icon pxl-button--icon-right">
                                        <i class="flaticon-arrow"></i>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="pxl-post--image">
                        <a href="<?php if (!empty($service_external_link)) {
                            echo esc_url($service_external_link);
                        } else {
                            echo esc_url(get_permalink($post->ID));
                        } ?>">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </a>
                    </div>
                </div>
            </div>
<?php endforeach;
    endif;
}

// End Service Grid
//-------------------------------------------------

add_action('wp_ajax_northway_load_more_post_grid', 'northway_load_more_post_grid');
add_action('wp_ajax_nopriv_northway_load_more_post_grid', 'northway_load_more_post_grid');
function northway_load_more_post_grid()
{
    try {
        if (!isset($_POST['settings'])) {
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'northway'));
        }

        $settings = isset($_POST['settings']) ? $_POST['settings'] : null;

        $source = isset($settings['source']) ? $settings['source'] : '';
        $term_slug = isset($settings['term_slug']) ? $settings['term_slug'] : '';
        if (!empty($term_slug) && $term_slug != '*') {
            $term_slug = str_replace('.', '', $term_slug);
            $source = [$term_slug . '|' . $settings['tax'][0]];
        }
        if (isset($_POST['handler_click']) && sanitize_text_field(wp_unslash($_POST['handler_click'])) == 'filter') {
            set_query_var('paged', 1);
            $settings['paged'] = 1;
        } elseif (isset($_POST['handler_click']) && sanitize_text_field(wp_unslash($_POST['handler_click'])) == 'select_orderby') {
            set_query_var('paged', 1);
            $settings['paged'] = 1;
        } else {
            set_query_var('paged', (int)$settings['paged']);
        }

        extract(pxl_get_posts_of_grid(
            $settings['post_type'],
            [
                'source' => $source,
                'orderby' => isset($settings['orderby']) ? $settings['orderby'] : 'date',
                'order' => isset($settings['order']) ? ($settings['orderby'] == 'title' ? 'asc' : sanitize_text_field($settings['order'])) : 'desc',
                'limit' => isset($settings['limit']) ? $settings['limit'] : '6',
                'post_ids' => isset($settings['post_ids']) ? $settings['post_ids'] : [],
                'post_not_in' => isset($settings['post_not_in']) ? $settings['post_not_in'] : [],
            ],
            $settings['tax']
        ));

        ob_start();
        if (isset($settings['wg_type']) && $settings['wg_type'] == 'post-list') {
            northway_get_post_list($posts, $settings);
        } else {
            northway_get_post_grid($posts, $settings);
        }
        $html = ob_get_clean();

        $pagin_html = '';
        if (isset($settings['pagination_type']) && $settings['pagination_type'] == 'pagination') {
            ob_start();
            northway()->page->get_pagination($query, true);
            $pagin_html = ob_get_clean();
        }

        $result_count = '';
        if (isset($settings['show_toolbar']) && $settings['show_toolbar'] == 'show') {
            ob_start();
            if ((int)$settings['paged'] == 0) {
                $limit_start = 1;
                $limit_end = ((int)$settings['limit'] >= $total) ? $total : (int)$settings['limit'];
            } else {
                $limit_start = (((int)$settings['paged'] - 1) * (int)$settings['limit']) + 1;
                $limit_end = (int)$settings['paged'] * (int)$settings['limit'];
                $limit_end = ($limit_end >= $total) ? $total : $limit_end;
            }
            if (isset($settings['pagination_type']) && $settings['pagination_type'] == 'loadmore') {
                printf(
                    '<span class="result-count">%1$s %2$s %3$s %4$s %5$s</span>',
                    esc_html__('Showing', 'northway'),
                    '1-' . $limit_end,
                    esc_html__('of', 'northway'),
                    $total,
                    esc_html__('results', 'northway')
                );
            } else {
                printf(
                    '<span class="result-count">%1$s %2$s %3$s %4$s %5$s</span>',
                    esc_html__('Showing', 'northway'),
                    $limit_start . '-' . $limit_end,
                    esc_html__('of', 'northway'),
                    $total,
                    esc_html__('results', 'northway')
                );
            }

            $result_count = ob_get_clean();
        }

        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'northway'),
                'data' => array(
                    'html' => $html,
                    'pagin_html' => $pagin_html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                    'result_count' => $result_count,
                ),
            )
        );
    } catch (Exception $e) {
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}
