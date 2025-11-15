<?php
if (isset($settings['text_items']) && !empty($settings['text_items']) && count($settings['text_items'])): 
    $direction = isset($settings['direction']) ? $settings['direction'] : 'left';
    $speed = isset($settings['speed']['size']) ? $settings['speed']['size'] : 50;
    
    // Get text items
    $text_items = $settings['text_items'];
    
    // Triple the items for seamless looping (x3)
    $tripled_items = array_merge($text_items, $text_items, $text_items);
?>
    <div class="pxl-text-marquee" data-direction="<?php echo esc_attr($direction); ?>" data-speed="<?php echo esc_attr($speed); ?>">
        <div class="pxl-text-marquee-wrapper">
            <?php foreach ($tripled_items as $key => $item): 
                $text = isset($item['text']) ? $item['text'] : '';
                $link_key = $widget->get_repeater_setting_key('link', 'text_items', $key);
                
                if (!empty($item['link']['url'])) {
                    $widget->add_render_attribute($link_key, 'href', $item['link']['url']);

                    if ($item['link']['is_external']) {
                        $widget->add_render_attribute($link_key, 'target', '_blank');
                    }

                    if ($item['link']['nofollow']) {
                        $widget->add_render_attribute($link_key, 'rel', 'nofollow');
                    }
                }
                $link_attributes = $widget->get_render_attribute_string($link_key);
            ?>
                <div class="pxl-text--marquee">
                    <?php if (!empty($item['link']['url'])): ?>
                        <a <?php echo implode(' ', [$link_attributes]); ?> class="pxl-text-item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                            <?php echo esc_html($text); ?>
                        </a>
                    <?php else: ?>
                        <span class="pxl-text-item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                            <?php echo esc_html($text); ?>
                        </span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

