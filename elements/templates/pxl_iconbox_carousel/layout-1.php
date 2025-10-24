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
    <div id="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>" class="pxl-swiper-slider pxl-iconbox-carousel pxl-iconbox-carousel1 <?php echo esc_attr($settings['pxl_animate']); ?>" <?php if ($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?> data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
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
                                            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title"><?php echo pxl_print_html($title); ?></<?php echo esc_attr($settings['title_tag']); ?>>
                                            <?php if (! empty($item_link['url'])) { ?>
                                            </a>
                                        <?php } ?>
                                    <?php endif; ?>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="630" height="26" viewBox="0 0 630 26" fill="none" class="pxl-item--divider">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M117.873 2.7627C117.873 4.45899 118.067 6.13367 118.884 7.50489C120.646 10.461 123.499 11.7483 127.609 12.2842C129.15 12.4851 130.853 12.5787 132.724 12.6172C134.677 12.5771 136.803 12.5965 139.099 12.6172C140.526 12.6044 142.025 12.5918 143.597 12.5918H629.999V13.4082H143.597C142.025 13.4082 140.526 13.3956 139.099 13.3828C136.803 13.4035 134.677 13.4219 132.724 13.3818C130.853 13.4203 129.15 13.5149 127.609 13.7158C123.499 14.2517 120.646 15.539 118.884 18.4951C118.067 19.8663 117.873 21.541 117.873 23.2373V26C117.873 26 117.5 26 117.127 26V23.2373C117.127 21.541 116.934 19.8663 116.116 18.4951C114.354 15.539 111.501 14.2517 107.392 13.7158C105.85 13.5148 104.147 13.4203 102.275 13.3818C102.184 13.3837 0.0921491 13.3834 0 13.385V12.6135C0.0921563 12.6152 84.5924 12.6137 102.275 12.6172C104.147 12.5787 105.85 12.4852 107.392 12.2842C111.501 11.7483 114.354 10.461 116.116 7.50489C116.934 6.13367 117.127 4.45899 117.127 2.7627V2.64338e-06C117.5 -3.30422e-06 117.873 2.64338e-06 117.873 2.64338e-06V2.7627ZM117.5 6.10157C117.331 6.72831 117.091 7.33619 116.752 7.9043C114.868 11.0647 111.853 12.4249 107.801 13C111.853 13.5751 114.868 14.9353 116.752 18.0957C117.091 18.6636 117.331 19.271 117.5 19.8975C117.669 19.271 117.91 18.6636 118.248 18.0957C120.132 14.9355 123.147 13.5751 127.198 13C123.147 12.4249 120.132 11.0645 118.248 7.9043C117.909 7.33619 117.669 6.72831 117.5 6.10157Z" fill="currentColor"/>
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
                <?php if ($pagination !== false): ?>
                    <div class="pxl-swiper-dots style-1"></div>
                <?php endif; ?>
                <?php if ($arrows !== false): ?>
                    <div class="pxl-swiper-arrow-wrap style-3">
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