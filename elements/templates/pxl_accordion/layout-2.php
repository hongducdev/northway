<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion_2');
$wg_id = pxl_get_element_id($settings);

if (!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title_2']) ? $value['title_2'] : '';
            $desc = isset($value['desc_2']) ? $value['desc_2'] : '';
            ?>
            
            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <div class="pxl-accordion--title" data-target="<?php echo esc_attr('#' . $wg_id . '-' . $pxl_id); ?>">
                    <div class="pxl-title--wrapper">                        
                        <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-title--text"><?php echo wp_kses_post($title); ?></<?php pxl_print_html($settings['title_tag']); ?>>
                        <span class="pxl-title--icon">
                            <span></span>
                        </span>
                    </div>
                </div>
                
                <div id="<?php echo esc_attr($wg_id . '-' . $pxl_id); ?>" class="pxl-accordion--content" <?php if ($is_active) { ?>style="display: block;" <?php } ?>>
                    <div class="pxl-accordion--content-inner">
                        <?php echo wp_kses_post(nl2br($desc)); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>