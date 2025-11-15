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
$center = $widget->get_setting('center', false);
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
    'speed'                         => (int)$speed,
    'center'                        => (bool)$center,
];
$widget->add_render_attribute('carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if (isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel2" <?php if ($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?>>
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
                                <div class="pxl-item--header">
                                    <?php if (!empty($avatar['id'])) {
                                        $img = pxl_get_image_by_size(array(
                                            'attach_id'  => $avatar['id'],
                                            'thumb_size' => '446x638',
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail = $img['thumbnail']; ?>
                                        <div class="pxl-item--avatar ">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="pxl-item--qoute">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="24" viewBox="0 0 35 24" fill="none">
                                            <path d="M7.9727 0C12.2572 0 15.6096 3.15468 15.9444 7.50098C16.5155 14.9041 12.569 20.9461 9.01568 23.8701C8.90978 23.9568 8.77816 24 8.64654 24C8.51116 24 8.37647 23.9539 8.26958 23.8623C7.9542 23.5915 7.7379 23.384 7.26567 22.9297C6.90477 22.5821 6.38902 22.0849 5.55472 21.2959C5.36327 21.1148 5.33514 20.8293 5.48929 20.6182C7.52828 17.8189 7.58319 15.8067 7.51079 15.0674C3.32892 14.8401 0.000201802 11.5507 0 7.54004C0 3.38243 3.57628 6.43138e-05 7.9727 0Z" fill="currentColor"/>
                                            <path d="M26.9728 0C31.2573 0 34.6098 3.15468 34.9445 7.50098C35.5156 14.9041 31.5691 20.9461 28.0158 23.8701C27.9099 23.9568 27.7783 24 27.6466 24C27.5113 24 27.3766 23.9539 27.2697 23.8623C26.9543 23.5915 26.738 23.384 26.2658 22.9297C25.9049 22.5821 25.3891 22.0849 24.5548 21.2959C24.3634 21.1148 24.3353 20.8293 24.4894 20.6182C26.5284 17.8189 26.5833 15.8067 26.5109 15.0674C22.329 14.8401 19.0003 11.5507 19.0001 7.54004C19.0001 3.38243 22.5764 6.43138e-05 26.9728 0Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="pxl-item--body">
                                    <div class="pxl-item--meta">
                                        <h6 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h6>
                                        <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                    </div>
                                    <div class="pxl-item--body-meta">
                                        <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                    <path d="M7.55163 0.908492C7.73504 0.536869 8.26496 0.53687 8.44837 0.908493L10.2348 4.52821C10.3076 4.67578 10.4484 4.77807 10.6113 4.80173L14.6059 5.38218C15.016 5.44177 15.1797 5.94576 14.883 6.23503L11.9925 9.05258C11.8746 9.16745 11.8208 9.33295 11.8487 9.49515L12.531 13.4736C12.6011 13.8821 12.1724 14.1935 11.8055 14.0007L8.23267 12.1223C8.08701 12.0457 7.91299 12.0457 7.76733 12.1223L4.19445 14.0007C3.82764 14.1935 3.39893 13.8821 3.46898 13.4736L4.15134 9.49515C4.17916 9.33295 4.12538 9.16745 4.00754 9.05258L1.11702 6.23503C0.820264 5.94576 0.98402 5.44177 1.39413 5.38218L5.38873 4.80173C5.55158 4.77807 5.69236 4.67578 5.7652 4.52821L7.55163 0.908492Z" fill="currentColor"/>
                                                </svg>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                    <div class="pxl-item--desc"><?php echo pxl_print_html($desc); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php if ($pagination !== false): ?>
        <div class="pxl-swiper-bottom ">
            <?php if ($pagination !== false): ?>
                <div class="pxl-swiper-dots style-1"></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <?php if ($arrows !== false): ?>
        <div class="pxl-swiper-arrow-wrap style-2">
            <div class="pxl-swiper-arrow pxl-swiper-arrow-prev" tabindex="0" role="button" aria-label="previous slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d">
                <i class="bi-arrow-left-short"></i>
            </div>
            <div class="pxl-swiper-arrow pxl-swiper-arrow-next" tabindex="0" role="button" aria-label="next slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d">
                <i class="bi-arrow-right-short"></i>
            </div>
        </div>
    <?php endif; ?>
    </div>
<?php endif; ?>