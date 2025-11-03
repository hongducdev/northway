<?php $html_id = pxl_get_element_id($settings); 
if(isset($settings['tabs_2']) && !empty($settings['tabs_2']) && count($settings['tabs_2'])): 
    $tab_bd_ids = [];
?>
<div class="pxl-tabs pxl-tabs2 <?php echo esc_attr($settings['tab_effect'].''.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-tabs--inner">
        <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" viewBox="0 0 62 62" fill="none" class="pxl-tabs--fold">
            <path d="M0.808594 0.538086C0.995431 0.460695 1.21052 0.503485 1.35352 0.646484L61.3535 60.6465C61.4965 60.7895 61.5393 61.0046 61.4619 61.1914C61.3845 61.3782 61.2022 61.5 61 61.5H16C7.43959 61.5 0.5 54.5604 0.5 46V1C0.5 0.797792 0.621793 0.615492 0.808594 0.538086Z" fill="#F8F8F2" stroke="#AFB4B5" stroke-linejoin="round"/>
        </svg>
        <div class="pxl-tabs--title">
            <?php foreach ($settings['tabs_2'] as $key => $value) : ?>
                <span class="pxl-item--title <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$value['_id']); ?>">
                    <?php echo pxl_print_html($value['title']); ?>
                </span>
            <?php endforeach; ?>
        </div>
        <div class="pxl-tabs--content">
            <?php foreach ($settings['tabs_2'] as $key => $content) : ?>
                <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?> <?php if($content['content_type'] == 'template') { echo 'pxl-tabs--elementor'; } ?>" <?php if($settings['tab_active'] == $key + 1) { ?>style="display: block;"<?php } ?>>
                    <?php if($content['content_type'] && !empty($content['desc'])) {
                        echo pxl_print_html($content['desc']); 
                    } elseif(!empty($content['content_template'])) {
                        $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$content['content_template']);
                        $tab_bd_ids[] = (int)$content['content_template'];
                        pxl_print_html($tab_content);
                    } ?>        
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>