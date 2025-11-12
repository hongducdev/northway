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
                    foreach ($posts as $post):
                        $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
                        $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                        $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                        $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                        $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                    ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                                <div class="pxl-post--icon-wrap">
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
                                </div>
                                <div class="pxl-post--body">
                                    <h4 class="pxl-post--title">
                                        <a href="<?php if (!empty($service_external_link)) {
                                            echo esc_url($service_external_link);
                                        } else {
                                            echo esc_url(get_permalink($post->ID));
                                        } ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                                    </h4>
                                    <div class="pxl-post--divider">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="545" height="16" viewBox="0 0 545 16" fill="none" class="pxl-post--divider-svg-1">
                                            <path d="M0 15.0291H10.1714C11.9672 15.0291 13.6797 15.0441 15.3101 15.0594C17.933 15.0347 20.3619 15.0127 22.593 15.0605C23.1271 15.049 23.6492 15.0335 24.1594 15.0127C25.6911 14.9504 27.1159 14.8418 28.4368 14.6619C33.1319 14.0223 36.3905 12.4858 38.404 8.95752C39.3376 7.32097 39.5586 5.3219 39.5587 3.29744V2.86102e-06C39.9822 -3.8147e-06 40.4066 2.86102e-06 40.411 2.86102e-06V3.29744C40.4111 5.32189 40.6321 7.32098 41.5657 8.95752C43.5793 12.4858 46.8379 14.0223 51.5329 14.6619C51.7531 14.6919 51.9763 14.7197 52.2023 14.7458C53.7838 14.9287 55.5073 15.0203 57.3778 15.0605C59.6086 15.0127 62.0372 15.0347 64.6597 15.0594C66.29 15.0441 68.0025 15.0291 69.7983 15.0291H545V15.9942L67.1665 15.9942C66.3103 15.9885 65.4747 15.9808 64.6597 15.9732C62.16 15.9967 59.8364 16.0172 57.6924 15.9778C57.5917 15.976 57.4912 15.9763 57.3912 15.9743C53.6253 15.8958 50.1956 15.8046 46.6185 14.388C46.3122 14.2667 46.0139 14.1362 45.7238 13.9963C43.6942 13.0182 42.0593 11.5716 40.8394 9.43425C40.4528 8.75656 40.1781 8.03135 39.9849 7.28374C39.7917 8.03136 39.5169 8.75655 39.1303 9.43425C38.7267 10.1415 38.2774 10.7735 37.7837 11.3376C37.6192 11.5256 37.4494 11.7064 37.2749 11.8796C37.0135 12.1394 36.7408 12.3833 36.4572 12.6116C36.268 12.7639 36.0737 12.9096 35.8748 13.0487C35.5764 13.2574 35.2669 13.4521 34.9466 13.6327C34.7188 13.7611 34.4847 13.8813 34.246 13.9963C33.9561 14.136 33.6582 14.2668 33.3523 14.388C29.7528 15.8137 26.0762 15.9079 22.2773 15.9778C20.1333 16.0172 17.8098 15.9967 15.3101 15.9732C14.4951 15.9808 13.6595 15.9885 12.8032 15.9942H0V15.0291Z" fill="url(#paint0_linear_1752_1373)" fill-opacity="0.5"/>
                                            <defs>
                                                <linearGradient id="paint0_linear_1752_1373" x1="328" y1="8" x2="545" y2="8" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#666F78"/>
                                                <stop offset="1" stop-color="#041427"/>
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="545" height="16" viewBox="0 0 545 16" fill="none" class="pxl-post--divider-svg-2">
                                            <path d="M0 15.0291H10.1714C11.9672 15.0291 13.6797 15.0441 15.3101 15.0594C17.933 15.0347 20.3619 15.0127 22.593 15.0605C23.1271 15.049 23.6492 15.0335 24.1594 15.0127C25.6911 14.9504 27.1159 14.8418 28.4368 14.6619C33.1319 14.0223 36.3905 12.4858 38.404 8.95752C39.3376 7.32097 39.5586 5.3219 39.5587 3.29744V2.86102e-06C39.9822 -3.8147e-06 40.4066 2.86102e-06 40.411 2.86102e-06V3.29744C40.4111 5.32189 40.6321 7.32098 41.5657 8.95752C43.5793 12.4858 46.8379 14.0223 51.5329 14.6619C51.7531 14.6919 51.9763 14.7197 52.2023 14.7458C53.7838 14.9287 55.5073 15.0203 57.3778 15.0605C59.6086 15.0127 62.0372 15.0347 64.6597 15.0594C66.29 15.0441 68.0025 15.0291 69.7983 15.0291H545V15.9942L67.1665 15.9942C66.3103 15.9885 65.4747 15.9808 64.6597 15.9732C62.16 15.9967 59.8364 16.0172 57.6924 15.9778C57.5917 15.976 57.4912 15.9763 57.3912 15.9743C53.6253 15.8958 50.1956 15.8046 46.6185 14.388C46.3122 14.2667 46.0139 14.1362 45.7238 13.9963C43.6942 13.0182 42.0593 11.5716 40.8394 9.43425C40.4528 8.75656 40.1781 8.03135 39.9849 7.28374C39.7917 8.03136 39.5169 8.75655 39.1303 9.43425C38.7267 10.1415 38.2774 10.7735 37.7837 11.3376C37.6192 11.5256 37.4494 11.7064 37.2749 11.8796C37.0135 12.1394 36.7408 12.3833 36.4572 12.6116C36.268 12.7639 36.0737 12.9096 35.8748 13.0487C35.5764 13.2574 35.2669 13.4521 34.9466 13.6327C34.7188 13.7611 34.4847 13.8813 34.246 13.9963C33.9561 14.136 33.6582 14.2668 33.3523 14.388C29.7528 15.8137 26.0762 15.9079 22.2773 15.9778C20.1333 16.0172 17.8098 15.9967 15.3101 15.9732C14.4951 15.9808 13.6595 15.9885 12.8032 15.9942H0V15.0291Z" fill="url(#paint0_linear_1752_1348)" fill-opacity="0.5"/>
                                            <defs>
                                                <linearGradient id="paint0_linear_1752_1348" x1="328" y1="8" x2="545" y2="8" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#666F78" stop-opacity="0.5"/>
                                                <stop offset="1" stop-color="#F8F8F2" stop-opacity="0"/>
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                    <?php if ($show_excerpt == 'true'): ?>
                                        <div class="pxl-post--content">
                                            <?php if ($show_excerpt == 'true'): ?>
                                                <?php echo wp_trim_words($post->post_excerpt,  $num_words, null); ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($show_button == 'true') : ?>
                                        <a href="<?php if (!empty($service_external_link)) {
                                                echo esc_url($service_external_link);
                                            } else {
                                                echo esc_url(get_permalink($post->ID));
                                            } ?>" class="pxl-post--readmore">
                                            <span class="pxl-post--readmore-text">
                                                <?php if (!empty($button_text)) : ?>
                                                    <?php echo pxl_print_html($button_text); ?>
                                                <?php else : ?>
                                                    <?php echo esc_html__('Explore Now', 'northway'); ?>
                                                <?php endif; ?>
                                            </span>
                                            <div class="pxl-post--readmore-icon">
                                                <i class="bi-arrow-right-short"></i>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                </div>
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
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                        <i class="bi-arrow-left-short"></i>
                    </div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                        <i class="bi-arrow-right-short"></i>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>