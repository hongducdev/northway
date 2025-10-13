<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion');
$wg_id = pxl_get_element_id($settings);

if (!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $number = isset($value['number']) ? $value['number'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $icon_key = $widget->get_repeater_setting_key('pxl_icon', 'icons', $key);
            $widget->add_render_attribute($icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ]); ?>
            
            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-accordion--title" data-target="<?php echo esc_attr('#' . $wg_id . '-' . $pxl_id); ?>">
                    <div class="pxl-title--wrapper">                        
                        <?php if (!empty($value['pxl_icon']['value'])) : ?>
                            <span class="pxl-title--icon">
                                <?php \Elementor\Icons_Manager::render_icon($value['pxl_icon'], ['aria-hidden' => 'true']); ?>
                            </span>
                        <?php endif; ?>
                        
                        <span class="pxl-title--text"><?php echo wp_kses_post($title); ?></span>
                    </div>
                    
                    <div class="pxl-accordion--toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="9" viewBox="0 0 10 9" fill="none">
                            <path d="M3.77048 8.46582C4.15538 9.13249 5.11763 9.13249 5.50253 8.46582L9.01677 2.37898C9.40167 1.71231 8.92055 0.878979 8.15075 0.878979H1.12227C0.352467 0.878979 -0.128657 1.71231 0.256243 2.37898L3.77048 8.46582Z" fill="currentColor" />
                        </svg>
                    </div>
                </<?php pxl_print_html($settings['title_tag']); ?>>
                
                <div id="<?php echo esc_attr($wg_id . '-' . $pxl_id); ?>" class="pxl-accordion--content" <?php if ($is_active) { ?>style="display: block;" <?php } ?>>
                    <div class="pxl-accordion--content-inner">
                        <?php echo wp_kses_post(nl2br($desc)); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>