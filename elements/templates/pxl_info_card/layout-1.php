<div class="pxl-info-card <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-card-header">
        <div class="pxl-card-header-inner">
            <?php if (!empty($settings['card_icon']['value'])) : ?>
                <div class="pxl-card-icon">
                    <?php \Elementor\Icons_Manager::render_icon($settings['card_icon'], ['aria-hidden' => 'true', 'class' => ''], 'i'); ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($settings['card_title'])) : ?>
                <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-card-title">
                    <?php echo pxl_print_html($settings['card_title']); ?>
                </<?php echo esc_attr($settings['title_tag']); ?>>
            <?php endif; ?>
        </div>
        <?php if (!empty($settings['card_description'])) : ?>
            <div class="pxl-card-description">
                <?php echo pxl_print_html($settings['card_description']); ?>
            </div>
        <?php endif; ?>
    </div>
    
    
    <?php if (!empty($settings['card_items']) && count($settings['card_items']) > 0) : ?>
        <div class="pxl-card-list">
            <?php foreach ($settings['card_items'] as $item) : ?>
                <?php if (!empty($item['item_text'])) : ?>
                    <div class="pxl-card-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="9" viewBox="0 0 8 9" fill="none">
                            <path d="M7.54286 5.29556C8.15238 4.94197 8.15238 4.05802 7.54286 3.70444L1.37143 0.124443C0.761905 -0.229137 -3.07648e-08 0.212838 0 0.919999V8.08C3.07648e-08 8.78716 0.761905 9.22914 1.37143 8.87556L7.54286 5.29556Z" fill="currentColor"/>
                        </svg>
                        <?php echo pxl_print_html($item['item_text']); ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
