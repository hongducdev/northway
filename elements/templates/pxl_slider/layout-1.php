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
    $effect = $widget->get_setting('effect', 'fade');
    $pause_on_hover = $widget->get_setting('pause_on_hover', false);
    $autoplay = $widget->get_setting('autoplay', false);
    $autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
    $infinite = $widget->get_setting('infinite', false);
    $speed = $widget->get_setting('speed', '1000');
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
    $settings = $widget->get_settings();
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
    if (isset($settings['slides']) && !empty($settings['slides']) && count($settings['slides'])): ?>
    <div id="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>" class="pxl-swiper-slider pxl-slider pxl-slider1 <?php echo esc_attr($settings['pxl_animate'] ?? ''); ?>" <?php if ($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?> data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay'] ?? ''); ?>ms">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string('carousel')); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['slides'] as $key => $value):
                            $bg_image = isset($value['bg_image']) ? $value['bg_image'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-slider--item">
                                <?php if(!empty($bg_image['id'])) :
                                    $img  = pxl_get_image_by_size( array(
                                        'attach_id'  => $bg_image['id'],
                                        'thumb_size' => 'full',
                                        'class' => 'no-lazyload swiper-gl-image'
                                    ) );
                                    $thumbnail    = $img['thumbnail'];
                                    $thumbnail_url = $img['url']; ?>
                                    <div class="pxl-slider--image bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
                                <?php endif; ?>
                                <div class="pxl-slider--content">
                                    <?php $slide_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$value['slide_template']);
                                    pxl_print_html($slide_content); ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        <?php if ($pagination !== false): ?>
            <div class="pxl-swiper-bottom pxl-flex-middle">
                <?php if ($pagination !== false): ?>
                    <div class="pxl-swiper-dots style-2"></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    </div>
<?php endif; ?>