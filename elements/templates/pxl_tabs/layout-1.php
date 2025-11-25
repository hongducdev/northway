<?php 
$html_id = pxl_get_element_id($settings); 
$tab_bd_ids = [];

if(!empty($settings['tabs_1_layout_1']) && !empty($settings['tabs_2_layout_1'])): 
?>
<div class="pxl-tabs pxl-tabs1 <?php echo esc_attr($settings['tab_effect'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-tabs--inner">
        <div class="pxl-tabs--title pxl-tabs--switch">
            <div class="pxl-switch-container">
                <span class="pxl-switch-label pxl-switch-left <?php if($settings['tab_active'] == 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-tab-1'); ?>">
                    <?php echo pxl_print_html($settings['tabs_1_layout_1']); ?>
                </span>
                
                <div class="pxl-switch-toggle">
                    <input type="checkbox" id="<?php echo esc_attr($html_id.'-switch'); ?>" class="pxl-switch-input" <?php if($settings['tab_active'] == 2) { echo 'checked'; } ?>>
                    <label for="<?php echo esc_attr($html_id.'-switch'); ?>" class="pxl-switch-slider">
                        <span class="pxl-switch-button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="11" viewBox="0 0 9 11" fill="none">
                                <path d="M7.99211 4.95019C8.13294 5.03379 8.27715 5.10908 8.42412 5.17685C8.65622 5.28387 8.65622 5.69636 8.42412 5.80337C8.27715 5.87114 8.13294 5.94643 7.99211 6.03004C7.56254 6.28509 7.17883 6.56882 6.83617 6.88081C6.72194 6.98481 6.6123 7.09197 6.50701 7.20223C6.34922 7.36747 6.20119 7.53967 6.06247 7.71889C5.96993 7.83844 5.88152 7.96111 5.79702 8.08683C5.41668 8.65275 5.11574 9.28103 4.87821 9.97023C4.78922 10.2284 4.70913 10.4952 4.63705 10.7704C4.56379 11.0502 4.03292 11.0502 3.95959 10.7705C3.86012 10.391 3.74541 10.0276 3.61326 9.68053C3.53966 9.4872 3.46027 9.2991 3.37542 9.11593C3.30553 8.96506 3.23257 8.81722 3.15456 8.67328C3.04488 8.47086 2.92669 8.27544 2.79992 8.08683C2.71542 7.96111 2.62701 7.83844 2.53448 7.71889C2.39576 7.53967 2.24773 7.36747 2.08994 7.20223C1.98465 7.09197 1.87501 6.98481 1.76078 6.88081C1.41812 6.56882 1.03441 6.28509 0.604838 6.03004C0.464093 5.94648 0.320004 5.87122 0.173159 5.80346C-0.0588849 5.6964 -0.0588849 5.28383 0.173159 5.17676C0.320004 5.109 0.464093 5.03374 0.604838 4.95019C1.90288 4.17949 2.7814 3.1466 3.37542 1.86429C3.46036 1.68092 3.53959 1.49254 3.61326 1.29899C3.74531 0.952094 3.85998 0.588939 3.95944 0.209707C4.0328 -0.070016 4.56379 -0.0699525 4.63705 0.209797C4.70913 0.48503 4.78922 0.751792 4.87821 1.01C5.01659 1.4115 5.17716 1.792 5.36169 2.15188C5.95133 3.3018 6.79256 4.23797 7.99211 4.95019Z" fill="currentColor"/>
                            </svg>
                        </span>
                    </label>
                </div>
                
                <span class="pxl-switch-label pxl-switch-right <?php if($settings['tab_active'] == 2) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-tab-2'); ?>">
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