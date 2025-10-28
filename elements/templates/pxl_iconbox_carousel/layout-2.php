<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if ($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll');
$arrows = $widget->get_setting('arrows', false);
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$effect = $widget->get_setting('effect', 'slide');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', '500');
$drap = $widget->get_setting('drap', false);
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1,
    'slide_mode'                    => $effect,
    'slides_to_show'                => (int)$col_xl,
    'slides_to_show_xxl'            => (int)$col_xxl,
    'slides_to_show_lg'             => (int)$col_lg,
    'slides_to_show_md'             => (int)$col_md,
    'slides_to_show_sm'             => (int)$col_sm,
    'slides_to_show_xs'             => (int)$col_xs,
    'slides_to_scroll'              => (int)$slides_to_scroll,
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed
];
$widget->add_render_attribute('carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
$pxl_g_id = uniqid();

if (isset($settings['iconbox_list']) && !empty($settings['iconbox_list']) && count($settings['iconbox_list'])): ?>
    <div id="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>" class="pxl-swiper-slider pxl-iconbox-carousel pxl-iconbox-carousel2 <?php echo esc_attr($settings['pxl_animate']); ?>" <?php if ($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?> data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-carousel-inner">

            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['iconbox_list'] as $key => $item):
                        $title = isset($item['title']) ? $item['title'] : '';
                        $desc = isset($item['desc']) ? $item['desc'] : '';
                        $item_link = isset($item['item_link']) ? $item['item_link'] : '';
                        $icon_type = isset($item['icon_type']) ? $item['icon_type'] : 'icon';
                        $pxl_icon = isset($item['pxl_icon']) ? $item['pxl_icon'] : '';
                        $icon_image = isset($item['icon_image']) ? $item['icon_image'] : '';
                    ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner">
                                <div class="pxl-item--header">
                                    <?php if ($icon_type == 'icon' && !empty($pxl_icon['value'])) : ?>
                                        <div class="pxl-item--icon pxl-flex-center">
                                            <?php if (! empty($item_link['url'])) {
                                                $item_link_key = $widget->get_repeater_setting_key('item_link', 'iconbox_list', $key);
                                                $widget->add_render_attribute($item_link_key, 'href', $item_link['url']);

                                                if ($item_link['is_external']) {
                                                    $widget->add_render_attribute($item_link_key, 'target', '_blank');
                                                }

                                                if ($item_link['nofollow']) {
                                                    $widget->add_render_attribute($item_link_key, 'rel', 'nofollow');
                                                } ?>
                                                <a <?php pxl_print_html($widget->get_render_attribute_string($item_link_key)); ?>>
                                                <?php } ?>
                                                <?php \Elementor\Icons_Manager::render_icon($pxl_icon, ['aria-hidden' => 'true', 'class' => ''], 'i'); ?>
                                                <?php if (! empty($item_link['url'])) { ?>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($icon_type == 'image' && !empty($icon_image['id'])) : ?>
                                        <div class="pxl-item--icon pxl-flex-center pxl-mr-25">
                                            <?php $img_icon  = pxl_get_image_by_size(array(
                                                'attach_id'  => $icon_image['id'],
                                                'thumb_size' => 'full',
                                            ));
                                            $thumbnail_icon    = $img_icon['thumbnail'];
                                            echo pxl_print_html($thumbnail_icon); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (! empty($title)) : ?>
                                        <h5 class="pxl-item--title"><?php echo pxl_print_html($title); ?></h5>
                                    <?php endif; ?>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="335" height="23" viewBox="0 0 335 23" fill="none" class="pxl-item--divider">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M112.838 2.33835e-06V2.44392C112.838 3.94449 112.663 5.42594 111.923 6.63894C110.327 9.25397 107.745 10.3927 104.023 10.8668C102.628 11.0445 101.086 11.1264 99.3922 11.1605C99.3886 11.1604 99.3851 11.1606 99.3815 11.1605C99.302 11.159 99.2221 11.1593 99.1419 11.1579C97.4427 11.1287 95.6013 11.1439 93.6202 11.1614C92.3281 11.15 90.9709 11.1389 89.5476 11.1389H0V11.8611H89.5476C90.9709 11.8611 92.3281 11.85 93.6202 11.8386C95.6989 11.8569 97.6239 11.8732 99.3922 11.8378C99.8154 11.8463 100.229 11.8578 100.634 11.8732C101.847 11.9194 102.977 11.9999 104.023 12.1332C107.745 12.6073 110.327 13.746 111.923 16.3611C112.663 17.5741 112.838 19.0555 112.838 20.5561V23C113.175 23 113.513 23 113.513 23V20.5561C113.514 19.0555 113.689 17.5741 114.429 16.3611C116.024 13.746 118.607 12.6073 122.328 12.1332C122.502 12.111 122.679 12.0904 122.858 12.071C124.112 11.9355 125.478 11.8676 126.96 11.8378C128.728 11.8732 130.653 11.8569 132.731 11.8386C134.023 11.85 135.381 11.8611 136.804 11.8611H335V11.1389H136.804C135.381 11.1389 134.023 11.15 132.731 11.1614C130.75 11.1439 128.909 11.1287 127.209 11.1579C127.13 11.1593 127.05 11.159 126.971 11.1605C126.967 11.1606 126.964 11.1604 126.96 11.1605C125.478 11.1307 124.112 11.0644 122.858 10.929C122.679 10.9096 122.502 10.889 122.328 10.8668C118.607 10.3927 116.024 9.25397 114.429 6.63894C113.689 5.42594 113.514 3.94449 113.513 2.44392V2.33835e-06C113.513 2.33835e-06 113.175 -2.92294e-06 112.838 2.33835e-06ZM113.176 5.39754C113.329 5.95197 113.546 6.48971 113.853 6.99226C114.746 8.4562 115.921 9.48285 117.363 10.2024C117.815 10.4276 118.292 10.6236 118.796 10.7925C119.756 11.1145 120.81 11.341 121.957 11.5C120.664 11.6792 119.489 11.9453 118.433 12.3362C118.19 12.4261 117.954 12.5228 117.724 12.6265C116.115 13.3514 114.82 14.4236 113.853 16.0077C113.546 16.5101 113.329 17.0474 113.176 17.6016C113.023 17.0474 112.805 16.5101 112.498 16.0077C112.178 15.4835 111.823 15.0152 111.431 14.597C111.301 14.4576 111.166 14.3238 111.028 14.1953C110.821 14.0027 110.605 13.8221 110.38 13.6528C110.23 13.5399 110.076 13.432 109.918 13.3288C109.682 13.1741 109.437 13.0299 109.183 12.896C109.002 12.8008 108.817 12.7118 108.627 12.6265C108.398 12.523 108.162 12.4261 107.919 12.3362C106.863 11.9452 105.688 11.6793 104.395 11.5C105.541 11.341 106.596 11.1145 107.556 10.7925C108.42 10.5026 109.208 10.1353 109.918 9.67116C110.076 9.56804 110.23 9.46014 110.38 9.34721C110.605 9.17791 110.821 8.99725 111.028 8.80469C111.166 8.6762 111.301 8.54239 111.431 8.40298C111.823 7.9848 112.178 7.51652 112.498 6.99226C112.805 6.48971 113.023 5.95197 113.176 5.39754Z" fill="currentColor"/>
                                </svg>
                                <?php if (! empty($desc)) : ?>
                                    <div class="pxl-item--description el-empty"><?php echo pxl_print_html($desc); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <?php if ($pagination !== false || $arrows !== false): ?>
            <div class="pxl-swiper-bottom pxl-flex-middle">
                <?php if ($arrows !== false): ?>
                    <div class="pxl-swiper-arrow-wrap style-4">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                            <i class="bi-arrow-left-short"></i>
                        </div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                            <i class="bi-arrow-right-short"></i>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
<?php endif; ?>