<div class="pxl-icon-box pxl-icon-box8 <?php echo esc_attr($settings['align_8'] . ' ' . $settings['animate_hover'] . ' ' . $settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <div class="pxl-item--header">
            <?php if ($settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value'])) : ?>
                <div class="pxl-item--icon pxl-flex-center">
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
            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="17" viewBox="0 0 13 17" fill="none" class="pxl-item--star">
                <path d="M11.4841 7.67924C11.7953 7.86778 12.1183 8.02672 12.4498 8.16052C12.6855 8.25568 12.6855 8.64544 12.4498 8.7406C12.1183 8.8744 11.7953 9.03334 11.4841 9.22188C10.8827 9.58625 10.3455 9.99157 9.86575 10.4373C9.70583 10.5858 9.55233 10.7389 9.40493 10.8964C9.18403 11.1325 8.97678 11.3785 8.78258 11.6345C8.65302 11.8053 8.52925 11.9806 8.41095 12.1602C7.87846 12.9686 7.45715 13.8662 7.12462 14.8507C6.92793 15.433 6.76228 16.0458 6.62285 16.6886C6.56137 16.972 6.06439 16.972 6.00284 16.6886C5.82976 15.8916 5.61634 15.1408 5.35368 14.4369C5.25063 14.1607 5.13949 13.892 5.0207 13.6303C4.92286 13.4148 4.82071 13.2036 4.71151 12.9979C4.55795 12.7088 4.39248 12.4296 4.21501 12.1602C4.09671 11.9806 3.97294 11.8053 3.84338 11.6345C3.64918 11.3785 3.44193 11.1325 3.22103 10.8964C3.07363 10.7389 2.92013 10.5858 2.76021 10.4373C2.28049 9.99157 1.74329 9.58625 1.14189 9.22188C0.83079 9.03343 0.508019 8.87449 0.176822 8.74069C-0.0588736 8.64546 -0.0588736 8.25566 0.176822 8.16044C0.508019 8.02663 0.83079 7.86769 1.14189 7.67924C2.95915 6.57824 4.18908 5.10268 5.0207 3.27082C5.13962 3.00886 5.25054 2.73974 5.35368 2.46325C5.61619 1.75958 5.82961 1.00909 6.00271 0.212509C6.0643 -0.0708779 6.56138 -0.0708801 6.62285 0.212529C6.76228 0.855296 6.92793 1.46808 7.12462 2.0504C7.31834 2.62397 7.54315 3.16755 7.80148 3.68166C8.62697 5.32439 9.8047 6.66179 11.4841 7.67924Z" fill="currentColor"/>
            </svg>
            <?php if (!empty($settings['title'])): ?>
                <h5 class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></h5>
            <?php endif; ?>
        </div>
        <div class="pxl-item--body">
            <?php if (!empty($settings['desc'])): ?>
                <div class="pxl-item--description"><?php echo pxl_print_html($settings['desc']); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>