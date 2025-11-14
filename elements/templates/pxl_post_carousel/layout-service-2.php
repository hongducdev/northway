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
    <div class="pxl-swiper-slider pxl-service-carousel pxl-service-carousel2 pxl-service-style1 <?php echo esc_attr($style_l11); ?>" <?php if ($drap !== false): ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?>>
        <div class="pxl-carousel-inner ">
            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $image_size = !empty($img_size) ? $img_size : '820x1090';
                    foreach ($posts as $post):
                        $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
                        $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                        $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                        $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                        $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                    ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                                <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                                    $img_id = get_post_thumbnail_id($post->ID);
                                    $img          = pxl_get_image_by_size(array(
                                        'attach_id'  => $img_id,
                                        'thumb_size' => $image_size
                                    ));
                                    $thumbnail    = $img['thumbnail'];
                                ?>
                                    <div class="pxl-post--featured">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="pxl-post--body">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="52" height="52" viewBox="0 0 52 52" fill="none" class="pxl-post--fold">
                                        <path d="M0.808594 0.538086C0.995431 0.460695 1.21052 0.503485 1.35352 0.646484L51.3535 50.6465C51.4965 50.7895 51.5393 51.0046 51.4619 51.1914C51.3845 51.3782 51.2022 51.5 51 51.5H11C5.20101 51.5 0.5 46.799 0.5 41V1C0.5 0.797792 0.621793 0.615492 0.808594 0.538086Z" fill="#F8F8F2" stroke="#AFB4B5" stroke-linejoin="round"/>
                                    </svg>
                                    <div class="pxl-post--body-inner">
                                        <div class="pxl-post--body-header">
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
                                            <h4 class="pxl-post--title">
                                                <a href="<?php if (!empty($service_external_link)) {
                                                    echo esc_url($service_external_link);
                                                } else {
                                                    echo esc_url(get_permalink($post->ID));
                                                } ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?></a>
                                            </h4>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="300" height="23" viewBox="0 0 300 23" fill="none" class="pxl-post--divider">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M54.8379 2.44434C54.8378 3.94468 54.6627 5.42583 53.9229 6.63867C52.3271 9.25371 49.7445 10.3931 46.0234 10.8672C44.6281 11.0449 43.0863 11.1261 41.3926 11.1602C41.3891 11.1601 41.3853 11.1602 41.3818 11.1602C41.3023 11.1587 41.2218 11.1596 41.1416 11.1582C39.4425 11.129 37.6011 11.1437 35.6201 11.1611C34.3281 11.1498 32.971 11.1387 31.5479 11.1387H0V11.8613H31.5479C32.971 11.8613 34.3281 11.8502 35.6201 11.8389C37.6989 11.8572 39.6244 11.8734 41.3926 11.8379C41.8157 11.8464 42.2296 11.8577 42.6338 11.873C43.8476 11.9193 44.9767 11.9995 46.0234 12.1328C49.7445 12.6069 52.3271 13.7463 53.9229 16.3613C54.6627 17.5742 54.8378 19.0553 54.8379 20.5557V23C55.1753 23 55.5137 23 55.5137 23V20.5557C55.5137 19.0553 55.6888 17.5742 56.4287 16.3613C58.0245 13.7463 60.6071 12.6069 64.3281 12.1328C64.5026 12.1106 64.6794 12.0907 64.8584 12.0713C66.1117 11.9357 67.4776 11.8677 68.96 11.8379C70.7279 11.8733 72.6531 11.8572 74.7314 11.8389C76.0234 11.8502 77.3806 11.8613 78.8037 11.8613L300 12V11.1387H78.8037C77.3806 11.1387 76.0234 11.1498 74.7314 11.1611C72.7505 11.1437 70.909 11.129 69.21 11.1582C69.1301 11.1596 69.0499 11.1587 68.9707 11.1602C68.9672 11.1602 68.9635 11.1601 68.96 11.1602C67.4776 11.1304 66.1117 11.0641 64.8584 10.9287C64.6794 10.9094 64.5026 10.8894 64.3281 10.8672C60.6071 10.3931 58.0245 9.25371 56.4287 6.63867C55.6888 5.42581 55.5137 3.94471 55.5137 2.44434V2.33835e-06C55.5137 2.33835e-06 55.1752 -2.92294e-06 54.8379 2.33835e-06V2.44434ZM55.1758 5.39746C55.3289 5.9518 55.546 6.48971 55.8525 6.99219C56.7459 8.45611 57.9209 9.48255 59.3633 10.2022C59.8147 10.4273 60.2923 10.6241 60.7959 10.793C61.756 11.1149 62.8111 11.3411 63.957 11.5C62.6647 11.6792 61.4882 11.945 60.4326 12.3359C60.1899 12.4258 59.9536 12.5233 59.7236 12.627C58.1153 13.3519 56.8192 14.4238 55.8525 16.0078C55.5461 16.5101 55.3289 17.0475 55.1758 17.6016C55.0226 17.0474 54.8046 16.5102 54.498 16.0078C54.1781 15.4836 53.823 15.0148 53.4316 14.5967C53.3012 14.4573 53.1666 14.3238 53.0283 14.1953C52.821 14.0027 52.6047 13.8216 52.3799 13.6523C52.23 13.5395 52.0756 13.4322 51.918 13.3291C51.6815 13.1745 51.4364 13.0303 51.1826 12.8965C51.0022 12.8014 50.817 12.7122 50.6279 12.627C50.3981 12.5234 50.1615 12.4258 49.9189 12.3359C48.8633 11.9449 47.687 11.6793 46.3945 11.5C47.5406 11.341 48.5955 11.1149 49.5557 10.793C50.4201 10.5031 51.2081 10.135 51.918 9.6709C52.0756 9.56783 52.23 9.46053 52.3799 9.34766C52.6047 9.17836 52.821 8.99726 53.0283 8.80469C53.1666 8.67624 53.3012 8.54267 53.4316 8.40332C53.823 7.98518 54.1781 7.51638 54.498 6.99219C54.8047 6.48964 55.0226 5.95189 55.1758 5.39746Z" fill="#666F78" fill-opacity="0.5" />
                                        </svg>
                                        <?php if ($show_excerpt == 'true'): ?>
                                            <div class="pxl-post--content">
                                                <?php if ($show_excerpt == 'true'): ?>
                                                    <?php echo wp_trim_words($post->post_excerpt,  $num_words, null); ?>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($show_button == 'true') : ?>
                                            <a class="btn pxl-button-style-2-default btn-default inline pxl-icon--right pxl-post--readmore" href="<?php if (!empty($service_external_link)) {
                                                echo esc_url($service_external_link);
                                            } else {
                                                echo esc_url(get_permalink($post->ID));
                                            } ?>">
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
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if ($pagination !== false): ?>
                <div class="pxl-swiper-dots style-1"></div>
            <?php endif; ?>

            <?php if ($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap style-5">
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