<div class="pxl-process pxl-process1 <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-process-wrapper">
        <?php foreach ($settings['process'] as $key => $value):
            $title = isset($value['title']) ? $value['title'] : ''; 
            $icon = isset($value['icon']) ? $value['icon'] : ''; 
            $desc = isset($value['desc']) ? $value['desc'] : ''; 
            $step = isset($value['step']) ? $value['step'] : ''; 
            ?>
            
            <div class="pxl-item wow rollInRight" data-wow-delay="200ms">
                <div class="pxl-item--inner">
                    <div class="pxl-item--front">
                        <div class="pxl-item--front-header">
                            <?php if(!empty($step)): ?>
                                <div class="pxl-item--step">
                                    <span><?php echo pxl_print_html($step); ?>.</span>
                                </div>
                            <?php endif; ?>
                            <div class="pxl-item--icon">
                                <?php \Elementor\Icons_Manager::render_icon($icon, ['aria-hidden' => 'true', 'class' => ''], 'i'); ?>
                            </div>
                        </div>
                        <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty">
                            <?php echo pxl_print_html($title); ?>
                        </<?php echo esc_attr($settings['title_tag']); ?>>
                    </div>
                    <div class="pxl-item--back">
                        <div class="pxl-item--description el-empty">
                            <?php echo pxl_print_html($desc); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
