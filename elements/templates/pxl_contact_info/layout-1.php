<div class="pxl-contact-info pxl-contact-info1 <?php echo esc_attr($settings['contact_info_style']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
            <?php if (!empty($settings['icon']['value']) ) : ?>
                <div class="pxl-item--icon pxl-flex-center">
                <?php if ( ! empty( $settings['link']['url'] ) ) {
                    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );
                    if ( $settings['link']['is_external'] ) {
                        $widget->add_render_attribute( 'link', 'target', '_blank' );
                    }
                    if ( $settings['link']['nofollow'] ) {
                        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
                    } ?>
                    <a <?php pxl_print_html($widget->get_render_attribute_string( 'link' )); ?>>
                    <?php } ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                    <?php if ( ! empty( $settings['link']['url'] ) ) { ?>
                    </a>
                <?php } ?>
            </div>
        <?php endif; ?>
        <div class="pxl-item--meta">
            <?php if (!empty($settings['title'])) : ?>
                <div class="pxl-item--title"><?php echo pxl_print_html($settings['title']); ?></div>
            <?php endif; ?>
            <?php if(!empty($settings['link']['url'])): ?>
                <a <?php pxl_print_html($widget->get_render_attribute_string( 'link' )); ?>>
                    <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['description']); ?></div>
                </a>
            <?php else: ?>
                <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['description']); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>