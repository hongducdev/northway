<?php $html_id = pxl_get_element_id($settings);
$time = isset($settings['time']) ? $settings['time'] : '';
$currency = isset($settings['currency']) ? $settings['currency'] : '';
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if(isset($settings['tabs_2']) && !empty($settings['tabs_2']) && count($settings['tabs_2'])): 
    $tab_bd_ids = [];
    ?>
    <div class="pxl-tabs pxl-tabs2 <?php echo esc_attr($settings['tab_effect'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-tabs--inner">
            <div class="pxl-tabs--title pxl-bg-pattern-caro-2">
                <?php foreach ($settings['tabs_2'] as $key => $title) :  
                    $icon_key = $widget->get_repeater_setting_key( 'icon_2', 'icons', $key );
                    $widget->add_render_attribute( $icon_key, [
                        'class' => $title['icon_2'],
                        'aria-hidden' => 'true',
                    ] );
                    $price = isset($title['price_2']) ? $title['price_2'] : '';
                    ?>
                    <div class="pxl-tab--title pxl-cursor--cta <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$title['_id']); ?>">
                        <span class="pxl-title--text">
                            <?php echo pxl_print_html($title['title_2']); ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="pxl-tabs--content">
                <?php foreach ($settings['tabs_2'] as $key => $content) : ?>
                    <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-tab--content pxl-tabs--elementor <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" <?php if($settings['tab_active'] == $key + 1) { ?>style="display: block;"<?php } ?>>
                        <div class="pxl-content--inner">
                            <?php if (!empty($content['content_template_2'])) {
                                $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display((int) $content['content_template_2']);
                                $tab_bd_ids[] = (int) $content['content_template_2'];
                                pxl_print_html($tab_content);
                            } ?>        
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>