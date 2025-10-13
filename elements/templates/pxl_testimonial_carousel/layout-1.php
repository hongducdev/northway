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
$arrows_type = $widget->get_setting('arrows_type', '');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', '500');
$drap = $widget->get_setting('drap', false);
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1,
    'slide_mode'                    => 'slide',
    'center_slide'                  => false,
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
if (isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel1" <?php if ($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $avatar = isset($value['avatar']) ? $value['avatar'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $star = isset($value['star']) ? $value['star'] : '';
                    ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if (!empty($avatar['id'])) {
                                    $img = pxl_get_image_by_size(array(
                                        'attach_id'  => $avatar['id'],
                                        'thumb_size' => '500x500',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail']; ?>
                                    <div class="pxl-item--avatar ">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php } ?>
                                <div class="pxl-item--header">
                                    <div class="pxl-item--meta">
                                        <h3 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h3>
                                        <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                    </div>
                                    <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M15.5613 6.81642L12.2138 9.97746L13.0043 14.4421C13.0387 14.6373 12.956 14.8346 12.7904 14.9512C12.6969 15.0173 12.5857 15.0506 12.4745 15.0506C12.389 15.0506 12.303 15.0308 12.2246 14.9908L8.08541 12.8829L3.9468 14.9902C3.76623 15.0829 3.54642 15.0678 3.3809 14.9507C3.21538 14.8341 3.13262 14.6368 3.16701 14.4415L3.95754 9.97694L0.609468 6.81642C0.463291 6.67795 0.410088 6.47075 0.473502 6.28282C0.536917 6.09488 0.705127 5.95692 0.907731 5.92829L5.53431 5.27755L7.60335 1.21589C7.78446 0.860328 8.38636 0.860328 8.56747 1.21589L10.6365 5.27755L15.2631 5.92829C15.4657 5.95692 15.6339 6.09436 15.6973 6.28282C15.7607 6.47127 15.7075 6.67742 15.5613 6.81642Z" fill="currentColor" />
                                            </svg>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                <div class="pxl-item--desc"><?php echo pxl_print_html($desc); ?></div>
                                <div class="pxl-item--qoute">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="109" height="77" viewBox="0 0 109 77" fill="none">
                                        <path d="M41.6057 14.1842C28.1956 16.886 18.5678 25.6667 18.5678 36.4737C20.9748 35.1228 24.0694 34.1096 28.1956 34.1096C38.8549 34.1096 47.4511 41.5395 47.4511 54.7105C47.4511 67.5439 38.511 77 24.7571 77C11.0032 77 2.13816e-06 65.8552 0 47.6184C0 22.9649 17.5363 3.37719 41.6057 0V14.1842Z" fill="url(#paint0_linear_283_58)" />
                                        <path d="M103.155 14.1842C89.7445 16.886 80.1167 25.6667 80.1167 36.136C82.5237 34.7851 85.6183 34.1096 89.4006 34.1096C100.06 34.1096 109 41.5395 109 54.7105C109 67.5439 99.7161 77 86.306 77C72.2082 77 61.2051 65.8552 61.205 47.6184C61.205 22.9649 79.0852 3.37719 103.155 0V14.1842Z" fill="url(#paint1_linear_283_58)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_283_58" x1="54.5" y1="54.9043" x2="54.5" y2="6.36087" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="currentColor" />
                                                <stop offset="1" stop-color="white" />
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_283_58" x1="54.5" y1="54.9043" x2="54.5" y2="6.36087" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="currentColor" />
                                                <stop offset="1" stop-color="white" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php if ($pagination !== false || $arrows !== false): ?>
        <div class="pxl-swiper-bottom ">
            <?php if ($pagination !== false): ?>
                <div class="pxl-swiper-dots style-1"></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    </div>
<?php endif; ?>