<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll');
$arrows = filter_var($widget->get_setting('arrows', 'false'), FILTER_VALIDATE_BOOLEAN);
$pagination = filter_var($widget->get_setting('pagination', 'false'), FILTER_VALIDATE_BOOLEAN);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = filter_var($widget->get_setting('pause_on_hover', 'false'), FILTER_VALIDATE_BOOLEAN);
$autoplay = filter_var($widget->get_setting('autoplay', 'false'), FILTER_VALIDATE_BOOLEAN);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = filter_var($widget->get_setting('infinite', 'false'), FILTER_VALIDATE_BOOLEAN);
$speed = $widget->get_setting('speed', '500');
$drap = filter_var($widget->get_setting('drap', 'false'), FILTER_VALIDATE_BOOLEAN);
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => (int)$col_xl,
    'slides_to_show_xxl'            => (int)$col_xxl, 
    'slides_to_show_lg'             => (int)$col_lg, 
    'slides_to_show_md'             => (int)$col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => (int)$speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['lists']) && !empty($settings['lists']) && count($settings['lists'])): ?>
    <div class="pxl-swiper-slider pxl-process-carousel pxl-process-carousel1" <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['lists'] as $key => $value):
                        $year = isset($value['year']) ? $value['year'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <div class="pxl-item--dot"></div>
                                <?php if(!empty($year)): ?>
                                    <div class="pxl-item--year"><?php echo pxl_print_html($year); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php if($pagination !== false || $arrows !== false): ?>
            <div class="pxl-swiper-bottom pxl-flex-middle">
                <?php if($pagination !== false): ?>
                    <div class="pxl-swiper-dots style-1"></div>
                <?php endif; ?>
                <?php if($arrows !== false): ?>
                    <div class="pxl-wrap-arrow pxl-flex-middle">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev" style="transform: scalex(-1);">
                            <i class="bi-play-fill"></i>
                        </div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                            <i class="bi-play-fill"></i>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
