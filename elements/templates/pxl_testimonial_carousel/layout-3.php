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
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel3<?php echo isset($settings['style']) ? ' ' . esc_attr($settings['style']) : ''; ?>" <?php if ($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?> style="max-width: <?php echo isset($settings['max_width_box']['size']) ? esc_attr($settings['max_width_box']['size']) : ''; ?>px;">
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
                                <div class="pxl-item--desc"><?php echo pxl_print_html($desc); ?></div>
                                <div class="pxl-item--meta">
                                    <div class="pxl-item--qoute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="44" height="31" viewBox="0 0 44 31" fill="none">
                                            <path d="M34.1074 31C39.5719 31 44 26.5261 44 21.005C44 15.7696 40.043 11.5812 35.0496 11.1053C36.0859 9.20149 37.876 7.20251 41.0793 5.2987C41.9273 4.82275 42.4926 3.87086 42.4926 2.82377C42.4926 0.82478 40.4198 -0.603071 38.6297 0.253637C33.2595 2.72858 24.309 8.63035 24.309 21.005C24.309 26.6213 28.6429 31 34.1074 31Z" fill="currentColor "/>
                                            <path d="M9.79986 31C15.2643 31 19.6925 26.5261 19.6925 21.005C19.6925 15.7696 15.7354 11.5812 10.742 11.1053C11.7784 9.20149 13.5685 7.20251 16.7718 5.2987C17.6197 4.82275 18.185 3.87086 18.185 2.82377C18.185 0.82478 16.1123 -0.603071 14.3222 0.253637C8.95192 2.72858 0.00147629 8.63035 0.00147629 21.005C-0.0927429 26.6213 4.33538 31 9.79986 31Z" fill="currentColor "/>
                                        </svg>
                                    </div>
                                    <div class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></div>
                                    <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                    <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path d="M15.5613 6.81642L12.2138 9.97746L13.0043 14.4421C13.0387 14.6373 12.956 14.8346 12.7904 14.9512C12.6969 15.0173 12.5857 15.0506 12.4745 15.0506C12.389 15.0506 12.303 15.0308 12.2246 14.9908L8.08541 12.8829L3.9468 14.9902C3.76623 15.0829 3.54642 15.0678 3.3809 14.9507C3.21538 14.8341 3.13262 14.6368 3.16701 14.4415L3.95754 9.97694L0.609468 6.81642C0.463291 6.67795 0.410088 6.47075 0.473502 6.28282C0.536917 6.09488 0.705127 5.95692 0.907731 5.92829L5.53431 5.27755L7.60335 1.21589C7.78446 0.860328 8.38636 0.860328 8.56747 1.21589L10.6365 5.27755L15.2631 5.92829C15.4657 5.95692 15.6339 6.09436 15.6973 6.28282C15.7607 6.47127 15.7075 6.67742 15.5613 6.81642Z" fill="currentColor" />
                                            </svg>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>