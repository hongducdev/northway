<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if ($select_post_by === 'post_selected') {
    $post_ids = $widget->get_setting('source_' . $settings['post_type'] . '_post_ids', '');
} else {
    $source  = $widget->get_setting('source_' . $settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_' . $settings['post_type']];
extract(pxl_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if ($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows', false);
$pagination = $widget->get_setting('pagination', false);
$style_l11 = $widget->get_setting('style_l11', 'pxl-post-style1');
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', false);
$show_number = $widget->get_setting('show_number', false);
$drap = $widget->get_setting('drap', false);

$img_size = $widget->get_setting('img_size');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text', 'Read More');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1,
    'slide_percolumnfill'           => 1,
    'slide_mode'                    => 'slide',
    'slides_to_show'                => (int)$col_xl,
    'slides_to_show_xxl'            => (int)$col_xxl,
    'slides_to_show_lg'             => (int)$col_lg,
    'slides_to_show_md'             => (int)$col_md,
    'slides_to_show_sm'             => (int)$col_sm,
    'slides_to_show_xs'             => (int)$col_xs,
    'slides_to_scroll'              => (int)$slides_to_scroll,
    'slides_gutter'                 => 30,
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed,
    'center'                        => (bool)$center,
];

$widget->add_render_attribute('carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-service-carousel pxl-service-carousel1 pxl-service-style1 pxl-swiper-boxshadow <?php echo esc_attr($style_l11); ?>" <?php if ($drap !== false): ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?>>
        <div class="pxl-carousel-inner ">
            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $image_size = !empty($img_size) ? $img_size : '364x308';
                    foreach ($posts as $post):
                        $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
                        $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                        $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                        $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                        $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                        $service_feature = get_post_meta($post->ID, 'service_feature', true);
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) {
                            $img_id       = get_post_thumbnail_id($post->ID);
                            $img          = pxl_get_image_by_size(array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size
                            ));
                            $thumbnail    = $img['thumbnail'];
                        }
                    ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
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
                                                    <path d="M5.75406 4.56527C6.21903 4.29681 6.21903 3.62569 5.75406 3.35723L1.04619 0.63916C0.581218 0.370708 -2.34689e-08 0.706273 0 1.24318V6.67932C2.34689e-08 7.21623 0.581218 7.55179 1.04619 7.28334L5.75406 4.56527Z" fill="currentColor"/>
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
                                        <path d="M451.888 450.607C494.134 435.546 516.28 367.891 433.222 227.964C419.708 189.999 337.185 189.164 310.442 240.751C258.223 341.482 185.982 204.5 202.969 398.5C271.218 545.256 409.642 465.669 451.888 450.607Z" fill="#EAF0DA"/>
                                    </g>
                                    <defs>
                                        <filter id="filter0_f_249_133" x="0.439758" y="0.625244" width="689.114" height="685.028" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                        <feGaussianBlur stdDeviation="100" result="effect1_foregroundBlur_249_133"/>
                                        </filter>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if ($pagination !== false): ?>
                <div class="pxl-swiper-dots style-1"></div>
            <?php endif; ?>

            <?php if ($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap style-1">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none">
                            <path d="M0.292788 8.71929L7.29286 15.7193C7.48146 15.9014 7.73407 16.0022 7.99626 16C8.25846 15.9977 8.50928 15.8925 8.69469 15.7071C8.8801 15.5217 8.98527 15.2709 8.98755 15.0087C8.98983 14.7465 8.88903 14.4939 8.70687 14.3053L3.41382 9.01229L21 9.01229C21.2652 9.01229 21.5196 8.90693 21.7071 8.7194C21.8946 8.53186 22 8.27751 22 8.01229C22 7.74707 21.8946 7.49272 21.7071 7.30518C21.5196 7.11765 21.2652 7.01229 21 7.01229L3.41382 7.01229L8.70687 1.71929C8.80238 1.62704 8.87857 1.5167 8.93098 1.39469C8.98338 1.27269 9.01097 1.14147 9.01213 1.00869C9.01328 0.875911 8.98798 0.744232 8.93769 0.621336C8.88741 0.49844 8.81316 0.386787 8.71927 0.292894C8.62537 0.199001 8.51372 0.124747 8.39082 0.0744665C8.26792 0.0241859 8.13624 -0.0011151 8.00346 3.7877e-05C7.87068 0.00119181 7.73946 0.0287787 7.61746 0.0811879C7.49545 0.133597 7.38511 0.209778 7.29286 0.305288L0.292788 7.30529C0.105315 7.49282 -1.18586e-06 7.74712 -1.20904e-06 8.01229C-1.23222e-06 8.27745 0.105315 8.53176 0.292788 8.71929Z" fill="white" />
                        </svg></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none">
                            <path d="M21.7072 8.71929L14.7071 15.7193C14.5185 15.9014 14.2659 16.0022 14.0037 16C13.7415 15.9977 13.4907 15.8925 13.3053 15.7071C13.1199 15.5217 13.0147 15.2709 13.0125 15.0087C13.0102 14.7465 13.111 14.4939 13.2931 14.3053L18.5862 9.01229L1.00001 9.01229C0.73479 9.01229 0.480434 8.90693 0.292895 8.7194C0.105357 8.53186 -6.75122e-07 8.27751 -6.98308e-07 8.01229C-7.21494e-07 7.74707 0.105357 7.49272 0.292895 7.30518C0.480433 7.11765 0.73479 7.01229 1.00001 7.01229L18.5862 7.01229L13.2931 1.71929C13.1976 1.62704 13.1214 1.5167 13.069 1.39469C13.0166 1.27269 12.989 1.14147 12.9879 1.00869C12.9867 0.875911 13.012 0.744232 13.0623 0.621336C13.1126 0.49844 13.1868 0.386787 13.2807 0.292894C13.3746 0.199001 13.4863 0.124747 13.6092 0.0744665C13.7321 0.0241859 13.8638 -0.0011151 13.9965 3.7877e-05C14.1293 0.00119181 14.2605 0.0287787 14.3825 0.0811879C14.5045 0.133597 14.6149 0.209778 14.7071 0.305288L21.7072 7.30529C21.8947 7.49282 22 7.74712 22 8.01229C22 8.27745 21.8947 8.53176 21.7072 8.71929Z" fill="white" />
                        </svg></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>