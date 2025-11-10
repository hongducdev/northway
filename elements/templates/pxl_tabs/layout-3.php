<?php $html_id = pxl_get_element_id($settings); 
if(isset($settings['tabs_3']) && !empty($settings['tabs_3']) && count($settings['tabs_3'])): 
    $tab_bd_ids = [];
?>
<div class="pxl-tabs pxl-tabs3 <?php echo esc_attr($settings['tab_effect'].''.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-tabs--inner">
        <div class="pxl-tabs--title">
            <?php foreach ($settings['tabs_3'] as $key => $value) : ?>
                <span class="pxl-item--title <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$value['_id']); ?>">
                    <?php echo pxl_print_html($value['title_3']); ?>
                </span>
            <?php endforeach; ?>
        </div>
        <div class="pxl-tabs--content">
            <?php foreach ($settings['tabs_3'] as $key => $content) : ?>
                <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" <?php if($settings['tab_active'] == $key + 1) { ?>style="display: block;"<?php } ?>>
                    <div class="pxl-tabs--content-inner">
                        <div class="pxl-tabs--content-left">
                            <!-- icon -->
                            <?php if(!empty($content['pxl_icon_tab_3'])): ?>
                                <div class="pxl-tabs--content-icon">
                                    <?php \Elementor\Icons_Manager::render_icon($content['pxl_icon_tab_3'], ['aria-hidden' => 'true']); ?>
                                </div>
                            <?php endif; ?>

                            <!-- divider -->
                            <div class="pxl-tabs--content-divider"></div>

                            <!-- author -->
                            <?php if(!empty($content['show_author_3']) && $content['show_author_3'] == 'true'): ?>
                                <div class="pxl-tabs--content-author">
                                    <div class="pxl-tabs--content-author-image">
                                        <?php echo wp_get_attachment_image($content['author_image_3']['id'], 'full'); ?>
                                    </div>
                                    <div class="pxl-tabs--content-author-meta">
                                        <h5 class="pxl-tabs--content-author-name"><?php echo pxl_print_html($content['author_name_3']); ?></h5>
                                        <span class="pxl-tabs--content-author-position"><?php echo pxl_print_html($content['author_position_3']); ?></span>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($content['show_author_3'] == ''): ?>
                                <h5 class="pxl-tabs--content-title"><?php echo pxl_print_html($content['title_3']); ?></h5>
                            <?php endif; ?>
                        </div>
                        <div class="pxl-tabs--content-right"><?php echo pxl_print_html($content['desc_3']); ?></div>
                    </div>        
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>