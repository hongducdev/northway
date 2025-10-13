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
?>
<?php if (isset($settings['team']) && !empty($settings['team']) && count($settings['team'])):
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full'; ?>
    <div class="pxl-swiper-slider pxl-team pxl-team-carousel1 " <?php if ($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['team'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $social = isset($value['social']) ? $value['social'] : '';
                        $icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
                        $popup_template = isset($value['popup_template']) ? $value['popup_template'] : '';
                        if($popup_template > 0 ){
                            if ( !has_action( 'pxl_anchor_target_page_popup_'.$popup_template) ){
                                add_action( 'pxl_anchor_target_page_popup_'.$popup_template, 'northway_hook_anchor_page_popup' );
                            } 
                        }
                        if (!empty($image['id'])) { ?>
                            <div class="pxl-swiper-slide">
                                <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                    <?php if (!empty($image['id'])) {
                                        $img = pxl_get_image_by_size(array(
                                            'attach_id'  => $image['id'],
                                            'thumb_size' => $image_size,
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail = $img['thumbnail'];
                                    ?>
                                        <div class="pxl-item--featured">
                                            <div class="pxl-item--image">
                                                <?php echo wp_kses_post($thumbnail); ?>
                                                <a href="javascript:void(0)" data-target=".pxl-page-popup-template-<?php echo esc_attr($popup_template); ?>">
                                                    <div class="pxl-item--overlay">
                                                        <div class="pxl-item--overlay-button">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </a>
                                                <?php if (!empty($social)): ?>
                                                    <div class="pxl-item--social">
                                                        <div class="pxl-item--social-inner">
                                                            <div class="pxl-item--social-list">
                                                                <?php $team_social = json_decode($social, true); ?>
                                                                <?php foreach ($team_social as $value): ?>
                                                                    <a class="pxl-flex-center" href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                                                                <?php endforeach; ?>
                                                            </div>
                                                            <div class="pxl-item--social-share">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
                                                                    <path d="M14.2226 12.7107C13.2078 12.7107 12.3134 13.2307 11.7517 14.0216L6.89513 11.4311C6.97576 11.1448 7.03243 10.8481 7.03243 10.5351C7.03243 10.1104 6.94885 9.70671 6.80446 9.3354L11.8871 6.14945C12.4527 6.84093 13.2841 7.28947 14.2226 7.28947C15.9219 7.28947 17.3042 5.8496 17.3042 4.07955C17.3042 2.30949 15.9219 0.869629 14.2226 0.869629C12.5234 0.869629 11.1411 2.30949 11.1411 4.07955C11.1411 4.48746 11.2218 4.87439 11.3555 5.23362L6.25777 8.42892C5.69262 7.75797 4.87321 7.32513 3.95091 7.32513C2.25165 7.32513 0.869385 8.76499 0.869385 10.5351C0.869385 12.3051 2.25165 13.745 3.95091 13.745C4.98253 13.745 5.89196 13.2097 6.45156 12.3966L11.2922 14.9786C11.203 15.2784 11.1411 15.5907 11.1411 15.9206C11.1411 17.6906 12.5234 19.1305 14.2226 19.1305C15.9219 19.1305 17.3042 17.6906 17.3042 15.9206C17.3042 14.1505 15.9219 12.7107 14.2226 12.7107Z" fill="currentColor"/>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="pxl-item--holder ">
                                        <div class="pxl-item--meta pxl-flex-grow ">
                                            <h3 class="pxl-item--title">
                                                <?php echo pxl_print_html($title); ?>
                                            </h3>
                                            <div class="pxl-item--position"><?php echo pxl_print_html($position); ?></div>
                                        </div>
                                        <?php if (!empty($icon_image['id'])): ?>
                                            <div class="pxl-item--icon">
                                                <?php echo wp_get_attachment_image($icon_image['id'], 'full'); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
            </div>

            <?php if ($pagination !== false): ?>
                <div class="pxl-swiper-dots style-1"></div>
            <?php endif; ?>

            <?php if ($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap style-1">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev" tabindex="0" role="button" aria-label="previous slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d">
                        <i class="fas fa-angle-right"></i>
                    </div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next" tabindex="0" role="button" aria-label="next slide" aria-controls="swiper-wrapper-5f10c24cfcd53105d">
                        <i class="fas fa-angle-left"></i>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>