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

            case 'post-2':
                northway_get_post_grid_layout2($posts, $settings);
                break;

            case 'post-3':
                northway_get_post_grid_layout3($posts, $settings);
                break;

            case 'portfolio-1':
                northway_get_portfolio_grid_layout1($posts, $settings);
                break;

            case 'portfolio-2':
                northway_get_portfolio_grid_layout2($posts, $settings);
                break;

            case 'portfolio-3':
                northway_get_portfolio_grid_layout3($posts, $settings);
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

    $images_size = !empty($img_size) ? $img_size : '767x550';

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
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size(array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail    = $img['thumbnail'];
                    ?>
                        <div class="pxl-post--featured hover-imge-effect3">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                            <div class="pxl-post--meta-1">
                                <?php if ($show_author == 'true'): ?>
                                    <div class="pxl-post--author">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="13" viewBox="0 0 11 13" fill="none">
                                            <path d="M2.3932 3.14201C2.3932 2.52058 2.57747 1.91311 2.9227 1.39641C3.26794 0.879704 3.75863 0.476984 4.33273 0.239173C4.90684 0.00136138 5.53856 -0.060861 6.14803 0.0603743C6.75749 0.18161 7.31732 0.480857 7.75672 0.920276C8.19612 1.35969 8.49535 1.91955 8.61658 2.52904C8.73781 3.13853 8.67559 3.77028 8.43779 4.34441C8.19999 4.91854 7.79729 5.40925 7.28061 5.7545C6.76393 6.09975 6.15648 6.28403 5.53508 6.28403C4.70209 6.28308 3.9035 5.95174 3.31449 5.3627C2.72548 4.77367 2.39415 3.97504 2.3932 3.14201ZM10.7865 10.9365C10.7224 10.6647 10.6338 10.3994 10.5217 10.1438C9.7214 8.31691 7.81114 7.18175 5.53508 7.18175C2.95111 7.18175 0.845605 8.67375 0.295328 10.8938C0.246189 11.0926 0.242889 11.2999 0.285679 11.5001C0.328469 11.7003 0.416228 11.8882 0.542318 12.0495C0.668407 12.2107 0.829524 12.3413 1.01348 12.4311C1.19744 12.5209 1.39942 12.5678 1.60414 12.5681H9.46781C9.67345 12.5685 9.87649 12.5221 10.0615 12.4324C10.2465 12.3426 10.4087 12.2119 10.5356 12.0501C10.6591 11.8956 10.7459 11.7151 10.7894 11.5222C10.8328 11.3292 10.8319 11.129 10.7865 10.9365Z" fill="currentColor" />
                                        </svg>
                                        <?php echo esc_html__('By: ', 'northway') ?>
                                        <span>
                                            <?php echo esc_html($author->display_name); ?>
                                            <span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($show_comment == 'true') : ?>
                                    <div class="pxl-post--comments">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                            <path d="M6.82486 2.18969e-07C5.65019 -0.000283893 4.49672 0.275914 3.48358 0.800068C2.47045 1.32422 1.63439 2.07733 1.06175 2.98161C0.489113 3.88589 0.200653 4.90855 0.226166 5.94398C0.251679 6.97941 0.59024 7.99007 1.20688 8.87156L0.684446 11.3955C0.669092 11.4714 0.674735 11.5495 0.700899 11.6231C0.727062 11.6967 0.772973 11.7636 0.834736 11.8182C0.884883 11.8613 0.944227 11.8952 1.00933 11.918C1.07444 11.9407 1.14402 11.9519 1.21404 11.9507H1.32139L4.78521 11.3198C5.43932 11.532 6.12816 11.6492 6.82486 11.6668C8.57962 11.6668 10.2625 11.0522 11.5033 9.95824C12.7441 8.86426 13.4412 7.38052 13.4412 5.8334C13.4412 4.28629 12.7441 2.80254 11.5033 1.70856C10.2625 0.614589 8.57962 2.51572e-07 6.82486 2.18969e-07ZM3.42545 5.98799C3.42545 5.832 3.47791 5.6795 3.57621 5.5498C3.67451 5.42009 3.81423 5.319 3.97769 5.25931C4.14115 5.19961 4.32102 5.18399 4.49456 5.21442C4.66809 5.24486 4.82749 5.31997 4.9526 5.43028C5.07771 5.54058 5.16291 5.68112 5.19743 5.83412C5.23194 5.98712 5.21423 6.1457 5.14652 6.28982C5.07881 6.43394 4.96415 6.55713 4.81704 6.64379C4.66992 6.73046 4.49696 6.77671 4.32003 6.77671C4.08277 6.77671 3.85523 6.69362 3.68747 6.5457C3.5197 6.39779 3.42545 6.19717 3.42545 5.98799ZM5.93028 5.98799C5.93028 5.832 5.98275 5.6795 6.08104 5.5498C6.17934 5.42009 6.31906 5.319 6.48252 5.25931C6.64598 5.19961 6.82586 5.18399 6.99939 5.21442C7.17292 5.24486 7.33232 5.31997 7.45743 5.43028C7.58254 5.54058 7.66774 5.68112 7.70226 5.83412C7.73677 5.98712 7.71906 6.1457 7.65135 6.28982C7.58364 6.43394 7.46898 6.55713 7.32187 6.64379C7.17475 6.73046 7.0018 6.77671 6.82486 6.77671C6.5876 6.77671 6.36006 6.69362 6.1923 6.5457C6.02453 6.39779 5.93028 6.19717 5.93028 5.98799ZM9.3297 6.77671C9.15276 6.77671 8.9798 6.73046 8.83269 6.64379C8.68558 6.55713 8.57092 6.43394 8.50321 6.28982C8.4355 6.1457 8.41778 5.98712 8.4523 5.83412C8.48682 5.68112 8.57202 5.54058 8.69713 5.43028C8.82224 5.31997 8.98164 5.24486 9.15517 5.21442C9.3287 5.18399 9.50857 5.19961 9.67204 5.25931C9.8355 5.319 9.97522 5.42009 10.0735 5.5498C10.1718 5.6795 10.2243 5.832 10.2243 5.98799C10.2243 6.19717 10.13 6.39779 9.96226 6.5457C9.7945 6.69362 9.56695 6.77671 9.3297 6.77671Z" fill="currentColor" />
                                        </svg>
                                        <a href="<?php echo get_comments_link($post->ID); ?>">
                                            <span><?php comments_number(esc_html__('No Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway'), $post->ID); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ($show_date == 'true'): ?>
                                <div class="pxl-post--date-1">
                                    <div class="day">
                                        <?php echo get_the_date('d', $post->ID)  ?>
                                    </div>
                                    <div class="month">
                                        <?php echo get_the_date('M', $post->ID)  ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-post--holder">
                        <div class="pxl-post--holder-inner">
                            <div class="pxl-post--date-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                    <path d="M6.5 0C2.91576 0 0 2.93332 0 6.53916C0 10.145 2.91576 13.0783 6.5 13.0783C10.0842 13.0783 13 10.145 13 6.53916C13 2.93332 10.0842 0 6.5 0ZM9.59131 9.92148C9.48568 10.0278 9.34702 10.0812 9.20837 10.0812C9.06971 10.0812 8.93095 10.0278 8.82542 9.92148L6.11706 7.1969C6.0152 7.09503 5.95837 6.95653 5.95837 6.81165V3.26958C5.95837 2.96824 6.20097 2.72468 6.5 2.72468C6.79903 2.72468 7.04163 2.96824 7.04163 3.26958V6.58605L9.59131 9.15099C9.80306 9.36412 9.80306 9.70846 9.59131 9.92148Z" fill="currentColor" />
                                </svg>
                                <span>
                                    <?php echo get_the_date('F d, Y', $post->ID)  ?>
                                </span>
                            </div>
                            <h5 class="pxl-post--title title-hover-line"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h5>
                            <?php if ($show_excerpt == 'true'): ?>
                                <div class="pxl-post--content">
                                    <?php if ($show_excerpt == 'true'): ?>
                                        <?php
                                        echo wp_trim_words($post->post_excerpt, $num_words, null);
                                        ?>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <div class="pxl-post--meta pxl-flex-middle">
                                <?php if ($show_author == 'true'): ?>
                                    <div class="pxl-post--author">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="13" viewBox="0 0 11 13" fill="none">
                                            <path d="M2.3932 3.14201C2.3932 2.52058 2.57747 1.91311 2.9227 1.39641C3.26794 0.879704 3.75863 0.476984 4.33273 0.239173C4.90684 0.00136138 5.53856 -0.060861 6.14803 0.0603743C6.75749 0.18161 7.31732 0.480857 7.75672 0.920276C8.19612 1.35969 8.49535 1.91955 8.61658 2.52904C8.73781 3.13853 8.67559 3.77028 8.43779 4.34441C8.19999 4.91854 7.79729 5.40925 7.28061 5.7545C6.76393 6.09975 6.15648 6.28403 5.53508 6.28403C4.70209 6.28308 3.9035 5.95174 3.31449 5.3627C2.72548 4.77367 2.39415 3.97504 2.3932 3.14201ZM10.7865 10.9365C10.7224 10.6647 10.6338 10.3994 10.5217 10.1438C9.7214 8.31691 7.81114 7.18175 5.53508 7.18175C2.95111 7.18175 0.845605 8.67375 0.295328 10.8938C0.246189 11.0926 0.242889 11.2999 0.285679 11.5001C0.328469 11.7003 0.416228 11.8882 0.542318 12.0495C0.668407 12.2107 0.829524 12.3413 1.01348 12.4311C1.19744 12.5209 1.39942 12.5678 1.60414 12.5681H9.46781C9.67345 12.5685 9.87649 12.5221 10.0615 12.4324C10.2465 12.3426 10.4087 12.2119 10.5356 12.0501C10.6591 11.8956 10.7459 11.7151 10.7894 11.5222C10.8328 11.3292 10.8319 11.129 10.7865 10.9365Z" fill="currentColor" />
                                        </svg>
                                        <?php echo esc_html__('By: ', 'northway') ?>
                                        <span>
                                            <?php echo esc_html($author->display_name); ?>
                                            <span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($show_comment == 'true') : ?>
                                    <div class="pxl-post--comments">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                            <path d="M6.82486 2.18969e-07C5.65019 -0.000283893 4.49672 0.275914 3.48358 0.800068C2.47045 1.32422 1.63439 2.07733 1.06175 2.98161C0.489113 3.88589 0.200653 4.90855 0.226166 5.94398C0.251679 6.97941 0.59024 7.99007 1.20688 8.87156L0.684446 11.3955C0.669092 11.4714 0.674735 11.5495 0.700899 11.6231C0.727062 11.6967 0.772973 11.7636 0.834736 11.8182C0.884883 11.8613 0.944227 11.8952 1.00933 11.918C1.07444 11.9407 1.14402 11.9519 1.21404 11.9507H1.32139L4.78521 11.3198C5.43932 11.532 6.12816 11.6492 6.82486 11.6668C8.57962 11.6668 10.2625 11.0522 11.5033 9.95824C12.7441 8.86426 13.4412 7.38052 13.4412 5.8334C13.4412 4.28629 12.7441 2.80254 11.5033 1.70856C10.2625 0.614589 8.57962 2.51572e-07 6.82486 2.18969e-07ZM3.42545 5.98799C3.42545 5.832 3.47791 5.6795 3.57621 5.5498C3.67451 5.42009 3.81423 5.319 3.97769 5.25931C4.14115 5.19961 4.32102 5.18399 4.49456 5.21442C4.66809 5.24486 4.82749 5.31997 4.9526 5.43028C5.07771 5.54058 5.16291 5.68112 5.19743 5.83412C5.23194 5.98712 5.21423 6.1457 5.14652 6.28982C5.07881 6.43394 4.96415 6.55713 4.81704 6.64379C4.66992 6.73046 4.49696 6.77671 4.32003 6.77671C4.08277 6.77671 3.85523 6.69362 3.68747 6.5457C3.5197 6.39779 3.42545 6.19717 3.42545 5.98799ZM5.93028 5.98799C5.93028 5.832 5.98275 5.6795 6.08104 5.5498C6.17934 5.42009 6.31906 5.319 6.48252 5.25931C6.64598 5.19961 6.82586 5.18399 6.99939 5.21442C7.17292 5.24486 7.33232 5.31997 7.45743 5.43028C7.58254 5.54058 7.66774 5.68112 7.70226 5.83412C7.73677 5.98712 7.71906 6.1457 7.65135 6.28982C7.58364 6.43394 7.46898 6.55713 7.32187 6.64379C7.17475 6.73046 7.0018 6.77671 6.82486 6.77671C6.5876 6.77671 6.36006 6.69362 6.1923 6.5457C6.02453 6.39779 5.93028 6.19717 5.93028 5.98799ZM9.3297 6.77671C9.15276 6.77671 8.9798 6.73046 8.83269 6.64379C8.68558 6.55713 8.57092 6.43394 8.50321 6.28982C8.4355 6.1457 8.41778 5.98712 8.4523 5.83412C8.48682 5.68112 8.57202 5.54058 8.69713 5.43028C8.82224 5.31997 8.98164 5.24486 9.15517 5.21442C9.3287 5.18399 9.50857 5.19961 9.67204 5.25931C9.8355 5.319 9.97522 5.42009 10.0735 5.5498C10.1718 5.6795 10.2243 5.832 10.2243 5.98799C10.2243 6.19717 10.13 6.39779 9.96226 6.5457C9.7945 6.69362 9.56695 6.77671 9.3297 6.77671Z" fill="currentColor" />
                                        </svg>
                                        <a href="<?php echo get_comments_link($post->ID); ?>">
                                            <span><?php comments_number(esc_html__('0 Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway'), $post->ID); ?></span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($show_button == 'true') : ?>
                            <div class="pxl-post--button">
                                <div class="pxl-post--button-divider"></div>
                                <a class="pxl-post--button-link" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <span class="pxl-post--button-text">
                                        <?php if (!empty($button_text)) {
                                            echo esc_attr($button_text);
                                        } else {
                                            echo esc_html__('Read More', 'northway');
                                        } ?>
                                    </span>
                                    <div class="pxl-post--button-icon">
                                        <i class="bi-arrow-right-short"></i>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

function northway_get_post_grid_layout2($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '645x376';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12";

            if (isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12;
                $col_lg_m = 12;
                $col_md_m = 12;
                $col_sm_m = 12;
                $col_xs_m = 12;
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
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size(array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail    = $img['thumbnail'];
                    ?>
                        <div class="pxl-post--featured hover-imge-effect3">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                            <div class="pxl-post--meta-1">

                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-post--holder">
                        <div class="pxl-post--meta pxl-flex-middle">
                            <?php if ($show_date == 'true'): ?>
                                <div class="pxl-post--date">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                        <path d="M7.00422 -0.00427246C3.14194 -0.00427246 0 3.13767 0 6.99995C0 10.8622 3.14194 14.0042 7.00422 14.0042C10.8665 14.0042 14.0084 10.8622 14.0084 6.99995C14.0084 3.13767 10.8665 -0.00427246 7.00422 -0.00427246ZM10.3353 10.6228C10.2215 10.7367 10.0721 10.7939 9.92268 10.7939C9.77327 10.7939 9.62375 10.7367 9.51003 10.6228L6.59157 7.70447C6.48181 7.59535 6.42057 7.44701 6.42057 7.29183V3.49784C6.42057 3.17507 6.68199 2.91419 7.00422 2.91419C7.32645 2.91419 7.58787 3.17507 7.58787 3.49784V7.05018L10.3353 9.79753C10.5635 10.0258 10.5635 10.3946 10.3353 10.6228Z" fill="currentColor" />
                                    </svg>
                                    <?php echo get_the_date('F d, Y', $post->ID)  ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($show_author == 'true'): ?>
                                <div class="pxl-post--author">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="13" viewBox="0 0 11 13" fill="none">
                                        <path d="M2.3932 3.14201C2.3932 2.52058 2.57747 1.91311 2.9227 1.39641C3.26794 0.879704 3.75863 0.476984 4.33273 0.239173C4.90684 0.00136138 5.53856 -0.060861 6.14803 0.0603743C6.75749 0.18161 7.31732 0.480857 7.75672 0.920276C8.19612 1.35969 8.49535 1.91955 8.61658 2.52904C8.73781 3.13853 8.67559 3.77028 8.43779 4.34441C8.19999 4.91854 7.79729 5.40925 7.28061 5.7545C6.76393 6.09975 6.15648 6.28403 5.53508 6.28403C4.70209 6.28308 3.9035 5.95174 3.31449 5.3627C2.72548 4.77367 2.39415 3.97504 2.3932 3.14201ZM10.7865 10.9365C10.7224 10.6647 10.6338 10.3994 10.5217 10.1438C9.7214 8.31691 7.81114 7.18175 5.53508 7.18175C2.95111 7.18175 0.845605 8.67375 0.295328 10.8938C0.246189 11.0926 0.242889 11.2999 0.285679 11.5001C0.328469 11.7003 0.416228 11.8882 0.542318 12.0495C0.668407 12.2107 0.829524 12.3413 1.01348 12.4311C1.19744 12.5209 1.39942 12.5678 1.60414 12.5681H9.46781C9.67345 12.5685 9.87649 12.5221 10.0615 12.4324C10.2465 12.3426 10.4087 12.2119 10.5356 12.0501C10.6591 11.8956 10.7459 11.7151 10.7894 11.5222C10.8328 11.3292 10.8319 11.129 10.7865 10.9365Z" fill="currentColor" />
                                    </svg>
                                    <?php echo esc_html__('By: ', 'northway') ?>
                                    <span>
                                        <?php echo esc_html($author->display_name); ?>
                                        <span>
                                </div>
                            <?php endif; ?>
                            <?php if ($show_comment == 'true') : ?>
                                <div class="pxl-post--comments">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                        <path d="M6.82486 2.18969e-07C5.65019 -0.000283893 4.49672 0.275914 3.48358 0.800068C2.47045 1.32422 1.63439 2.07733 1.06175 2.98161C0.489113 3.88589 0.200653 4.90855 0.226166 5.94398C0.251679 6.97941 0.59024 7.99007 1.20688 8.87156L0.684446 11.3955C0.669092 11.4714 0.674735 11.5495 0.700899 11.6231C0.727062 11.6967 0.772973 11.7636 0.834736 11.8182C0.884883 11.8613 0.944227 11.8952 1.00933 11.918C1.07444 11.9407 1.14402 11.9519 1.21404 11.9507H1.32139L4.78521 11.3198C5.43932 11.532 6.12816 11.6492 6.82486 11.6668C8.57962 11.6668 10.2625 11.0522 11.5033 9.95824C12.7441 8.86426 13.4412 7.38052 13.4412 5.8334C13.4412 4.28629 12.7441 2.80254 11.5033 1.70856C10.2625 0.614589 8.57962 2.51572e-07 6.82486 2.18969e-07ZM3.42545 5.98799C3.42545 5.832 3.47791 5.6795 3.57621 5.5498C3.67451 5.42009 3.81423 5.319 3.97769 5.25931C4.14115 5.19961 4.32102 5.18399 4.49456 5.21442C4.66809 5.24486 4.82749 5.31997 4.9526 5.43028C5.07771 5.54058 5.16291 5.68112 5.19743 5.83412C5.23194 5.98712 5.21423 6.1457 5.14652 6.28982C5.07881 6.43394 4.96415 6.55713 4.81704 6.64379C4.66992 6.73046 4.49696 6.77671 4.32003 6.77671C4.08277 6.77671 3.85523 6.69362 3.68747 6.5457C3.5197 6.39779 3.42545 6.19717 3.42545 5.98799ZM5.93028 5.98799C5.93028 5.832 5.98275 5.6795 6.08104 5.5498C6.17934 5.42009 6.31906 5.319 6.48252 5.25931C6.64598 5.19961 6.82586 5.18399 6.99939 5.21442C7.17292 5.24486 7.33232 5.31997 7.45743 5.43028C7.58254 5.54058 7.66774 5.68112 7.70226 5.83412C7.73677 5.98712 7.71906 6.1457 7.65135 6.28982C7.58364 6.43394 7.46898 6.55713 7.32187 6.64379C7.17475 6.73046 7.0018 6.77671 6.82486 6.77671C6.5876 6.77671 6.36006 6.69362 6.1923 6.5457C6.02453 6.39779 5.93028 6.19717 5.93028 5.98799ZM9.3297 6.77671C9.15276 6.77671 8.9798 6.73046 8.83269 6.64379C8.68558 6.55713 8.57092 6.43394 8.50321 6.28982C8.4355 6.1457 8.41778 5.98712 8.4523 5.83412C8.48682 5.68112 8.57202 5.54058 8.69713 5.43028C8.82224 5.31997 8.98164 5.24486 9.15517 5.21442C9.3287 5.18399 9.50857 5.19961 9.67204 5.25931C9.8355 5.319 9.97522 5.42009 10.0735 5.5498C10.1718 5.6795 10.2243 5.832 10.2243 5.98799C10.2243 6.19717 10.13 6.39779 9.96226 6.5457C9.7945 6.69362 9.56695 6.77671 9.3297 6.77671Z" fill="currentColor" />
                                    </svg>
                                    <a href="<?php echo get_comments_link($post->ID); ?>">
                                        <span><?php comments_number(esc_html__('0 Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway'), $post->ID); ?></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h5 class="pxl-post--title title-hover-line"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h5>
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
                            <div class="pxl-post--button">
                                <div class="pxl-post--button-divider"></div>
                                <a class="pxl-post--button-link" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <span class="pxl-post--button-text">
                                        <?php if (!empty($button_text)) {
                                            echo esc_attr($button_text);
                                        } else {
                                            echo esc_html__('Read More', 'northway');
                                        } ?>
                                    </span>
                                    <div class="pxl-post--button-icon">
                                        <i class="bi-arrow-right-short"></i>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

function northway_get_post_grid_layout3($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '767x550';

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
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            if (!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else
                $filter_class = ''; ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?> wow" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size(array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail    = $img['thumbnail'];
                    ?>
                        <div class="pxl-post--featured hover-imge-effect2">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                            <?php if ($show_date == 'true'): ?>
                                <div class="post-date">
                                    <span class="day"><?php echo get_the_date('d', $post->ID) ?></span>
                                    <span class="month"><?php echo get_the_date('M', $post->ID) ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="pxl-post--meta">
                                <?php if ($show_date == 'true' || $show_author == 'true'): ?>
                                    <?php if ($show_author == 'true'): ?>
                                        <div class="pxl-item--meta">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12" fill="none">
                                                <path d="M2.16811 2.92717C2.16811 2.37856 2.3308 1.84226 2.63559 1.3861C2.94039 0.929946 3.3736 0.574414 3.88046 0.364468C4.38731 0.154522 4.94504 0.0995907 5.48311 0.20662C6.02119 0.31365 6.51544 0.577833 6.90337 0.965763C7.2913 1.35369 7.55549 1.84795 7.66252 2.38602C7.76954 2.92409 7.71461 3.48182 7.50467 3.98868C7.29472 4.49553 6.93919 4.92875 6.48303 5.23354C6.02687 5.53834 5.49058 5.70102 4.94196 5.70102C4.20655 5.70018 3.5015 5.40767 2.98148 4.88765C2.46147 4.36764 2.16895 3.66258 2.16811 2.92717ZM9.57826 9.8083C9.5217 9.56843 9.44345 9.33419 9.34446 9.1085C8.63792 7.4957 6.95142 6.49355 4.94196 6.49355C2.66067 6.49355 0.801794 7.81073 0.315974 9.77066C0.27259 9.94612 0.269677 10.1291 0.307455 10.3059C0.345233 10.4826 0.422712 10.6485 0.534032 10.7909C0.645352 10.9333 0.787596 11.0485 0.950006 11.1278C1.11242 11.2071 1.29074 11.2485 1.47148 11.2487H8.41403C8.59558 11.2491 8.77484 11.2082 8.93819 11.1289C9.10154 11.0497 9.24468 10.9343 9.35674 10.7914C9.46581 10.6551 9.54243 10.4957 9.5808 10.3254C9.61918 10.1551 9.61831 9.97824 9.57826 9.8083Z" fill="currentColor" />
                                            </svg>
                                            <span class="pxl-author--title">
                                                <?php echo esc_html__('By: ', 'northway'); ?><?php echo esc_html($author->display_name); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if ($show_comment == 'true'): ?>
                                    <div class="pxl-item--meta">
                                        <?php if ($show_comment == 'true'): ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="11" viewBox="0 0 12 11" fill="none">
                                                <path d="M5.827 0.153321C4.78994 0.15307 3.77161 0.39691 2.87717 0.859657C1.98273 1.3224 1.24462 1.98728 0.739069 2.78562C0.233516 3.58396 -0.0211496 4.48681 0.00137448 5.40094C0.0238986 6.31506 0.322796 7.20731 0.867195 7.98554L0.405965 10.2138C0.392409 10.2808 0.397392 10.3497 0.42049 10.4147C0.443588 10.4797 0.48412 10.5388 0.538648 10.587C0.582919 10.625 0.635311 10.655 0.692791 10.6751C0.75027 10.6951 0.811696 10.705 0.873513 10.704H0.968287L4.02631 10.1469C4.60378 10.3343 5.21192 10.4377 5.827 10.4533C7.37618 10.4533 8.86192 9.91071 9.95735 8.9449C11.0528 7.97909 11.6682 6.66917 11.6682 5.30331C11.6682 3.93745 11.0528 2.62753 9.95735 1.66172C8.86192 0.695907 7.37618 0.153321 5.827 0.153321ZM2.82585 5.43979C2.82585 5.30207 2.87216 5.16744 2.95895 5.05293C3.04573 4.93843 3.16908 4.84918 3.31339 4.79647C3.4577 4.74377 3.6165 4.72998 3.7697 4.75685C3.9229 4.78372 4.06363 4.85003 4.17408 4.94742C4.28453 5.0448 4.35975 5.16887 4.39023 5.30394C4.4207 5.43902 4.40506 5.57902 4.34528 5.70626C4.28551 5.8335 4.18428 5.94225 4.0544 6.01876C3.92452 6.09527 3.77183 6.13611 3.61562 6.13611C3.40616 6.13611 3.20528 6.06275 3.05717 5.93216C2.90905 5.80158 2.82585 5.62447 2.82585 5.43979ZM5.03722 5.43979C5.03722 5.30207 5.08354 5.16744 5.17033 5.05293C5.25711 4.93843 5.38045 4.84918 5.52477 4.79647C5.66908 4.74377 5.82788 4.72998 5.98108 4.75685C6.13428 4.78372 6.27501 4.85003 6.38546 4.94742C6.49591 5.0448 6.57113 5.16887 6.60161 5.30394C6.63208 5.43902 6.61644 5.57902 6.55666 5.70626C6.49689 5.8335 6.39566 5.94225 6.26578 6.01876C6.1359 6.09527 5.98321 6.13611 5.827 6.13611C5.61754 6.13611 5.41666 6.06275 5.26854 5.93216C5.12043 5.80158 5.03722 5.62447 5.03722 5.43979ZM8.03838 6.13611C7.88218 6.13611 7.72948 6.09527 7.5996 6.01876C7.46973 5.94225 7.3685 5.8335 7.30872 5.70626C7.24895 5.57902 7.2333 5.43902 7.26378 5.30394C7.29425 5.16887 7.36947 5.0448 7.47992 4.94742C7.59038 4.85003 7.7311 4.78372 7.8843 4.75685C8.03751 4.72998 8.1963 4.74377 8.34062 4.79647C8.48493 4.84918 8.60828 4.93843 8.69506 5.05293C8.78184 5.16744 8.82816 5.30207 8.82816 5.43979C8.82816 5.62447 8.74495 5.80158 8.59684 5.93216C8.44873 6.06275 8.24784 6.13611 8.03838 6.13611Z" fill="currentColor" />
                                            </svg>
                                            <a href="<?php echo get_comments_link($post->ID); ?>">
                                                <span><?php comments_number(esc_html__('0 Comments', 'northway'), esc_html__(' 1 Comment', 'northway'), esc_html__('%  Comments', 'northway'), $post->ID); ?></span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="pxl-post--holder">
                            <h5 class="pxl-post--title ">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <?php echo pxl_print_html(get_the_title($post->ID)); ?>
                                </a>
                            </h5>
                            <?php if ($show_excerpt == 'true'): ?>
                                <p class="pxl-post--content">
                                    <?php
                                    echo wp_trim_words($post->post_excerpt, $num_words, null);
                                    ?>
                                </p>
                            <?php endif; ?>
                            <?php if ($show_button == 'true') : ?>
                                <div class="pxl-post--readmore">
                                    <div class="pxl-post--readmore-divider"></div>
                                    <a href="<?php if (!empty($service_external_link)) {
                                                    echo esc_url($service_external_link);
                                                } else {
                                                    echo esc_url(get_permalink($post->ID));
                                                } ?>" class="btn-readmore">
                                        <span class="pxl-post--readmore-text">
                                            <?php if (!empty($button_text)) : ?>
                                                <?php echo pxl_print_html($button_text); ?>
                                            <?php else : ?>
                                                <?php echo esc_html__('Read more', 'northway'); ?>
                                            <?php endif; ?>
                                        </span>
                                        <div class="pxl-post--readmore-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none">
                                                <path d="M10.2 0.199951L9.01 1.38995L13.77 6.14995H0V7.84995H13.77L9.01 12.61L10.2 13.8L17 6.99995L10.2 0.199951Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </a>
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
                        $img          = pxl_get_image_by_size(array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail    = $img['thumbnail'];
                        $thumbnail_url    = $img['url'];
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
                                'attach_id'  => $industries_icon_img['id'],
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
                        <h4 class="pxl-post--title title-hover-line"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h4>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6" fill="none">
                                        <path d="M17.7721 5.477L19.8245 3.42458C19.9369 3.31189 20 3.15921 20 3.00003C20 2.84085 19.9369 2.68817 19.8245 2.57548L17.7721 0.523097C17.68 0.433323 17.5562 0.383455 17.4275 0.384288C17.2989 0.385121 17.1757 0.436588 17.0848 0.527548C16.9938 0.618508 16.9423 0.741639 16.9414 0.870284C16.9406 0.998928 16.9904 1.12273 17.0802 1.21489L18.376 2.51071H0.489219C0.35947 2.51071 0.235035 2.56226 0.143289 2.654C0.0515425 2.74575 0 2.87018 0 2.99993C0 3.12968 0.0515425 3.25412 0.143289 3.34586C0.235035 3.43761 0.35947 3.48915 0.489219 3.48915H18.3759L17.0802 4.78521C16.9896 4.8772 16.939 5.00126 16.9395 5.13037C16.94 5.25948 16.9915 5.38315 17.0828 5.47445C17.1741 5.56574 17.2978 5.61725 17.4269 5.61775C17.556 5.61825 17.6801 5.5677 17.7721 5.47712V5.477Z" fill="white" />
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div style="background-image: url(<?php echo esc_attr($thumbnail_url); ?>);" class="pxl-item--overlay bg-image">
                        <?php if ($industries_icon_type == 'icon' && !empty($industries_icon_font)) : ?>
                            <div class="pxl-post--icon">
                                <i class="<?php echo esc_attr($industries_icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <?php if ($industries_icon_type == 'image' && !empty($industries_icon_img)) :
                            $icon_img = pxl_get_image_by_size(array(
                                'attach_id'  => $industries_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                        ?>
                            <div class="pxl-post--icon">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <h4 class="pxl-post--title title-hover-line"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a></h4>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6" fill="none">
                                        <path d="M17.7721 5.477L19.8245 3.42458C19.9369 3.31189 20 3.15921 20 3.00003C20 2.84085 19.9369 2.68817 19.8245 2.57548L17.7721 0.523097C17.68 0.433323 17.5562 0.383455 17.4275 0.384288C17.2989 0.385121 17.1757 0.436588 17.0848 0.527548C16.9938 0.618508 16.9423 0.741639 16.9414 0.870284C16.9406 0.998928 16.9904 1.12273 17.0802 1.21489L18.376 2.51071H0.489219C0.35947 2.51071 0.235035 2.56226 0.143289 2.654C0.0515425 2.74575 0 2.87018 0 2.99993C0 3.12968 0.0515425 3.25412 0.143289 3.34586C0.235035 3.43761 0.35947 3.48915 0.489219 3.48915H18.3759L17.0802 4.78521C16.9896 4.8772 16.939 5.00126 16.9395 5.13037C16.94 5.25948 16.9915 5.38315 17.0828 5.47445C17.1741 5.56574 17.2978 5.61725 17.4269 5.61775C17.556 5.61825 17.6801 5.5677 17.7721 5.47712V5.477Z" fill="white" />
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
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }  ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <div class="pxl-post--featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                            <?php if ($show_button == 'true'): ?>
                                <a class="pxl-post--button" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                    <span class="button-arrow-hover">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none">
                                                    <path d="M2.04083 3C2.04083 2.40666 2.21678 1.82664 2.54642 1.33329C2.87606 0.839943 3.3446 0.455425 3.89278 0.228363C4.44096 0.00129985 5.04416 -0.0581101 5.6261 0.0576455C6.20804 0.173401 6.74259 0.459123 7.16215 0.878681C7.5817 1.29824 7.86743 1.83279 7.98318 2.41473C8.09894 2.99667 8.03953 3.59987 7.81247 4.14805C7.5854 4.69623 7.20088 5.16476 6.70754 5.49441C6.21419 5.82405 5.63417 6 5.04083 6C4.24546 5.99909 3.48292 5.68273 2.92051 5.12032C2.3581 4.5579 2.04174 3.79537 2.04083 3ZM10.0551 10.4421C9.99395 10.1827 9.90931 9.92938 9.80225 9.68528C9.03811 7.941 7.21411 6.85714 5.04083 6.85714C2.57354 6.85714 0.563115 8.28171 0.0376868 10.4014C-0.00923371 10.5912 -0.0123843 10.7891 0.0284734 10.9803C0.0693312 11.1715 0.153127 11.3508 0.273523 11.5048C0.393918 11.6588 0.54776 11.7834 0.723411 11.8692C0.899062 11.955 1.09192 11.9997 1.2874 12H8.79597C8.99232 12.0004 9.1862 11.9561 9.36286 11.8704C9.53953 11.7847 9.69434 11.6599 9.81554 11.5054C9.93349 11.358 10.0164 11.1856 10.0579 11.0014C10.0994 10.8172 10.0984 10.6259 10.0551 10.4421Z" fill="currentColor" />
                                                </svg>
                                                <span><?php echo esc_html($client); ?></span>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($show_address == 'true'): ?>
                                            <div class="pxl-post--address">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.83871 0C7.50939 0 9.67742 2.17629 9.67742 4.85714C9.67742 6.25314 8.98349 7.69 8.11224 8.89657C6.89573 10.5817 5.37438 11.8103 5.37438 11.8103V11.8106C5.06157 12.0631 4.61585 12.0631 4.30304 11.8106V11.8103C4.30304 11.8103 2.78169 10.5817 1.56518 8.89657C0.693926 7.69 0 6.25314 0 4.85714C0 2.17629 2.16803 0 4.83871 0ZM4.83871 2.85714C5.93824 2.85714 6.83112 3.75343 6.83112 4.85714C6.83112 5.96086 5.93824 6.85714 4.83871 6.85714C3.73918 6.85714 2.8463 5.96086 2.8463 4.85714C2.8463 3.75343 3.73918 2.85714 4.83871 2.85714Z" fill="currentColor" />
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

function northway_get_portfolio_grid_layout2($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '740x395';

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
            $portfolio_icon_type = get_post_meta($post->ID, 'portfolio_icon_type', true);
            $portfolio_icon_font = get_post_meta($post->ID, 'portfolio_icon_font', true);
            $portfolio_icon_img = get_post_meta($post->ID, 'portfolio_icon_img', true);
            $client = get_post_meta($post->ID, 'portfolio_client', true);
            $address = get_post_meta($post->ID, 'portfolio_address', true);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                if ($img_id) {
                    $img = pxl_get_image_by_size(array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }  ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <div class="pxl-post--featured ">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                        <div class="pxl-post--holder">
                            <div class="pxl-post--header">
                                <?php if ($portfolio_icon_type == 'icon' && !empty($portfolio_icon_font)) : ?>
                                    <div class="pxl-post--icon">
                                        <i class="<?php echo esc_attr($portfolio_icon_font); ?>"></i>
                                    </div>
                                <?php endif; ?>
                                <?php if ($portfolio_icon_type == 'image' && !empty($portfolio_icon_img)) : ?>
                                    <div class="pxl-post--icon">
                                        <?php echo wp_kses_post($portfolio_icon_img); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($show_button == 'true'): ?>
                                    <a class="pxl-post--button" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                        <span class="button-arrow-hover">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="pxl-post--meta">
                                <?php if ($show_client == 'true'): ?>
                                    <div class="pxl-post--client">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none">
                                            <path d="M2.04083 3C2.04083 2.40666 2.21678 1.82664 2.54642 1.33329C2.87606 0.839943 3.3446 0.455425 3.89278 0.228363C4.44096 0.00129985 5.04416 -0.0581101 5.6261 0.0576455C6.20804 0.173401 6.74259 0.459123 7.16215 0.878681C7.5817 1.29824 7.86743 1.83279 7.98318 2.41473C8.09894 2.99667 8.03953 3.59987 7.81247 4.14805C7.5854 4.69623 7.20088 5.16476 6.70754 5.49441C6.21419 5.82405 5.63417 6 5.04083 6C4.24546 5.99909 3.48292 5.68273 2.92051 5.12032C2.3581 4.5579 2.04174 3.79537 2.04083 3ZM10.0551 10.4421C9.99395 10.1827 9.90931 9.92938 9.80225 9.68528C9.03811 7.941 7.21411 6.85714 5.04083 6.85714C2.57354 6.85714 0.563115 8.28171 0.0376868 10.4014C-0.00923371 10.5912 -0.0123843 10.7891 0.0284734 10.9803C0.0693312 11.1715 0.153127 11.3508 0.273523 11.5048C0.393918 11.6588 0.54776 11.7834 0.723411 11.8692C0.899062 11.955 1.09192 11.9997 1.2874 12H8.79597C8.99232 12.0004 9.1862 11.9561 9.36286 11.8704C9.53953 11.7847 9.69434 11.6599 9.81554 11.5054C9.93349 11.358 10.0164 11.1856 10.0579 11.0014C10.0994 10.8172 10.0984 10.6259 10.0551 10.4421Z" fill="currentColor" />
                                        </svg>
                                        <span><?php echo esc_html($client); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if ($show_address == 'true'): ?>
                                    <div class="pxl-post--address">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.83871 0C7.50939 0 9.67742 2.17629 9.67742 4.85714C9.67742 6.25314 8.98349 7.69 8.11224 8.89657C6.89573 10.5817 5.37438 11.8103 5.37438 11.8103V11.8106C5.06157 12.0631 4.61585 12.0631 4.30304 11.8106V11.8103C4.30304 11.8103 2.78169 10.5817 1.56518 8.89657C0.693926 7.69 0 6.25314 0 4.85714C0 2.17629 2.16803 0 4.83871 0ZM4.83871 2.85714C5.93824 2.85714 6.83112 3.75343 6.83112 4.85714C6.83112 5.96086 5.93824 6.85714 4.83871 6.85714C3.73918 6.85714 2.8463 5.96086 2.8463 4.85714C2.8463 3.75343 3.73918 2.85714 4.83871 2.85714Z" fill="currentColor" />
                                        </svg>
                                        <span><?php echo esc_html($address); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <h5 class="pxl-post--title">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
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
                            <div class="pxl-post--footer">
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
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach;
    endif;
}

function northway_get_portfolio_grid_layout3($posts = [], $settings = [])
{
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '630x539';

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
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                } else {
                    $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                }  ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <?php if ($show_button == 'true'): ?>
                            <a class="pxl-post--button" href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <span class="button-arrow-hover">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                    </svg>
                                </span>
                            </a>
                        <?php endif; ?>
                        <div class="pxl-post--featured ">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                        <div class="pxl-post--holder">
                            <div class="pxl-post--body">
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
                                <h5 class="pxl-post--title">
                                    <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
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
                                <div class="pxl-post--meta">
                                    <?php if ($show_client == 'true'): ?>
                                        <div class="pxl-post--client">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12" viewBox="0 0 11 12" fill="none">
                                                <path d="M2.04083 3C2.04083 2.40666 2.21678 1.82664 2.54642 1.33329C2.87606 0.839943 3.3446 0.455425 3.89278 0.228363C4.44096 0.00129985 5.04416 -0.0581101 5.6261 0.0576455C6.20804 0.173401 6.74259 0.459123 7.16215 0.878681C7.5817 1.29824 7.86743 1.83279 7.98318 2.41473C8.09894 2.99667 8.03953 3.59987 7.81247 4.14805C7.5854 4.69623 7.20088 5.16476 6.70754 5.49441C6.21419 5.82405 5.63417 6 5.04083 6C4.24546 5.99909 3.48292 5.68273 2.92051 5.12032C2.3581 4.5579 2.04174 3.79537 2.04083 3ZM10.0551 10.4421C9.99395 10.1827 9.90931 9.92938 9.80225 9.68528C9.03811 7.941 7.21411 6.85714 5.04083 6.85714C2.57354 6.85714 0.563115 8.28171 0.0376868 10.4014C-0.00923371 10.5912 -0.0123843 10.7891 0.0284734 10.9803C0.0693312 11.1715 0.153127 11.3508 0.273523 11.5048C0.393918 11.6588 0.54776 11.7834 0.723411 11.8692C0.899062 11.955 1.09192 11.9997 1.2874 12H8.79597C8.99232 12.0004 9.1862 11.9561 9.36286 11.8704C9.53953 11.7847 9.69434 11.6599 9.81554 11.5054C9.93349 11.358 10.0164 11.1856 10.0579 11.0014C10.0994 10.8172 10.0984 10.6259 10.0551 10.4421Z" fill="currentColor" />
                                            </svg>
                                            <span><?php echo esc_html($client); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($show_address == 'true'): ?>
                                        <div class="pxl-post--address">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="12" viewBox="0 0 10 12" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.83871 0C7.50939 0 9.67742 2.17629 9.67742 4.85714C9.67742 6.25314 8.98349 7.69 8.11224 8.89657C6.89573 10.5817 5.37438 11.8103 5.37438 11.8103V11.8106C5.06157 12.0631 4.61585 12.0631 4.30304 11.8106V11.8103C4.30304 11.8103 2.78169 10.5817 1.56518 8.89657C0.693926 7.69 0 6.25314 0 4.85714C0 2.17629 2.16803 0 4.83871 0ZM4.83871 2.85714C5.93824 2.85714 6.83112 3.75343 6.83112 4.85714C6.83112 5.96086 5.93824 6.85714 4.83871 6.85714C3.73918 6.85714 2.8463 5.96086 2.8463 4.85714C2.8463 3.75343 3.73918 2.85714 4.83871 2.85714Z" fill="currentColor" />
                                            </svg>
                                            <span><?php echo esc_html($address); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
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

    $images_size = !empty($img_size) ? $img_size : '820x1600';

    if (is_array($posts)):
        $post_groups = array_chunk($posts, 4);

        foreach ($post_groups as $group_index => $post_group):
        ?>
            <div class="pxl-service-grid-item">
                <div class="pxl-service-pair-wrapper <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-service-grid-layout">

                        <div class="pxl-service-left-column">
                            <?php
                            if (isset($post_group[0])):
                                $post = $post_group[0];
                                $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                                $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                                $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                                $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                                $service_feature = get_post_meta($post->ID, 'service_feature', true);

                                // Get image URL for hover effect
                                $hover_image_url = '';
                                if (has_post_thumbnail($post->ID)) {
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img = pxl_get_image_by_size(array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $images_size
                                    ));
                                    $hover_image_url = $img['url'];
                                }
                            ?>
                                <div class="pxl-post-item" data-image-url="<?php echo esc_url($hover_image_url); ?>" data-post-id="<?php echo esc_attr($post->ID); ?>">
                                    <?php if ($show_button == 'true') : ?>
                                        <a class="pxl-post--button" href="<?php if (!empty($service_external_link)) {
                                                                                echo esc_url($service_external_link);
                                                                            } else {
                                                                                echo esc_url(get_permalink($post->ID));
                                                                            } ?>">
                                            <span class="button-arrow-hover">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                        <div class="pxl-post--icon">
                                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($service_icon_type == 'image' && !empty($service_icon_img)) :
                                        $icon_img = pxl_get_image_by_size(array(
                                            'attach_id'  => $service_icon_img['id'],
                                            'thumb_size' => 'full',
                                        ));
                                        $icon_thumbnail = $icon_img['thumbnail'];
                                    ?>
                                        <div class="pxl-post--icon">
                                            <?php echo wp_kses_post($icon_thumbnail); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="pxl-post--holder">
                                        <h3 class="pxl-post--title">
                                            <a href="<?php if (!empty($service_external_link)) {
                                                            echo esc_url($service_external_link);
                                                        } else {
                                                            echo esc_url(get_permalink($post->ID));
                                                        } ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                                        </h3>

                                        <?php if ($show_excerpt == 'true'): ?>
                                            <div class="pxl-post--content">
                                                <?php echo wp_trim_words($post->post_excerpt, $num_words, null); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="pxl-post--feature">
                                            <?php foreach ($service_feature as $feature): ?>
                                                <div class="pxl-post--feature-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                        <path d="M5.75406 4.56527C6.21903 4.29681 6.21903 3.62569 5.75406 3.35723L1.04619 0.63916C0.581218 0.370708 -2.34689e-08 0.706273 0 1.24318V6.67932C2.34689e-08 7.21623 0.581218 7.55179 1.04619 7.28334L5.75406 4.56527Z" fill="currentColor" />
                                                    </svg>
                                                    <div class="pxl-post--feature-text">
                                                        <?php echo wp_kses_post($feature); ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php
                            if (isset($post_group[2])):
                                $post = $post_group[2];
                                $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                                $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                                $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                                $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                                $service_feature = get_post_meta($post->ID, 'service_feature', true);

                                // Get image URL for hover effect
                                $hover_image_url = '';
                                if (has_post_thumbnail($post->ID)) {
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img = pxl_get_image_by_size(array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $images_size
                                    ));
                                    $hover_image_url = $img['url'];
                                }
                            ?>
                                <div class="pxl-post-item" data-image-url="<?php echo esc_url($hover_image_url); ?>" data-post-id="<?php echo esc_attr($post->ID); ?>">
                                    <?php if ($show_button == 'true') : ?>
                                        <a class="pxl-post--button" href="<?php if (!empty($service_external_link)) {
                                                                                echo esc_url($service_external_link);
                                                                            } else {
                                                                                echo esc_url(get_permalink($post->ID));
                                                                            } ?>">
                                            <span class="button-arrow-hover">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                        <div class="pxl-post--icon">
                                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($service_icon_type == 'image' && !empty($service_icon_img)) :
                                        $icon_img = pxl_get_image_by_size(array(
                                            'attach_id'  => $service_icon_img['id'],
                                            'thumb_size' => 'full',
                                        ));
                                        $icon_thumbnail = $icon_img['thumbnail'];
                                    ?>
                                        <div class="pxl-post--icon">
                                            <?php echo wp_kses_post($icon_thumbnail); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="pxl-post--holder">
                                        <h3 class="pxl-post--title">
                                            <a href="<?php if (!empty($service_external_link)) {
                                                            echo esc_url($service_external_link);
                                                        } else {
                                                            echo esc_url(get_permalink($post->ID));
                                                        } ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                                        </h3>

                                        <?php if ($show_excerpt == 'true'): ?>
                                            <div class="pxl-post--content">
                                                <?php echo wp_trim_words($post->post_excerpt, $num_words, null); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="pxl-post--feature">
                                            <?php foreach ($service_feature as $feature): ?>
                                                <div class="pxl-post--feature-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                        <path d="M5.75406 4.56527C6.21903 4.29681 6.21903 3.62569 5.75406 3.35723L1.04619 0.63916C0.581218 0.370708 -2.34689e-08 0.706273 0 1.24318V6.67932C2.34689e-08 7.21623 0.581218 7.55179 1.04619 7.28334L5.75406 4.56527Z" fill="currentColor" />
                                                    </svg>
                                                    <div class="pxl-post--feature-text">
                                                        <?php echo wp_kses_post($feature); ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="pxl-service-center-column pxl-long-image-wrapper">
                            <?php
                            // Display all 4 images stacked with absolute positioning
                            foreach ($post_group as $index => $post):
                                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img = pxl_get_image_by_size(array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $images_size
                                    ));
                                    $thumbnail = $img['thumbnail'];
                                    $active_class = ($index === 0) ? 'active' : '';
                            ?>
                                    <div class="pxl-post--featured pxl-long-image <?php echo esc_attr($active_class); ?>" data-post-id="<?php echo esc_attr($post->ID); ?>">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                        <a class="pxl-post--link" href="<?php echo esc_url(get_permalink($post->ID)); ?>"></a>
                                    </div>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>

                        <div class="pxl-service-right-column">
                            <?php
                            if (isset($post_group[1])):
                                $post = $post_group[1];
                                $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                                $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                                $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                                $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                                $service_feature = get_post_meta($post->ID, 'service_feature', true);

                                // Get image URL for hover effect
                                $hover_image_url = '';
                                if (has_post_thumbnail($post->ID)) {
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img = pxl_get_image_by_size(array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $images_size
                                    ));
                                    $hover_image_url = $img['url'];
                                }
                            ?>
                                <div class="pxl-post-item" data-image-url="<?php echo esc_url($hover_image_url); ?>" data-post-id="<?php echo esc_attr($post->ID); ?>">
                                    <?php if ($show_button == 'true') : ?>
                                        <a class="pxl-post--button" href="<?php if (!empty($service_external_link)) {
                                                                                echo esc_url($service_external_link);
                                                                            } else {
                                                                                echo esc_url(get_permalink($post->ID));
                                                                            } ?>">
                                            <span class="button-arrow-hover">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                        <div class="pxl-post--icon">
                                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($service_icon_type == 'image' && !empty($service_icon_img)) :
                                        $icon_img = pxl_get_image_by_size(array(
                                            'attach_id'  => $service_icon_img['id'],
                                            'thumb_size' => 'full',
                                        ));
                                        $icon_thumbnail = $icon_img['thumbnail'];
                                    ?>
                                        <div class="pxl-post--icon">
                                            <?php echo wp_kses_post($icon_thumbnail); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="pxl-post--holder">
                                        <h3 class="pxl-post--title">
                                            <a href="<?php if (!empty($service_external_link)) {
                                                            echo esc_url($service_external_link);
                                                        } else {
                                                            echo esc_url(get_permalink($post->ID));
                                                        } ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                                        </h3>

                                        <?php if ($show_excerpt == 'true'): ?>
                                            <div class="pxl-post--content">
                                                <?php echo wp_trim_words($post->post_excerpt, $num_words, null); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="pxl-post--feature">
                                            <?php foreach ($service_feature as $feature): ?>
                                                <div class="pxl-post--feature-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                        <path d="M5.75406 4.56527C6.21903 4.29681 6.21903 3.62569 5.75406 3.35723L1.04619 0.63916C0.581218 0.370708 -2.34689e-08 0.706273 0 1.24318V6.67932C2.34689e-08 7.21623 0.581218 7.55179 1.04619 7.28334L5.75406 4.56527Z" fill="currentColor" />
                                                    </svg>
                                                    <div class="pxl-post--feature-text">
                                                        <?php echo wp_kses_post($feature); ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php
                            if (isset($post_group[3])):
                                $post = $post_group[3];
                                $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                                $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                                $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                                $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                                $service_feature = get_post_meta($post->ID, 'service_feature', true);

                                $hover_image_url = '';
                                if (has_post_thumbnail($post->ID)) {
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img = pxl_get_image_by_size(array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $images_size
                                    ));
                                    $hover_image_url = $img['url'];
                                }
                            ?>
                                <div class="pxl-post-item" data-image-url="<?php echo esc_url($hover_image_url); ?>" data-post-id="<?php echo esc_attr($post->ID); ?>">
                                    <?php if ($show_button == 'true') : ?>
                                        <a class="pxl-post--button" href="<?php if (!empty($service_external_link)) {
                                                                                echo esc_url($service_external_link);
                                                                            } else {
                                                                                echo esc_url(get_permalink($post->ID));
                                                                            } ?>">
                                            <span class="button-arrow-hover">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.17427 1.61558C2.1395 1.10784 2.52294 0.668017 3.03065 0.633256L10.4921 0.122165C10.7577 0.104007 11.0183 0.20166 11.2066 0.389926C11.3949 0.57828 11.4925 0.838829 11.4743 1.10442L10.9632 8.56584C10.9285 9.07356 10.4887 9.45705 9.98099 9.4223C9.47318 9.38746 9.08987 8.94768 9.12462 8.43996L9.46762 3.43208L1.6499 11.2498C1.29004 11.6097 0.706571 11.6096 0.346719 11.2498C-0.0131339 10.8899 -0.0131425 10.3065 0.346719 9.94661L8.16443 2.1289L3.15659 2.47193C2.64888 2.50669 2.20904 2.12332 2.17427 1.61558Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                        <div class="pxl-post--icon">
                                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($service_icon_type == 'image' && !empty($service_icon_img)) :
                                        $icon_img = pxl_get_image_by_size(array(
                                            'attach_id'  => $service_icon_img['id'],
                                            'thumb_size' => 'full',
                                        ));
                                        $icon_thumbnail = $icon_img['thumbnail'];
                                    ?>
                                        <div class="pxl-post--icon">
                                            <?php echo wp_kses_post($icon_thumbnail); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="pxl-post--holder">
                                        <h3 class="pxl-post--title">
                                            <a href="<?php if (!empty($service_external_link)) {
                                                            echo esc_url($service_external_link);
                                                        } else {
                                                            echo esc_url(get_permalink($post->ID));
                                                        } ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                                        </h3>

                                        <?php if ($show_excerpt == 'true'): ?>
                                            <div class="pxl-post--content">
                                                <?php echo wp_trim_words($post->post_excerpt, $num_words, null); ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="pxl-post--feature">
                                            <?php foreach ($service_feature as $feature): ?>
                                                <div class="pxl-post--feature-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                                        <path d="M5.75406 4.56527C6.21903 4.29681 6.21903 3.62569 5.75406 3.35723L1.04619 0.63916C0.581218 0.370708 -2.34689e-08 0.706273 0 1.24318V6.67932C2.34689e-08 7.21623 0.581218 7.55179 1.04619 7.28334L5.75406 4.56527Z" fill="currentColor" />
                                                    </svg>
                                                    <div class="pxl-post--feature-text">
                                                        <?php echo wp_kses_post($feature); ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
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
            $service_feature = get_post_meta($post->ID, 'service_feature', true);
        ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size(array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ));
                        $thumbnail    = $img['thumbnail'];
                    ?>
                    <?php endif; ?>
                    <div class="pxl-post--thumbnail">
                        <?php echo wp_kses_post($thumbnail); ?>
                        <?php if ($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="pxl-post--icon">
                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                            </div>
                        <?php endif; ?>
                        <?php if ($service_icon_type == 'image' && !empty($service_icon_img)) :
                            $icon_img = pxl_get_image_by_size(array(
                                'attach_id'  => $service_icon_img['id'],
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
                    </div>
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
                                    <?php echo wp_trim_words($post->post_excerpt,  $num_words, null); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-post--feature">
                            <?php foreach ($service_feature as $feature): ?>
                                <div class="pxl-post--feature-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="7" viewBox="0 0 7 7" fill="none">
                                        <path d="M5.75406 4.56527C6.21903 4.29681 6.21903 3.62569 5.75406 3.35723L1.04619 0.63916C0.581218 0.370708 -2.34689e-08 0.706273 0 1.24318V6.67932C2.34689e-08 7.21623 0.581218 7.55179 1.04619 7.28334L5.75406 4.56527Z" fill="currentColor" />
                                    </svg>
                                    <div class="pxl-post--feature-text">
                                        <?php echo wp_kses_post($feature); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php if ($show_button == 'true') : ?>
                        <div class="pxl-post--readmore">
                            <div class="pxl-post--readmore-divider"></div>
                            <a href="<?php if (!empty($service_external_link)) {
                                            echo esc_url($service_external_link);
                                        } else {
                                            echo esc_url(get_permalink($post->ID));
                                        } ?>" class="pxl-post--readmore-button">
                                <span class="pxl-post--readmore-text">
                                    <?php if (!empty($button_text)) : ?>
                                        <?php echo pxl_print_html($button_text); ?>
                                    <?php else : ?>
                                        <?php echo esc_html__('Read more', 'northway'); ?>
                                    <?php endif; ?>
                                </span>
                                <div class="pxl-post--readmore-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none">
                                        <path d="M10.2 0.199951L9.01 1.38995L13.77 6.14995H0V7.84995H13.77L9.01 12.61L10.2 13.8L17 6.99995L10.2 0.199951Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="404" height="360" viewBox="0 0 404 360" fill="none" class="pxl-post--shape">
                        <g filter="url(#filter0_f_249_133)">
                            <path d="M451.888 450.607C494.134 435.546 516.28 367.891 433.222 227.964C419.708 189.999 337.185 189.164 310.442 240.751C258.223 341.482 185.982 204.5 202.969 398.5C271.218 545.256 409.642 465.669 451.888 450.607Z" fill="#EAF0DA" />
                        </g>
                        <defs>
                            <filter id="filter0_f_249_133" x="0.439758" y="0.625244" width="689.114" height="685.028" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                                <feGaussianBlur stdDeviation="100" result="effect1_foregroundBlur_249_133" />
                            </filter>
                        </defs>
                    </svg>
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
                'source'      => $source,
                'orderby'     => isset($settings['orderby']) ? $settings['orderby'] : 'date',
                'order'       => isset($settings['order']) ? ($settings['orderby'] == 'title' ? 'asc' : sanitize_text_field($settings['order'])) : 'desc',
                'limit'       => isset($settings['limit']) ? $settings['limit'] : '6',
                'post_ids'    => isset($settings['post_ids']) ? $settings['post_ids'] : [],
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
            northway()->page->get_pagination($query,  true);
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
