<?php if (isset($settings['language']) && !empty($settings['language']) && count($settings['language'])): ?>
    <div class="pxl-language-switch <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-language-switch-current">
            <div class="pxl-language-switch-current-meta">
                <?php $first_language = $settings['language'][0]; ?>
                <?php if (!empty($first_language['flag']['url'])): ?>
                    <img src="<?php echo esc_url($first_language['flag']['url']); ?>" alt="flag">
                <?php endif ?>
                <h6><?php echo esc_attr($first_language['name']); ?></h6>
            </div>
            <div class="pxl-language-switch-toggle">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
        <div class="pxl-language-switch-list">
            <?php foreach ($settings['language'] as $key => $value):
                $link_key = $widget->get_repeater_setting_key('link', 'value', $key);
                if (! empty($value['link']['url'])) {
                    $widget->add_render_attribute($link_key, 'href', $value['link']['url']);

                    if ($value['link']['is_external']) {
                        $widget->add_render_attribute($link_key, 'target', '_blank');
                    }

                    if ($value['link']['nofollow']) {
                        $widget->add_render_attribute($link_key, 'rel', 'nofollow');
                    }
                }
                $link_attributes = $widget->get_render_attribute_string($link_key);
                if (!empty($value['name'])) : ?>
                    <div class="pxl-language-switch-item">
                        <a <?php echo implode(' ', [$link_attributes]); ?>>
                            <?php if (!empty($value['flag']['url'])): ?>
                                <img src="<?php echo esc_url($value['flag']['url']); ?>" alt="flag">
                            <?php endif ?>
                            <?php echo esc_attr($value['name']); ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>