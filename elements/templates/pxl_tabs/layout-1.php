<?php 
$html_id = pxl_get_element_id($settings); 
$tab_bd_ids = [];

if(!empty($settings['tabs_1_layout_1']) && !empty($settings['tabs_2_layout_1'])): 
?>
<div class="pxl-tabs pxl-tabs1 <?php echo esc_attr($settings['tab_effect'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-tabs--inner">
        <div class="pxl-tabs--title pxl-tabs--switch">
            <div class="pxl-switch-container">
                <span class="pxl-switch-label pxl-switch-left <?php if($settings['tab_active'] == 1) { echo 'active'; } ?>">
                    <?php echo pxl_print_html($settings['tabs_1_layout_1']); ?>
                </span>
                
                <div class="pxl-switch-toggle">
                    <input type="checkbox" id="<?php echo esc_attr($html_id.'-switch'); ?>" class="pxl-switch-input" <?php if($settings['tab_active'] == 2) { echo 'checked'; } ?>>
                    <label for="<?php echo esc_attr($html_id.'-switch'); ?>" class="pxl-switch-slider">
                        <span class="pxl-switch-button"></span>
                    </label>
                </div>
                
                <span class="pxl-switch-label pxl-switch-right <?php if($settings['tab_active'] == 2) { echo 'active'; } ?>">
                    <?php echo pxl_print_html($settings['tabs_2_layout_1']); ?>
                </span>
            </div>
        </div>
        
        <div class="pxl-tabs--content">
            <!-- Content Tab 1 -->
            <div id="<?php echo esc_attr($html_id.'-tab-1'); ?>" class="pxl-item--content <?php if($settings['tab_active'] == 1) { echo 'active'; } ?> pxl-tabs--elementor" <?php if($settings['tab_active'] == 1) { ?>style="display: block;"<?php } else { ?>style="display: none;"<?php } ?>>
                <?php if(!empty($settings['content_1_layout_1']) && $settings['content_1_layout_1'] != 'df') {
                    $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$settings['content_1_layout_1']);
                    $tab_bd_ids[] = (int)$settings['content_1_layout_1'];
                    pxl_print_html($tab_content);
                } ?>        
            </div>
            
            <!-- Content Tab 2 -->
            <div id="<?php echo esc_attr($html_id.'-tab-2'); ?>" class="pxl-item--content <?php if($settings['tab_active'] == 2) { echo 'active'; } ?> pxl-tabs--elementor" <?php if($settings['tab_active'] == 2) { ?>style="display: block;"<?php } else { ?>style="display: none;"<?php } ?>>
                <?php if(!empty($settings['content_2_layout_1']) && $settings['content_2_layout_1'] != 'df') {
                    $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$settings['content_2_layout_1']);
                    $tab_bd_ids[] = (int)$settings['content_2_layout_1'];
                    pxl_print_html($tab_content);
                } ?>        
            </div>
        </div>
    </div>
</div>
<?php endif; ?>