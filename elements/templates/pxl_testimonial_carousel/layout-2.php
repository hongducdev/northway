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
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel2<?php echo isset($settings['style']) ? ' ' . esc_attr($settings['style']) : ''; ?>" <?php if ($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?> style="max-width: <?php echo isset($settings['max_width_box']['size']) ? esc_attr($settings['max_width_box']['size']) : ''; ?>px;">
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
                                <div class="pxl-item--holder pxl-flex-middle">
                                    <div class="pxl-item--header">
                                        <?php if (!empty($avatar['id'])) {
                                            $img = pxl_get_image_by_size(array(
                                                'attach_id'  => $avatar['id'],
                                                'thumb_size' => '100x100',
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail = $img['thumbnail']; ?>
                                            <div class="pxl-item--avatar ">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="pxl-item--meta">
                                            <h3 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h3>
                                            <h5 class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></h5>
                                            <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                        <path d="M15.5613 6.81642L12.2138 9.97746L13.0043 14.4421C13.0387 14.6373 12.956 14.8346 12.7904 14.9512C12.6969 15.0173 12.5857 15.0506 12.4745 15.0506C12.389 15.0506 12.303 15.0308 12.2246 14.9908L8.08541 12.8829L3.9468 14.9902C3.76623 15.0829 3.54642 15.0678 3.3809 14.9507C3.21538 14.8341 3.13262 14.6368 3.16701 14.4415L3.95754 9.97694L0.609468 6.81642C0.463291 6.67795 0.410088 6.47075 0.473502 6.28282C0.536917 6.09488 0.705127 5.95692 0.907731 5.92829L5.53431 5.27755L7.60335 1.21589C7.78446 0.860328 8.38636 0.860328 8.56747 1.21589L10.6365 5.27755L15.2631 5.92829C15.4657 5.95692 15.6339 6.09436 15.6973 6.28282C15.7607 6.47127 15.7075 6.67742 15.5613 6.81642Z" fill="currentColor" />
                                                    </svg>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pxl-item--qoute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="23" viewBox="0 0 34 23" fill="none">
                                            <path d="M7.64428 0C3.42173 0 0 3.31937 0 7.41561C0 11.3 3.05771 14.4075 6.91626 14.7606C6.11543 16.1731 4.73218 17.6562 2.25688 19.0687C1.60166 19.4218 1.16484 20.1281 1.16484 20.9049C1.16484 22.3881 2.7665 23.4474 4.14975 22.8118C8.29951 20.9756 15.2158 16.5968 15.2158 7.41561C15.2158 3.24874 11.8668 0 7.64428 0Z" fill="currentColor" />
                                            <path d="M26.4274 0C22.2048 0 18.7831 3.31937 18.7831 7.41561C18.7831 11.3 21.8408 14.4075 25.6994 14.7606C24.8985 16.1731 23.5153 17.6562 21.04 19.0687C20.3848 19.4218 19.9479 20.1281 19.9479 20.9049C19.9479 22.3881 21.5496 23.4474 22.9329 22.8118C27.0826 20.9756 33.9989 16.5968 33.9989 7.41561C34.0717 3.24874 30.6499 0 26.4274 0Z" fill="currentColor" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="pxl-item--desc"><?php echo pxl_print_html($desc); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="pxl-testimonial-avatars">
            <div class="pxl-avatar-container">
                <div class="pxl-avatar-wrapper">
                    <?php 
                    $total_avatars = count($settings['testimonial']);
                    for ($i = 0; $i < $total_avatars; $i++): 
                        $testimonial = $settings['testimonial'][$i];
                        $avatar = isset($testimonial['avatar']) ? $testimonial['avatar'] : '';
                        $title = isset($testimonial['title']) ? $testimonial['title'] : '';
                        $active_class = $i === 0 ? 'active' : '';
                    ?>
                        <div class="pxl-avatar-item <?php echo esc_attr($active_class); ?>" data-slide-index="<?php echo esc_attr($i); ?>">
                            <?php if (!empty($avatar['id'])) {
                                $img = pxl_get_image_by_size(array(
                                    'attach_id'  => $avatar['id'],
                                    'thumb_size' => '60x60',
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail']; ?>
                                <div class="pxl-avatar-img">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <div class="pxl-item--polygon">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="64" viewBox="0 0 70 64" fill="none">
                <path d="M65.4195 63.1788L1.82674 26.7351C-0.437833 25.4374 -0.0796068 22.0668 2.40715 21.274L65.9999 0.999854C67.935 0.382899 69.9111 1.82699 69.9111 3.85813V60.576C69.9111 62.8811 67.4195 64.325 65.4195 63.1788Z" fill="currentColor"/>
            </svg>
        </div>

        <div class="pxl-item--blur">
            <svg xmlns="http://www.w3.org/2000/svg" width="740" height="533" viewBox="0 0 740 533" fill="none">
                <g opacity="0.4" filter="url(#filter0_f_586_123)">
                    <path d="M443.657 112.407C491.905 111.84 631.54 216.238 541.638 338.657C472.245 433.149 357.322 418.537 308.273 408.181C185.852 382.332 167.021 286.345 168.623 255.273C177.057 91.7081 375.747 90.3389 443.657 112.407Z" fill="#EAF0DA"/>
                </g>
                <defs>
                    <filter id="filter0_f_586_123" x="-31.467" y="-97.6172" width="802.622" height="713.382" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                    <feGaussianBlur stdDeviation="100" result="effect1_foregroundBlur_586_123"/>
                    </filter>
                </defs>
            </svg>
        </div>
    </div>
<?php endif; ?>