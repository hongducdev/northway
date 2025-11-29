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
                                <div class="pxl-item--body">
                                    <div class="pxl-item--desc"><?php echo pxl_print_html($desc); ?></div>
                                    <div class="pxl-item--body-footer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="297" height="14" viewBox="0 0 297 14" fill="none" class="pxl-item--divider">
                                            <path d="M0 0.849578H37.9034C39.4753 0.849578 40.9743 0.836419 42.4014 0.823061C44.6973 0.844668 46.8235 0.863913 48.7764 0.822042C49.2439 0.83209 49.7009 0.845683 50.1475 0.863857C51.4883 0.918413 52.7355 1.01341 53.8917 1.17084C58.0014 1.73052 60.8538 3.07492 62.6163 6.16217C63.4335 7.59415 63.627 9.34334 63.627 11.1147V14C63.9977 14 64.3692 14 64.3731 14V11.1147C64.3732 9.34335 64.5667 7.59414 65.3839 6.16217C67.1464 3.07493 69.9987 1.73052 74.1085 1.17084C74.3012 1.1446 74.4966 1.12028 74.6944 1.09741C76.0787 0.937368 77.5874 0.857217 79.2247 0.822042C81.1773 0.863886 83.3032 0.844664 85.5987 0.823061C87.0258 0.836419 88.5248 0.849578 90.0967 0.849578H297V0.00511205L87.793 0.00511199C87.0435 0.0100713 86.3121 0.0167929 85.5987 0.0234703C83.4106 0.00287872 81.3768 -0.0150783 79.5001 0.0193908C79.4119 0.0210136 79.3239 0.0206964 79.2364 0.0224504C75.94 0.0912086 72.9379 0.170984 69.8067 1.41052C69.5386 1.51664 69.2775 1.63084 69.0235 1.7532C67.247 2.60905 65.8158 3.87489 64.7481 5.74503C64.4097 6.33801 64.1692 6.97257 64.0001 7.62673C63.8309 6.97256 63.5905 6.33802 63.252 5.74503C62.8987 5.12621 62.5055 4.57319 62.0733 4.07956C61.9293 3.91506 61.7807 3.75694 61.628 3.60531C61.3991 3.37804 61.1604 3.16464 60.9122 2.96482C60.7466 2.83154 60.5765 2.70407 60.4024 2.58237C60.1411 2.39976 59.8703 2.22941 59.5899 2.0714C59.3905 1.95905 59.1856 1.85387 58.9766 1.7532C58.7229 1.63097 58.4622 1.51655 58.1944 1.41052C55.0437 0.162984 51.8254 0.0805939 48.5001 0.0193908C46.6234 -0.0150784 44.5895 0.00287862 42.4014 0.0234703C41.688 0.0167928 40.9566 0.0100713 40.2071 0.00511199L0 0.00511202V0.849578Z" fill="currentColor"/>
                                        </svg>
                                        <div class="pxl-item--body-meta">
                                            <div class="pxl-item--meta">
                                                <h6 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h6>
                                                <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                            </div>
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
                <div class="pxl-swiper-dots style-2"></div>
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