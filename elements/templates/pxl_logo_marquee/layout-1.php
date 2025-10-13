<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

if ($col_xl == 'auto') {
    $col_xl = 'col-xl-auto';
} elseif ($col_xl == '5') {
    $col_xl = 'pxl5';
} else {
    $col_xl = 12 / intval($col_xl);
}

if ($col_lg == 'auto') {
    $col_lg = 'col-lg-auto';
} elseif ($col_lg == '5') {
    $col_lg = 'pxl5';
} else {
    $col_lg = 12 / intval($col_lg);
}

if ($col_md == 'auto') {
    $col_md = 'col-md-auto';
} else {
    $col_md = 12 / intval($col_md);
}

if ($col_sm == 'auto') {
    $col_sm = 'col-sm-auto';
} else {
    $col_sm = 12 / intval($col_sm);
}

if ($col_xs == 'auto') {
    $col_xs = 'col-xs-auto';
} else {
    $col_xs = 12 / intval($col_xs);
}

$item_class = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
if (isset($settings['marquee']) && !empty($settings['marquee']) && count($settings['marquee'])): ?>
    <div class="pxl-logo-marquee1">
        <div class="pxl-logo-hidden-wrap">
            <div class="pxl-logo-hidden pxl-flex-middle">
                <?php foreach ($settings['marquee'] as $key => $value):
                    $logo = isset($value['logo']) ? $value['logo'] : '';
                    $text = isset($value['text']) ? $value['text'] : '';
                    $icon = isset($value['icon']) ? $value['icon'] : '';
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
                ?>
                    <div class="pxl-item--logo <?php echo esc_attr($item_class); ?>">
                        <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                            <?php if (!empty($icon['value']) || !empty($logo['id'])) : ?>
                                <div class="pxl-item--logo">
                                    <?php if (! empty($value['link']['url'])) { ?><a <?php echo implode(' ', [$link_attributes]); ?>><?php } ?>
                                        <?php if (!empty($icon['value'])) {
                                            \Elementor\Icons_Manager::render_icon($icon, ['class' => 'pxl-item--icon']);
                                        } elseif (!empty($logo['id'])) {
                                            $img_logo = pxl_get_image_by_size(array(
                                                'attach_id'  => $logo['id'],
                                                'thumb_size' => 'full',
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail_logo = $img_logo['thumbnail'];
                                            echo wp_kses_post($thumbnail_logo);
                                        } ?>
                                    <?php if (! empty($value['link']['url'])) { ?></a><?php } ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($text)) : ?>
                                <div class="pxl-item--text"><?php echo esc_html($text); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="pxl-logo-active pxl-flex-middle">
            <?php foreach ($settings['marquee'] as $key => $value):
                $logo = isset($value['logo']) ? $value['logo'] : '';
                $text = isset($value['text']) ? $value['text'] : '';
                $icon = isset($value['icon']) ? $value['icon'] : '';
                $link_key2 = $widget->get_repeater_setting_key('link2', 'value', $key);
                if (! empty($value['link']['url'])) {
                    $widget->add_render_attribute($link_key2, 'href', $value['link']['url']);

                    if ($value['link']['is_external']) {
                        $widget->add_render_attribute($link_key2, 'target', '_blank');
                    }

                    if ($value['link']['nofollow']) {
                        $widget->add_render_attribute($link_key2, 'rel', 'nofollow');
                    }
                }
                $link_attributes2 = $widget->get_render_attribute_string($link_key2);
            ?>
                <div class="pxl-item--marquee <?php echo esc_attr($item_class); ?>" data-duration="<?php echo esc_attr($settings['slip_duration']); ?>" data-slip-type="<?php echo esc_attr($settings['slip_type']); ?>">
                    <div class="pxl-item--inner pxl-flex-middle <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                        <?php if (!empty($icon['value']) || !empty($logo['id'])) : ?>
                            <div class="pxl-item--logo">
                                <?php if (! empty($value['link']['url'])) { ?><a <?php echo implode(' ', [$link_attributes2]); ?>><?php } ?>
                                    <?php if (!empty($icon['value'])) {
                                        \Elementor\Icons_Manager::render_icon($icon, ['class' => 'pxl-item--icon']);
                                    } elseif (!empty($logo['id'])) {
                                        $img_logo = pxl_get_image_by_size(array(
                                            'attach_id'  => $logo['id'],
                                            'thumb_size' => 'full',
                                            'class' => 'no-lazyload',
                                        ));
                                        $thumbnail_logo = $img_logo['thumbnail'];
                                        echo wp_kses_post($thumbnail_logo);
                                    } ?>
                                <?php if (! empty($value['link']['url'])) { ?></a><?php } ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($text)) : ?>
                            <div class="pxl-item--text"><?php echo esc_html($text); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>