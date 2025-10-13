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
    <div id="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>" class="pxl-swiper-slider pxl-iconbox-carousel pxl-iconbox-carousel2 <?php echo esc_attr($settings['pxl_animate']); ?>" <?php if ($drap !== false) : ?>data-cursor-drap="<?php echo esc_html('DRAG', 'northway'); ?>" <?php endif; ?> data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
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
                                    <div class="pxl-item--right">
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
                                </div>
                                
                                <div class="pxl-item--popup">
                                    <?php
                                    // Prepare link attributes for popup section
                                    if (! empty($item_link['url'])) {
                                        $item_link_key = $widget->get_repeater_setting_key('item_link', 'iconbox_list', $key);
                                        $widget->add_render_attribute($item_link_key, 'href', $item_link['url']);
                                        if (! empty($item_link['is_external'])) {
                                            $widget->add_render_attribute($item_link_key, 'target', '_blank');
                                        }
                                        if (! empty($item_link['nofollow'])) {
                                            $widget->add_render_attribute($item_link_key, 'rel', 'nofollow');
                                        }
                                    ?>
                                        <a <?php pxl_print_html($widget->get_render_attribute_string($item_link_key)); ?>>
                                    <?php }
                                    ?>
                                    <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title"><?php echo pxl_print_html($title); ?></<?php echo esc_attr($settings['title_tag']); ?>>
                                    <?php if (! empty($item_link['url'])) { ?>
                                        </a>
                                    <?php } ?>
                                    <?php if (! empty($desc)) : ?>
                                        <div class="pxl-item--description el-empty"><?php echo pxl_print_html($desc); ?></div>
                                    <?php endif; ?>
                                </div>
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
                    <div class="pxl-swiper-arrow-wrap style-1">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
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