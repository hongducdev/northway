<div class="pxl-icon-box pxl-icon-box2 <?php echo esc_attr($settings['style_2'] . ' ' . $settings['animate_hover'] . ' ' . $settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if ($settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value'])) : ?>
            <div class="pxl-item--icon pxl-flex-center <?php echo esc_attr($settings['bg_color_style']); ?>">
                <?php if (! empty($settings['item_link']['url'])) {
                    $widget->add_render_attribute('item_link', 'href', $settings['item_link']['url']);

                    if ($settings['item_link']['is_external']) {
                        $widget->add_render_attribute('item_link', 'target', '_blank');
                    }

                    if ($settings['item_link']['nofollow']) {
                        $widget->add_render_attribute('item_link', 'rel', 'nofollow');
                    } ?>
                    <a <?php pxl_print_html($widget->get_render_attribute_string('item_link')); ?>>
                    <?php } ?>
                    <?php \Elementor\Icons_Manager::render_icon($settings['pxl_icon'], ['aria-hidden' => 'true', 'class' => ''], 'i'); ?>
                    <?php if (! empty($settings['item_link']['url'])) { ?>
                    </a>
                <?php } ?>
            </div>
        <?php endif; ?>
        <?php if ($settings['icon_type'] == 'image' && !empty($settings['icon_image']['id'])) : ?>
            <div class="pxl-item--icon pxl-flex-center pxl-mr-25">
                <?php $img_icon  = pxl_get_image_by_size(array(
                    'attach_id'  => $settings['icon_image']['id'],
                    'thumb_size' => 'full',
                ));
                $thumbnail_icon    = $img_icon['thumbnail'];
                echo pxl_print_html($thumbnail_icon); ?>
            </div>
        <?php endif; ?>
        <div class="pxl-item--meta">
            <?php if (!empty($settings['title'])): ?>
                <h5 class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></h5>
            <?php endif; ?>
            <?php if (empty($settings['item_link']['url']) && $settings['follow_social'] == '' && empty($settings['link_list'])): ?>
                <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
            <?php elseif (!empty($settings['item_link']['url']) && $settings['follow_social'] == '' && empty($settings['link_list'])): ?>
                <a <?php pxl_print_html($widget->get_render_attribute_string('item_link')); ?>>
                    <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>