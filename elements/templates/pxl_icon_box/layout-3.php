<div class="pxl-icon-box pxl-icon-box3 <?php echo esc_attr($settings['style'] . ' ' . $settings['animate_hover'] . ' ' . $settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <div class="pxl-item--header">
            <?php if (!empty($settings['title'])): ?>
                <h5 class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></h5>
            <?php endif; ?>
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
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" width="355" height="26" viewBox="0 0 355 26" fill="none" class="pxl-item--divider">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M255.373 2.64336e-06V2.7627C255.373 4.45899 255.566 6.13367 256.384 7.50489C258.146 10.461 260.999 11.7483 265.108 12.2842C266.65 12.4851 268.353 12.5777 270.224 12.6162C270.228 12.6161 270.231 12.6163 270.235 12.6162C270.323 12.6145 270.411 12.6148 270.5 12.6133C272.377 12.5803 274.411 12.5975 276.599 12.6172C278.026 12.6044 279.525 12.5918 281.097 12.5918H355V13.4082H281.097C279.525 13.4082 278.026 13.3956 276.599 13.3828C274.303 13.4035 272.177 13.4219 270.224 13.3818C269.756 13.3915 269.299 13.4045 268.853 13.4219C267.512 13.4741 266.265 13.5651 265.108 13.7158C260.999 14.2517 258.146 15.539 256.384 18.4951C255.566 19.8663 255.373 21.541 255.373 23.2373V26C255 26 254.627 26 254.627 26V23.2373C254.627 21.541 254.434 19.8663 253.616 18.4951C251.854 15.539 249.001 14.2517 244.892 13.7158C244.699 13.6907 244.503 13.6674 244.306 13.6455C242.921 13.4923 241.413 13.4155 239.775 13.3818C237.823 13.4219 235.697 13.4035 233.401 13.3828C231.974 13.3956 230.475 13.4082 228.903 13.4082H0V12.5918H228.903C230.475 12.5918 231.974 12.6044 233.401 12.6172C235.589 12.5975 237.623 12.5803 239.5 12.6133C239.588 12.6148 239.676 12.6145 239.764 12.6162C239.768 12.6163 239.771 12.6161 239.775 12.6162C241.413 12.5825 242.921 12.5076 244.306 12.3545C244.503 12.3326 244.699 12.3093 244.892 12.2842C249.001 11.7483 251.854 10.461 253.616 7.50489C254.434 6.13367 254.627 4.45899 254.627 2.7627V2.64336e-06C254.627 2.64336e-06 255 -3.30419e-06 255.373 2.64336e-06ZM255 6.10157C254.831 6.72831 254.591 7.3362 254.252 7.9043C253.265 9.55919 251.968 10.7197 250.375 11.5332C249.876 11.7878 249.349 12.0093 248.793 12.2002C247.732 12.5642 246.568 12.8203 245.302 13C246.729 13.2026 248.027 13.5034 249.193 13.9453C249.461 14.047 249.722 14.1563 249.977 14.2734C251.753 15.0929 253.184 16.3049 254.252 18.0957C254.59 18.6636 254.831 19.271 255 19.8975C255.169 19.271 255.409 18.6636 255.748 18.0957C256.101 17.5031 256.494 16.9737 256.927 16.501C257.071 16.3434 257.219 16.1921 257.372 16.0469C257.601 15.8292 257.84 15.625 258.088 15.4336C258.253 15.3059 258.423 15.184 258.598 15.0674C258.859 14.8925 259.13 14.7295 259.41 14.5781C259.61 14.4705 259.814 14.3699 260.023 14.2734C260.277 14.1564 260.538 14.0469 260.806 13.9453C261.972 13.5032 263.271 13.2027 264.698 13C263.432 12.8203 262.268 12.5642 261.207 12.2002C260.252 11.8725 259.382 11.4573 258.598 10.9326C258.423 10.816 258.253 10.6941 258.088 10.5664C257.84 10.375 257.601 10.1708 257.372 9.95313C257.219 9.80787 257.071 9.65661 256.927 9.49903C256.494 9.0263 256.101 8.49693 255.748 7.9043C255.409 7.3362 255.169 6.72831 255 6.10157Z" fill="currentColor"/>
        </svg>
        <?php if (empty($settings['item_link']['url']) && $settings['follow_social'] == '' && empty($settings['link_list'])): ?>
            <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
        <?php elseif (!empty($settings['item_link']['url']) && $settings['follow_social'] == '' && empty($settings['link_list'])): ?>
            <a <?php pxl_print_html($widget->get_render_attribute_string('item_link')); ?>>
                <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
            </a>
        <?php endif; ?>
    </div>
</div>