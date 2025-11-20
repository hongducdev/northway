<div class="pxl-icon-box pxl-icon-box9 <?php echo esc_attr($settings['animate_hover'] . ' ' . $settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
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
        <svg xmlns="http://www.w3.org/2000/svg" width="240" height="23" viewBox="0 0 240 23" fill="none" class="pxl-item--divider">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M170.162 2.44434C170.162 3.94468 170.337 5.42583 171.077 6.63867C172.673 9.25371 175.256 10.3931 178.977 10.8672C180.372 11.0449 181.914 11.1261 183.607 11.1602C183.611 11.1601 183.615 11.1602 183.618 11.1602C183.698 11.1587 183.778 11.1596 183.858 11.1582C185.557 11.129 187.399 11.1437 189.38 11.1611C190.672 11.1498 192.029 11.1387 193.452 11.1387H240V11.8613H193.452C192.029 11.8613 190.672 11.8502 189.38 11.8389C187.301 11.8572 185.376 11.8734 183.607 11.8379C183.184 11.8464 182.77 11.8577 182.366 11.873C181.152 11.9193 180.023 11.9995 178.977 12.1328C175.256 12.6069 172.673 13.7463 171.077 16.3613C170.337 17.5742 170.162 19.0553 170.162 20.5557V23C169.825 23 169.486 23 169.486 23V20.5557C169.486 19.0553 169.311 17.5742 168.571 16.3613C166.975 13.7463 164.393 12.6069 160.672 12.1328C160.497 12.1106 160.321 12.0907 160.142 12.0713C158.888 11.9357 157.522 11.8677 156.04 11.8379C154.272 11.8733 152.347 11.8572 150.269 11.8389C148.977 11.8502 147.619 11.8613 146.196 11.8613H0V11.1387H146.196C147.619 11.1387 148.977 11.1498 150.269 11.1611C152.249 11.1437 154.091 11.129 155.79 11.1582C155.87 11.1596 155.95 11.1587 156.029 11.1602C156.033 11.1602 156.037 11.1601 156.04 11.1602C157.522 11.1304 158.888 11.0641 160.142 10.9287C160.321 10.9094 160.497 10.8894 160.672 10.8672C164.393 10.3931 166.975 9.25371 168.571 6.63867C169.311 5.42581 169.486 3.94471 169.486 2.44434V2.33835e-06C169.486 2.33835e-06 169.825 -2.92294e-06 170.162 2.33835e-06V2.44434ZM169.824 5.39746C169.671 5.9518 169.454 6.48971 169.147 6.99219C168.254 8.45611 167.079 9.48255 165.637 10.2022C165.185 10.4273 164.708 10.6241 164.204 10.793C163.244 11.1149 162.189 11.3411 161.043 11.5C162.335 11.6792 163.512 11.945 164.567 12.3359C164.81 12.4258 165.046 12.5233 165.276 12.627C166.885 13.3519 168.181 14.4238 169.147 16.0078C169.454 16.5101 169.671 17.0475 169.824 17.6016C169.977 17.0474 170.195 16.5102 170.502 16.0078C170.822 15.4836 171.177 15.0148 171.568 14.5967C171.699 14.4573 171.833 14.3238 171.972 14.1953C172.179 14.0027 172.395 13.8216 172.62 13.6523C172.77 13.5395 172.924 13.4322 173.082 13.3291C173.319 13.1745 173.564 13.0303 173.817 12.8965C173.998 12.8014 174.183 12.7122 174.372 12.627C174.602 12.5234 174.839 12.4258 175.081 12.3359C176.137 11.9449 177.313 11.6793 178.605 11.5C177.459 11.341 176.405 11.1149 175.444 10.793C174.58 10.5031 173.792 10.135 173.082 9.6709C172.924 9.56783 172.77 9.46053 172.62 9.34766C172.395 9.17836 172.179 8.99726 171.972 8.80469C171.833 8.67624 171.699 8.54267 171.568 8.40332C171.177 7.98518 170.822 7.51638 170.502 6.99219C170.195 6.48964 169.977 5.95189 169.824 5.39746Z" fill="currentColor"/>
        </svg>
        <?php if (!empty($settings['desc'])): ?>
            <div class="pxl-item--description"><?php echo pxl_print_html($settings['desc']); ?></div>
        <?php endif; ?>
    </div>
</div>