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
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel3" <?php if ($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?>>
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
                                <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="640" height="14" viewBox="0 0 640 14" fill="none" class="pxl-item--divider">
                                    <path d="M0 0.813489H8.90332C10.4753 0.813489 11.9743 0.800888 13.4014 0.788098C15.6973 0.808787 17.8234 0.827214 19.7764 0.787122C20.2438 0.796743 20.7009 0.809758 21.1475 0.827161C22.4882 0.8794 23.7354 0.970363 24.8916 1.12111C29.0013 1.657 31.8537 2.9443 33.6162 5.9004C34.4334 7.27155 34.6269 8.94644 34.627 10.6426V13.4053C34.9977 13.4053 35.3692 13.4053 35.373 13.4053V10.6426C35.3731 8.94645 35.5666 7.27155 36.3838 5.9004C38.1463 2.9443 40.9987 1.65701 45.1084 1.12111C45.3011 1.09598 45.4965 1.07269 45.6943 1.05079C47.0786 0.897549 48.5873 0.820803 50.2246 0.787122C52.1773 0.827188 54.3031 0.808783 56.5986 0.788098C58.0257 0.800888 59.5248 0.813489 61.0967 0.813489H640V0.00489492H58.793C58.0435 0.00964357 57.3121 0.0160795 56.5986 0.0224733C54.4106 0.00275644 52.3767 -0.0144378 50.5 0.018567C50.4118 0.020121 50.3239 0.0198172 50.2363 0.0214967C46.9399 0.0873341 43.9378 0.16372 40.8066 1.3506C40.5386 1.45222 40.2774 1.56157 40.0234 1.67872C38.2469 2.49822 36.8158 3.71029 35.748 5.50099C35.4096 6.06878 35.1691 6.67638 35 7.30275C34.8309 6.67637 34.5904 6.06879 34.252 5.50099C33.8986 4.90845 33.5054 4.37893 33.0732 3.90626C32.9292 3.74875 32.7806 3.59735 32.6279 3.45216C32.399 3.23454 32.1603 3.03021 31.9121 2.83888C31.7465 2.71126 31.5765 2.58921 31.4023 2.47267C31.1411 2.29782 30.8702 2.13471 30.5898 1.98341C30.3905 1.87583 30.1855 1.77512 29.9766 1.67872C29.7228 1.56169 29.4622 1.45213 29.1943 1.3506C26.0436 0.15606 22.8253 0.0771703 19.5 0.018567C17.6233 -0.0144379 15.5894 0.00275634 13.4014 0.0224733C12.6879 0.0160795 11.9565 0.00964359 11.207 0.00489492H0V0.813489Z" fill="currentColor"/>
                                </svg>
                                <div class="pxl-item--meta">
                                    <?php if (!empty($avatar['id'])) {
                                        $img = pxl_get_image_by_size(array(
                                            'attach_id'  => $avatar['id'],
                                            'thumb_size' => '140x140',
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail = $img['thumbnail']; ?>
                                        <div class="pxl-item--avatar ">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="pxl-item--info">
                                        <h6 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h6>
                                        <div class="pxl-item--info-meta">
                                            <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                            <div class="pxl-item--star pxl-item--<?php echo esc_attr($star); ?>">
                                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                        <path d="M7.55163 0.908492C7.73504 0.536869 8.26496 0.53687 8.44837 0.908493L10.2348 4.52821C10.3076 4.67578 10.4484 4.77807 10.6113 4.80173L14.6059 5.38218C15.016 5.44177 15.1797 5.94576 14.883 6.23503L11.9925 9.05258C11.8746 9.16745 11.8208 9.33295 11.8487 9.49515L12.531 13.4736C12.6011 13.8821 12.1724 14.1935 11.8055 14.0007L8.23267 12.1223C8.08701 12.0457 7.91299 12.0457 7.76733 12.1223L4.19445 14.0007C3.82764 14.1935 3.39893 13.8821 3.46898 13.4736L4.15134 9.49515C4.17916 9.33295 4.12538 9.16745 4.00754 9.05258L1.11702 6.23503C0.820264 5.94576 0.98402 5.44177 1.39413 5.38218L5.38873 4.80173C5.55158 4.77807 5.69236 4.67578 5.7652 4.52821L7.55163 0.908492Z" fill="currentColor"/>
                                                    </svg>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
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